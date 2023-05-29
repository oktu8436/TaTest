@extends('templates.main')

@section('title')Исследуйте широкий спектр тестов на TaTest @endsection

@section('nav')
    <meta name="description" content="Откройте для себя разнообразие тестов на TaTest, от образовательных до развлекательных.">
    <meta name="keywords" content="Онлайн тесты, Образовательные тесты, Развлекательные тесты, Список тестов, TaTest">
@endsection

@section('content')
	<main class="flex-grow">
        <h1 class="my-4 text-4xl text-center">Тесты TaTest</h1>

        @if (session('status'))
            <div class="flex rounded-md border border-slate-950 bg-cyan-800 p-4 my-6 max-w-md mx-auto">
                <h3 class="text-sm font-medium text-gray-200">{{ session('status') }}</h3>
            </div>
        @endif

        <section class="max-w-5xl mx-auto text-md">
            <h2 class="text-2xl my-5">Образовательные тесты</h2>
            <div class="flex flex-wrap bg-slate-800 rounded p-3">
                @foreach ($educationTests as $test)
                    @include('templates.tests')
                @endforeach
            </div>
        </section>
        <section class="max-w-5xl mx-auto text-md">
            <h2 class="text-2xl my-5">Развлекательные тесты</h2>
            <div class="flex flex-wrap bg-slate-800 rounded p-3">
                @foreach ($entertainmentTests as $test)
                    @include('templates.tests')
                @endforeach
            </div>
        </section>
        <section class="max-w-5xl mx-auto text-md">
            <h2 class="text-2xl my-5">Другие тесты</h2>
            <div class="flex flex-wrap bg-slate-800 rounded p-3">
                @foreach ($otherTests as $test)
                    @include('templates.tests')
                @endforeach
            </div>
        </section>

	</main>
@endsection
