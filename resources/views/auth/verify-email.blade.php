@extends('templates.main')

@section('title')Подтверждение почты@endsection

@section('nav')

@endsection

@section('content')
	<main class="">
        <section class="">
            <h2 class="mt-2 text-2xl font-bold  sm:mt-6 sm:text-3xl text-center">Подтвердите почту</h2>

            @if (session('status'))
                <div class="flex rounded-md border border-slate-950 bg-cyan-800 p-4 my-6 max-w-md mx-auto">
                    <h3 class="text-sm font-medium text-gray-200">{{ session('status') }}</h3>
                </div>
            @endif

            <form action="{{ route('verification.send') }}" method="post" autocomplete="off" class="authForm">
                @csrf

                <div>
                    <button type="submit" class="btnOk">Отправить ссылку</button>
                </div>

            </form>
        </section>
	</main>
@endsection
