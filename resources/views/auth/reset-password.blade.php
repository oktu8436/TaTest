@extends('templates.main')

@section('title')Смена пароля@endsection

@section('nav')

@endsection

@section('content')
	<main class="">
        <section class="">
            <h2 class="mt-2 text-2xl font-bold text-gray-900 sm:mt-6 sm:text-3xl text-center">Смена пароля</h2>
            <form action="{{ route('password.update') }}" method="post" autocomplete="off" class="mx-auto mt-6 w-full max-w-md rounded-xl bg-white/80 p-6 shadow-xl backdrop-blur-xl sm:mt-10 sm:p-10">
                @csrf

                <input type="hidden" name="token" value="{{ $request->token }}">

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">

                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required class="{{ $errors->has('email') ? 'inputErr' : 'inputOk' }}" placeholder="vanya@mail.ru" />
                        @error('email')
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">

                            </div>
                        @enderror
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">

                        </div>
                        <input type="password" id="password" name="password" required class="{{ $errors->has('password') ? 'inputErr' : 'inputOk' }}" placeholder="Минимум 8 символов" />
                        @error('password')
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">

                            </div>
                        @enderror
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Подтвердите пароль</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">

                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="{{ $errors->has('password_confirmation') ? 'inputErr' : 'inputOk' }}" placeholder="Минимум 8 символов" />
                        @error('password_confirmation')
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">

                            </div>
                        @enderror
                    </div>
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btnOk">Сменить пароль</button>
            </form>
        </section>
	</main>
@endsection
