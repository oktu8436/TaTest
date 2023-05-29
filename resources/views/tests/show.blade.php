@extends('templates.main')

@section('title')Тесты - TaTest @endsection

@section('scripts')
    <meta name="description" content="Пройти тест: {{ $test->title }}">
    <meta name="keywords" content="{{ $test->tags }}, пользовательский тест">
@endsection

@section('content')
	<main class="flex-grow">
        <h1 class="my-5 text-4xl text-center">{{ $test->title }}</h1>
        <section class="max-w-5xl mx-auto text-md bg-slate-800 rounded p-5">
            <figure>
                <figcaption class="flex flex-col gap-4">
                    <p>{{ $test->description }}</p>

                    <p>Тема теста: {{ $test->tags }}</p>
                    @guest
                        <p>Для того, чтобы пройти тест вам необходимо войти в аккаунт!</p>
                    @endguest
                    <a href="{{ route('answers.create', $test->id) }}">Пройти тест</a>
                </figcaption>
            </figure>
        </section>
	</main>
@endsection
