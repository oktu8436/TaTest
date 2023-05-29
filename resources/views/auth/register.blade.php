@extends('templates.main')

@section('title')Регистрация - TaTest @endsection

@section('nav')

@endsection

@section('content')
	<main class="">
        <section class="">
            <h2 class="mt-2 text-2xl font-bold sm:mt-6 sm:text-3xl text-center">Регистрация</h2>
            <form action="{{ route('register') }}" method="post" autocomplete="off" class="authForm">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium">Ваше имя</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="{{ $errors->has('name') ? 'inputErr' : 'inputOk' }}" placeholder="Ванёк" />
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="{{ $errors->has('email') ? 'inputErr' : 'inputOk' }}" placeholder="vanya@mail.ru" />
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

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium">Подтвердите пароль</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="{{ $errors->has('password_confirmation') ? 'inputErr' : 'inputOk' }}" placeholder="Минимум 8 символов" />
                    </div>
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btnOk">Зарегистрироваться</button>
                <a href="{{ route('login') }}" class="mt-6 flex items-center justify-center hover:text-gray-300">Уже есть аккаунт?</a>
            </form>
        </section>
	</main>
@endsection
