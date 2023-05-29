@extends('templates.main')

@section('title')Авторизация - TaTest @endsection

@section('nav')

@endsection

@section('content')
	<main class="">
        <section class="">
            <h2 class="mt-2 text-2xl font-bold sm:mt-6 sm:text-3xl text-center">Авторизация</h2>
            @if (session('status'))
                <div class="flex rounded-md border border-slate-950 bg-cyan-800 p-4 my-6 max-w-md mx-auto">
                    <h3 class="text-sm font-medium text-gray-200">{{ session('status') }}</h3>
                </div>
            @endif

            <form action="{{ route('login') }}" method="post" autocomplete="off" class="authForm">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="email" id="email" autofocus name="email" value="{{ old('email') }}" required class="{{ $errors->has('email') ? 'inputErr' : 'inputOk' }}" placeholder="vanya@mail.ru" />
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium">Пароль</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="password" id="password" name="password" required class="{{ $errors->has('password') ? 'inputErr' : 'inputOk' }}" placeholder="Минимум 8 символов" />
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4 cursor-pointer">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 rounded focus:ring-cyan-600" />
                        <label for="remember" class="text-sm">Запомнить меня</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm font-medium  hover:text-gray-300">Забыли пароль?</a>
                </div>

                <div>
                    <button type="submit" class="btnOk">Войти</button>
                </div>
                <a href="{{ route('register') }}" class="mt-6 flex items-center justify-center hover:text-gray-300">Нет аккаунта?</a>
            </form>
        </section>
	</main>
@endsection
