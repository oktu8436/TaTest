<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Providers\RouteServiceProvider;
use App\Models\Test;
use App\Models\Answer;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

    public function create($id)
    {
        $test = Test::find($id);
        $questions = $test->questions;
        $choices = $test->questions->flatMap->choices;
        // dd($test, $questions, $choices);
        return view('answers.create', compact('test', 'questions', 'choices'));
    }

    public function store1(Request $request)
    {
        $data = $request->all();
        $userId = Auth::id();

        foreach($data as $key => $value) {
            if($key == "test_id") {
                continue;
            }
            if($key == "_token") {
                continue;
            }

            $keyParts = explode("_", $key);

            $questionId = $keyParts[0];
            $answerType = $keyParts[1];

            $answerText = '';

            if($answerType == 'text') {
                $answerText = $value;
            } else if($answerType == 'one') {
                $answerText = explode("_", $value)[1];
            } else if($answerType == 'multiple') {
                $answerText = implode("_", array_map(function($item) { return explode("_", $item)[1]; }, $value));
            }

            $answer = new Answer();
            $answer->question_id = $questionId;
            $answer->user_id = $userId;
            $answer->answer = $answerText;
            $answer->save();
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }













    public function store(Request $request) {
        $data = $request->all();
        $userId = auth()->id(); // получаем id авторизованного пользователя
        $testId = $data['test_id'];

        $totalQuestions = 0;
        $correctAnswers = 0;
        $incorrectAnswers = 0;

        $questions = Question::where('test_id', $testId)->get();

        foreach($questions as $question) {
            $totalQuestions++;
            $questionId = $question->id;
            $answerText = "";

            if($question->type === 'multiple') {
                if(isset($data[$questionId . '_multiple'])) {
                    $answerText = implode("_", array_map(function($item) { return explode("_", $item)[1]; }, $data[$questionId . '_multiple']));
                }
            } else if($question->type === 'one') {
                if(isset($data[$questionId . '_one'])) {
                    $answerText = explode("_", $data[$questionId . '_one'])[1];
                }
            } else {
                if(isset($data[$questionId . '_text'])) {
                    $answerText = $data[$questionId . '_text'];
                }
            }

            // проверяем правильный ответ
            if($answerText == $question->correct_answer) {
                $correctAnswers++;
            } else {
                $incorrectAnswers++;
            }

            // сохраняем ответ пользователя
            $answer = new Answer();
            $answer->question_id = $questionId;
            $answer->user_id = $userId;
            $answer->answer = $answerText;
            $answer->save();
        }

        $percentage = ($correctAnswers / $totalQuestions) * 100;

        // сохраняем результат теста
        $result = new Result();
        $result->test_id = $testId;
        $result->user_id = $userId;
        $result->total_questions = $totalQuestions;
        $result->correct_answers = $correctAnswers;
        $result->incorrect_answers = $incorrectAnswers;
        $result->percentage = $percentage;
        $result->save();

        return redirect()->route('results.show', $userId);
    }
}
