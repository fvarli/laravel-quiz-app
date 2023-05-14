<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex">
        <!-- Left Section -->
        <div class="w-3/4 px-2">
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

        <!-- Right Section -->
        <div class="w-1/4 px-2">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Featured
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($results as $result)
                            <li class="list-group-item">
                                <strong>{{ $result->point }}</strong> - <a href="{{ route('quiz.detail', $result->quiz->slug) }}">{{ $result->quiz->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
