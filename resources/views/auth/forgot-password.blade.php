@extends('templates.main')

@section('title')Сброс пароля@endsection

@section('nav')

@endsection

@section('content')
	<main class="">
        <section class="">
            <h2 class="mt-2 text-2xl font-bold sm:mt-6 sm:text-3xl text-center">Сброс пароля</h2>
            @if (session('status'))
                <div class="flex rounded-md border border-slate-950 bg-cyan-800 p-4 my-6 max-w-md mx-auto">
                    <h3 class="text-sm font-medium text-gray-200">{{ session('status') }}</h3>
                </div>
            @endif
            <form action="{{ route('password.request') }}" method="post" autocomplete="off" class="authForm">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">

                        </div>
                        <input type="email" id="email" autofocus name="email" value="{{ old('email') }}" required class="{{ $errors->has('email') ? 'inputErr' : 'inputOk' }}" placeholder="vanya@mail.ru" />
                        @error('email')
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">

                            </div>
                        @enderror
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btnOk">Отправить ссылку</button>
                </div>
            </form>
        </section>
	</main>
@endsection
