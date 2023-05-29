@extends('templates.main')

@section('title')Подтверждение пароля@endsection

@section('nav')

@endsection

@section('content')
    <main class="flex flex-col justify-center p-6 pb-12">
        <div class="mx-auto max-w-md">
            <h2 class="mt-2 text-2xl font-bold text-gray-900 sm:mt-6 sm:text-3xl">Подтверждение пароля</h2>
        </div>
        <div class="mx-auto mt-6 w-full max-w-md rounded-xl bg-white/80 p-6 shadow-xl backdrop-blur-xl sm:mt-10 sm:p-10">
            <form action="{{ route('password.confirm') }}" method="post" autocomplete="off">
                @csrf

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Подтвердите пароль</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="password" id="password" name="password" required class="{{ $errors->has('password') ? 'inputErr' : 'inputOk' }}" placeholder="Minimum 8 characters" />
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btnOk">Подтвердить</button>
                </div>
            </form>
        </div>
    </main>
@endsection
