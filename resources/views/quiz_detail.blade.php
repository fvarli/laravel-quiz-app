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
                                @if($quiz->finished_at)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            Deadline
                                        </div>
                                        <span class="badge bg-primary rounded-pill"
                                              title="{{ \Carbon\Carbon::parse($quiz->finished_at)->format('d/m/Y H:i:s') }}">{{ $quiz->finished_at->diffForHumans() }}</span>
                                    </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        The Number of Questions
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{ $quiz->questions_count }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        The number of Participants
                                    </div>
                                    <span class="badge bg-primary rounded-pill">14</span>
                                </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            Average Score
                                        </div>
                                        <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                            </ol>
                        </div>
                        <div class="col-lg-8">
                            <h5 class="card-title">{{ $quiz->title }}</h5>
                            <p>{{ $quiz->description }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
