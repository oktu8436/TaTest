@extends('templates.main')

@section('title')Профиль@endsection

@section('nav')

@endsection

@section('content')
    <main class="flex-grow">
        <h1 class="my-10 text-4xl text-center">Профиль - {{ $user->name }}</h1>
        <section class="max-w-5xl mx-auto text-md flex flex-wrap flex-col gap-3 bg-slate-800 p-5 rounded my-5">
            <h2 class="text-xl">Данные</h2>
            <div class="flex justify-between gap-48">
                <span>Почта</span><span class="block ml-48">{{ $user->email }}</span>
            </div>
            <div class="flex justify-between">
                <span>Почта подтверждена?</span><span>{{ $emailVerified }}</span>
            </div>
        </section>
        <section class="max-w-5xl mx-auto text-md flex flex-wrap flex-col gap-3 bg-slate-800 p-5 rounded my-5">
            <h2 class="text-xl">Статистика тестов</h2>
            <div class="flex justify-between">
                <span>Созданных тестов</span><span>{{ $createdTestsCount }}</span>
            </div>
            <div class="flex justify-between">
                <span>Пройденных тестов</span><span>{{ $completedTestsCount }}</span>
            </div>
            <div class="flex justify-between">
                <span>Средний процент прохождения тестов</span><span>{{ $averagePercentage }}%</span>
            </div>
        </section>
        <section class="max-w-5xl mx-auto text-md flex flex-wrap flex-col gap-3 bg-slate-800 p-5 rounded my-5">
            <h2 class="text-xl">Последний пройденный тест</h2>
            <div class="flex justify-between">
                <span class="mr-40">Название</span><span>{{ $latestTestTitle }}</span>
            </div>
            <div class="flex justify-between">
                <span>Количество вопросов</span><span>{{ $latestTest->total_questions }}</span>
            </div>
            <div class="flex justify-between">
                <span>Количество правильных</span><span>{{ $latestTest->correct_answers }}</span>
            </div>
            <div class="flex justify-between">
                <span>Количество неправильных</span><span>{{ $latestTest->incorrect_answers }}</span>
            </div>
            <div class="flex justify-between">
                <span>Процент прохождения теста</span><span>{{ $latestTest->percentage }}</span>
            </div>
        </section>
    </main>
@endsection
