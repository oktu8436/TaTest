@extends('templates.main')
@section('scripts')
    @vite('resources/js/answer.js')
@endsection
@section('title'){{ $test->title }} - TaTest @endsection

@section('nav')

@endsection

@section('content')
	<main>
        <section class="max-w-5xl mx-auto text-md">
            <h1 class="mt-2 text-2xl font-bold text-center">Тест - {{ $test->title }}</h1>
            @if (session('status'))
                <div class="flex rounded-md border border-slate-950 bg-cyan-800 p-4 my-6 max-w-md mx-auto">
                    <h3 class="text-sm font-medium text-gray-200">{{ session('status') }}</h3>
                </div>
            @endif

            <form action="{{ route('answers.store') }}" method="post" autocomplete="off" id="testForm" class="mx-auto mt-6 w-full flex flex-col gap-5">
                @csrf

                <input type="hidden" name="test_id" value="{{ $test->id }}">
                @foreach ($questions as $question)
                    <div class="rounded-xl bg-slate-800 p-6">
                        <p class="mb-6">{{ $question->text }}</p>

                        @if($question->type === 'input')

                            <label class="flex flex-col gap-3">
                                Ответ:
                                <input type="text" name="{{ $question->id }}_text" id="" required class="inputOk">
                            </label>

                        @elseif($question->type === 'multiple')

                            <div class="flex flex-col gap-3 checkbox-group">
                                @foreach ($question->choices as $index => $choice)
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="{{ $question->id }}_multiple[]" value="{{ $question->id."_".($index+1) }}" class="mx-4 rounded cursor-pointer">
                                        <span class="question-text">{{ $choice->text }}</span>
                                    </label>
                                @endforeach
                            </div>

                        @elseif($question->type === 'one')

                            <div class="flex flex-col gap-3">
                                @foreach ($question->choices as $index => $choice)
                                    <label class="flex items-center gap-3">
                                        <input type="radio" name="{{ $question->id }}_one" value="{{ $question->id."_".($index+1) }}" class="mx-4 cursor-pointer" required>
                                        {{ $choice->text }}
                                    </label>
                                @endforeach
                            </div>


                        @endif

                    </div>
                @endforeach

                <div>
                    <button type="submit" class="btnOk mb-10">Завершиь тест</button>
                </div>
            </form>
        </section>
	</main>
@endsection
{{-- <div class="flex flex-col gap-3">
    @for ($i = 1; $i <= $question->choices->count() + 1; $i++)
        @if ($i = 1)

        @endif
        <label class="flex items-center gap-3">
            <input type="radio" name="{{ $question->id }}_one" value="{{ $question->id."_".(($choice->id)) }}" class="mx-4 cursor-pointer" required>
            {{ $choice->text }}
        </label>
    @endfor
</div> --}}
