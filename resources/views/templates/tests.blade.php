<a href="{{ route('tests.show', $test->id) }}"  class="w-1/3 my-6 px-3 hover:underline">
    <figure>
        <figcaption>
            <h3 class="text-xl mb-3 text-center">{{ $test->title }}</h3>
            <p>{{ $test->description }}</p>
        </figcaption>
    </figure>
</a>
