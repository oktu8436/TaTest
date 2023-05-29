<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        $educationTests = Test::where('tags', 'like', '%образование%')
                            ->orWhere('tags', 'like', '%обучение%')->get();
        $entertainmentTests = Test::where('tags', 'like', '%развлечение%')->get();
        $otherTests = Test::where('tags', 'not like', '%образование%')
                        ->where('tags', 'not like', '%развлечение%')->get();

        return view('tests.index', compact('educationTests', 'entertainmentTests', 'otherTests'));
    }

    public function create()
    {
        return view('tests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string', 'min:10'],
            'tags' => ['nullable', 'string'],
            'num_ques' => ['required', 'integer', 'min:3', 'max:50']
        ]);


        $test = new Test;
        $test->user_id = Auth::user()->id;
        $test->title = $request->title;
        $test->description = $request->description;
        $test->tags = $request->tags;
        $test->save();
        $test->num_ques = $request->num_ques;

        return redirect()->route('questions.create', [$test->id, $test->num_ques]);
        // return view('tests.questions.create', compact('test'));
    }

    public function show($id)
    {
        $test = Test::find($id);

        return view('tests.show', compact('test'));
    }

}
