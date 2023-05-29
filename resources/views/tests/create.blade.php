@extends('templates.main')

@section('title')Создание теста - TaTest @endsection

@section('nav')

@endsection

@section('content')
	<main>
        <section class="max-w-5xl mx-auto text-md">
            <h1 class="mt-2 text-4xl text-center">Создание теста</h1>
            @if (session('status'))
                <div class="flex rounded-md border border-slate-950 bg-cyan-800 p-4 my-6 max-w-md mx-auto">
                    <h3 class="text-sm font-medium text-gray-200">{{ session('status') }}</h3>
                </div>
            @endif

            <form action="{{ route('tests.store') }}" method="post" autocomplete="off" class="mx-auto mt-6 w-full max-w shadow-xl backdrop-blur-xl">
                @csrf
                <div class="rounded-xl bg-slate-800 p-6">
                    <div class="mb-6">
                        <label for="title" class="block">Название</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" id="title" autofocus name="title" minlength="5" value="{{ old('title') }}" required class="{{ $errors->has('title') ? 'inputErr' : 'inputOk' }}" placeholder="На сколько % вы человек"/>
                        </div>
                        @error('title')
                            <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block">Описание</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <textarea type="text" id="description" autofocus name="description" minlength="10" required class="{{ $errors->has('description') ? 'inputErr' : 'inputOk' }}">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tags" class="block">Тема теста</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" id="tags" name="tags" value="{{ old('tags') }}" class="{{ $errors->has('tags') ? 'inputErr' : 'inputOk' }}" placeholder="Через пробел например: 'образование информатика' или 'развлекательный'" />
                        </div>
                        @error('tags')
                            <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div>
                            <label for="num_ques" class="block mb-1">Количество вопросов</label>
                            <input type="number" id="num_ques" name="num_ques" min="3" max="50" value="5" class="text-gray-700 focus:border-cyan-600 focus:ring-cyan-600 placeholder:text-gray-400 rounded-md max-w-max"/>
                        </div>
                        @error('num_ques')
                            <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btnOk my-10">Перейти к созданию вопросов</button>
                </div>
            </form>
        </section>
	</main>
@endsection
