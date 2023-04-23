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
                    <div class="card-text">
                        <forrm method="POST" action="#">

                            @foreach($quiz->questions as $question)
                                <strong># {{ $loop->iteration }}</strong> {{ $question->question }}
                                @if($question->image)
                                    <img src="{{ asset($question->image) }}" class="img-responsive" style="width: 10%">
                                @endif
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                           id="quiz_{{ $question->id }}" value="answer_1" required>
                                    <label class="form-check-label" for="quiz_{{ $question->id }}">
                                        {{ $question->answer_1 }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                           id="quiz_{{ $question->id }}" value="answer_2" required>
                                    <label class="form-check-label" for="quiz_{{ $question->id }}">
                                        {{ $question->answer_2 }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                           id="quiz_{{ $question->id }}" value="answer_3" required>
                                    <label class="form-check-label" for="quiz_{{ $question->id }}">
                                        {{ $question->answer_3 }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                           id="quiz_{{ $question->id }}" value="answer_4" required>
                                    <label class="form-check-label" for="quiz_{{ $question->id }}">
                                        {{ $question->answer_4 }}
                                    </label>
                                </div>
                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach

                            <button type="submit" class="btn btn-success btn-sm btn-block mt-2">Finish Quiz</button>
                        </forrm>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
