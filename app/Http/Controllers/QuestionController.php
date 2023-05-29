<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function create($id, $num_ques)
    {
        $test = Test::find($id);

        return view('tests.questions.create', compact('test', 'num_ques'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $numQuestions = 1;
        while(isset($data[$numQuestions . '_text'])) {
            $numQuestions++;
        }

        for ($i = 1; $i < $numQuestions; $i++) {
            $questionText = $data[$i . '_text'];
            $questionType = $data[$i . '_type'];
            $correctAnswer = "";

            if ($questionType == 'input') {
                $correctAnswer = $data[$i . '_correct_answer'];
            } else {
                if(is_array($data[$i . '_choice'])){
                    //
                    $correctAnswers = array_map(function($choice) {
                        $parts = explode('_', $choice);
                        return end($parts);
                    }, $data[$i . '_choice']);
                    $correctAnswer = implode("_", $correctAnswers);
                } else {
                    $parts = explode('_', $data[$i . '_choice']);
                    $correctAnswer = end($parts);
                }
            }

            // Создаем новый вопрос
            $question = new Question;
            $question->test_id = $data['test_id'];
            $question->text = $questionText;
            $question->type = $questionType;
            $question->correct_answer = $correctAnswer;
            $question->save();

            // Если тип вопроса не 'input', создаем варианты ответа
            if ($questionType != 'input') {
                $j = 1;
                while (isset($data[$i . '_choice_' . $j])) {
                    $choice = new Choice;
                    $choice->question_id = $question->id;
                    $choice->text = $data[$i . '_choice_' . $j];

                    // Определяем, верный ли вариант ответа
                    if ($questionType == 'one') {
                        $choice->is_true = $correctAnswer == $j ? 1 : 0;
                    } else if ($questionType == 'multiple') {
                        $choice->is_true = in_array($j, explode("_", $correctAnswer)) ? 1 : 0;
                    }

                    $choice->save();
                    $j++;
                }
            }
        }

        return redirect()->route('tests.index')->with('status', 'Тест успешно добавлен');
    }
}

    // public function show($id)
    // {
    //     $test = Test::find($id);
    //     return view('tests.show', compact('test'));
    // }
