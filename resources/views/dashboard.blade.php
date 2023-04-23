<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="list-group">
                    @foreach($quizzes as $quiz)
                        <a href="{{ route('quiz.detail',$quiz->slug) }}" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $quiz->title }}</h5>
                                <small>{{ $quiz->finished_at ? 'Ends ' . $quiz->finished_at->diffForHumans() : null }}</small>
                            </div>
                            <p class="mb-1">{{ Str::limit($quiz->description, 100) }}</p>
                            <small>{{ $quiz->questions_count }}</small>
                        </a>
                    @endforeach
                    @if(count($quizzes) > 5)
                        <div class="mt-2 mx-2 mb-2 pt-2">
                            {{ $quizzes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
