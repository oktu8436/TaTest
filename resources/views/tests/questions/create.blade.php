@extends('templates.main')

@section('title')Создание теста - TaTest @endsection
@section('scripts') @vite('resources/js/app.js') @endsection

@section('nav')

@endsection

@section('content')
	<main>
        <h1 class="mt-2 text-4xl text-center">Создание вопросов</h1>
        <section class="max-w-5xl mx-auto text-md">
            <form action="{{ route('questions.store') }}" method="post" autocomplete="off" class="mx-auto mt-6 w-full">
                @csrf
                <input type="hidden" name="test_id" value="{{ $test->id }}">
                <input type="hidden" name="user_id" value="{{ $test->user_id }}">
                @for ($i = 1; $i < $num_ques + 1; $i++)
                    <div class="rounded-xl bg-slate-800 p-6 my-2" id="q_{{ $i }}">
                        <h2 class="mb-3 text-2xl">Вопрос №{{ $i }}</h2>
                        <div class="mb-3">
                            <label for="text" class="block">Описание</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <textarea type="text" id="text_{{ $i }}" autofocus name="{{ $i }}_text" minlength="10" required class="inputOk"></textarea>
                            </div>
                        </div>

                        <div class="mb-3 flex gap-8">
                            <Label><input class="mr-3" type="radio" name="{{ $i }}_type" value="input" checked id="{{ $i }}choice1">Ввод</Label>
                            <Label><input class="mr-3" type="radio" name="{{ $i }}_type" value="one" id="{{ $i }}choice2">Выбор одного</Label>
                            <Label><input class="mr-3" type="radio" name="{{ $i }}_type" value="multiple" id="{{ $i }}choice3">Выбор нескольких</Label>
                        </div>

                        <div id="input_{{ $i }}" class="mb-3 choice">
                            <label for="correct_answer" class="block">Правильный ответ</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" id="correct_answer_{{ $i }}" name="{{ $i }}_correct_answer" class="inputOk" value=""/>
                            </div>
                        </div>

                    </div>
                @endfor

                <div>
                    <button type="submit" class="btnOk my-10">Завершить создание теста</button>
                </div>
            </form>
        </section>
	</main>
@endsection

