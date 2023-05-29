@extends('templates.main')

@section('title')Результат теста - TaTest @endsection

@section('nav')

@endsection

@section('content')
	<main class="flex-grow">
        <h1 class="my-10 text-4xl text-center">Ваш результат теста</h1>
        <section class="max-w-5xl mx-auto text-md flex flex-wrap flex-col gap-3 bg-slate-800 p-5 rounded">
            <div class="flex justify-between gap-48">
                <span class="mr-40">Тест</span><span class="block ml-48">{{ $test->title }}</span>
            </div>
            <div class="flex justify-between">
                <span>Количество вопросов</span><span>{{ $result->total_questions }}</span>
            </div>
            <div class="flex justify-between">
                <span>Количество правильных</span><span>{{ $result->correct_answers }}</span>
            </div>
            <div class="flex justify-between">
                <span>Количество неправильных</span><span>{{ $result->incorrect_answers }}</span>
            </div>
            <div class="flex justify-between">
                <span>Процент прохождения теста</span><span>{{ $result->percentage }}</span>
            </div>
        </section>

            <a href="{{ route('tests.index') }}" class="my-10 block text-center">На страницу тестов</a>

	</main>
@endsection
