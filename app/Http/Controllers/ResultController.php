<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\Test;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    // public function index()
    // {
    //     $tests = Test::all();
    //     return view('tests.index', compact('tests'));
    // }

    // public function create()
    // {
    //     return view('tests.create');
    // }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => ['required', 'string', 'min:5'],
        //     'description' => ['required', 'string', 'min:10'],
        //     'tags' => ['nullable', 'string'],
        //     'num_ques' => ['required', 'integer', 'min:3', 'max:50']
        // ]);

        // $test = new Test;
        // $test->user_id = Auth::user()->id;
        // $test->title = $request->title;
        // $test->description = $request->description;
        // $test->tags = $request->tags;
        // $test->save();
        // $test->num_ques = $request->num_ques;

        // return view('tests.questions.create', compact('test'));
    }

    public function show($userId)
    {
        $result = Result::where('user_id', $userId)->orderBy('created_at', 'desc')->first();
        $test = Test::find($result->test_id);

        return view('results.show', compact('result', 'test'));
    }
}
