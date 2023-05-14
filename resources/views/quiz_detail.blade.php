<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                    <div class="row">
                        <div class="col-lg-4">
                            <ol class="list-group list-group-numbered">
                                @if($quiz->my_rank)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            Rank
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{ $quiz->my_rank }}</span>
                                @endif

                                @if($quiz->finished_at)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            Deadline
                                        </div>
                                        <span class="badge bg-primary rounded-pill"
                                              title="{{ \Carbon\Carbon::parse($quiz->finished_at)->format('d/m/Y H:i:s') }}">{{ $quiz->finished_at->diffForHumans() }}</span>
                                    </li>
                                @endif
                                @if($quiz->my_result)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            Point
                                        </div>
                                        <span class="badge bg-success rounded-pill">{{ $quiz->my_result->point }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            Answers
                                        </div>
                                        <div class="float-end">
                                        <span
                                            class="badge bg-success rounded-pill">Correct: {{ $quiz->my_result->correct }}</span>
                                            <span
                                                class="badge bg-danger rounded-pill">Wrong: {{ $quiz->my_result->wrong }}</span>
                                        </div>
                                    </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        The Number of Questions
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{ $quiz->questions_count }}</span>
                                </li>
                                @if($quiz->details)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            The number of Participants
                                        </div>
                                        <span
                                            class="badge bg-primary rounded-pill">{{ $quiz->details['join_count'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            Average Score
                                        </div>
                                        <span
                                            class="badge bg-primary rounded-pill">{{ $quiz->details['average'] }}</span>
                                    </li>
                                @endif
                            </ol>

                            @if(count($quiz->top_ten) > 0)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Top Ten</h5>
                                    <ul class="list-group">
                                        @foreach($quiz->top_ten as $result)
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <img src="{{ $result->user->profile_photo_url }}" class="w-8 h-8 rounded-full" alt="">
                                                <strong>{{ $loop->iteration }})</strong> {{ $result->user->name }}
                                                <span class="badge bg-success rounded-pill float-end">{{ $result->point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-8">
                            <h5 class="card-title">{{ $quiz->title }}</h5>
                            <p>{{ $quiz->description }}</p>
                            @if($quiz->my_result)
                                <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning">Show
                                    Result</a>
                            @elseif($quiz->finished_at > now())
                                <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary">Join the
                                    Quiz</a>
                            @endif
                        </div>
                    </div>
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
