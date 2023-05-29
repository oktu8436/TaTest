@extends('templates.main')

@section('title')Создай и пройди тест с TaTest онлайн и на любую тему@endsection

@section('scripts')
    <meta name="description" content="TaTest - это ваша платформа для создания и прохождения тестов на любую тему. Будь вы учитель, студент, менеджер или сотрудник, TaTest поможет вам оценить знания и навыки. Создайте тест сегодня!">
    <meta name="keywords" content="Онлайн тесты, Создание тестов, Прохождение тестов, Оценка знаний, Оценка навыков, TaTest">
@endsection

@section('content')
	<main class="flex-grow flex flex-col gap-20 my-6">
        <h1 class="my-4 text-4xl text-center">Создай и Пройди Тест с TaTest</h1>
        <section class="mainSection text-xl">
            {{-- <img src="{{ asset('img/bg-image.jpg') }}" alt="Tatest фоновое изображение" class="bg-cyan-900 bg-opacity-50"> --}}
            {!! file_get_contents(public_path('img/first.svg')) !!}
            <div class="flex mb-20 text-center">
                TaTest - это ваша платформа для создания и прохождения тестов. Мы предлагаем интуитивно понятный интерфейс для создания тестов на любую тему. Независимо от того, учитель вы или студент, менеджер или сотрудник, TaTest поможет вам оценить знания и навыки.
            </div>
            <a href="{{ route('tests.create') }}" class="mainLink mb-10">Создать тест</a>
        </section>

        <section class="mainSection">
            <h2 class="mainH2">Создание тестов</h2>
            <figure class="svgFigure">
                <figcaption class="svgFigcaption">
                    <p>С нашими инструментами вы можете создать тесты на любую тему. Выберите тип вопросов: множественный выбор, ответ в свободной форме или выбор одного.</p>
                    <a href="{{ route('tests.create') }}" class="mainLink">Перейти к созданию</a>
                </figcaption>
                {!! file_get_contents(public_path('img/create.svg')) !!}
            </figure>
        </section>

        <section class="mainSection">
            <h2 class="mainH2">Прохождение тестов</h2>
            <figure class="svgFigure">
                {!! file_get_contents(public_path('img/testing.svg')) !!}
                <figcaption class="svgFigcaption">
                    <p class="text-right">Пройдите тесты, созданные другими пользователями, или найдите тесты по интересующей вас теме.</p>
                    <a href="{{ route('tests.index') }}" class="mainLink ml-auto">Перейти к тестам</a>
                </figcaption>
            </figure>
        </section>

        <section class="mainSection">
            <h2 class="mainH2">Сразу получайте результат</h2>
            <figure class="svgFigure">
                <figcaption class="svgFigcaption">
                    <p>Получите немедленную обратную связь и узнайте свои результаты сразу после прохождения теста.</p>
                    <a href="{{ route('tests.index') }}" class="mainLink">Перейти к тестам</a>
                </figcaption>
                {!! file_get_contents(public_path('img/result.svg')) !!}
            </figure>
        </section>

        <section class="mainSection mb-10">
            <h2 class="mainH2">Почему Выбирают TaTest?</h2>
            <div class="flex text-xl my-10">
                <figure class="w-1/3 my-5 px-3 text-center flex flex-col items-center gap-5">
                    {!! file_get_contents(public_path('icons/interface.svg')) !!}
                    <figcaption>Простой и быстрый интерфейс для создания тестов для любых тем и тематик</figcaption>
                </figure>
                <figure class="w-1/3 my-5 px-3 text-center flex flex-col items-center gap-5">
                    {!! file_get_contents(public_path('icons/designe.svg')) !!}
                    <figcaption>Интерактивный дизайн и привлекательное оформление тестов</figcaption>
                </figure>
                <figure class="w-1/3 my-5 px-3 text-center flex flex-col items-center gap-5">
                    {!! file_get_contents(public_path('icons/result.svg')) !!}
                    <figcaption>Удобный режим просмотра результатов прохождения тестов</figcaption>
                </figure>
            </div>
            <a href="{{ route('tests.index') }}" class="mainLink">Перейти к тестам</a>
        </section>
	</main>
@endsection
