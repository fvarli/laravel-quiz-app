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
                    <div class="card-text alert alert-warning ">
                            <i class="fa fa-circle-dot"></i> Your Answer <br>
                            <i class="fas fa-check text-success"></i> Correct Answer <br>
                            <i class="fas fa-times text-danger"></i> Wrong Answer
                    </div>
                    <div class="card-text pt-4">

                        @foreach($quiz->questions as $question)
                            @if($question->correct_answer == $question->my_answer->answer)
                                <i class="fas fa-check text-success"></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                            <strong># {{ $loop->iteration }}</strong> {{ $question->question }}
                            @if($question->image)
                                <img src="{{ asset($question->image) }}" class="img-responsive" style="width: 10%">
                            @endif
                            <div class="form-check mt-2">
                                @if('answer_1' == $question->correct_answer)
                                    <i class="fas fa-check text-success"></i>
                                @elseif('answer_1' == $question->my_answer->answer)
                                    <i class="fa fa-circle-dot"></i>
                                @endif
                                <label class="form-check-label" for="quiz_{{ $question->id }}1">
                                    {{ $question->answer_1 }}
                                </label>
                            </div>

                            <div class="form-check">
                                @if('answer_2'== $question->correct_answer)
                                    <i class="fas fa-check text-success"></i>
                                @elseif('answer_2' == $question->my_answer->answer)
                                    <i class="fa fa-circle-dot"></i>
                                @endif
                                <label class="form-check-label" for="quiz_{{ $question->id }}2">
                                    {{ $question->answer_2 }}
                                </label>
                            </div>

                            <div class="form-check">
                                @if('answer_3' == $question->correct_answer)
                                    <i class="fas fa-check text-success"></i>
                                @elseif('answer_3' == $question->my_answer->answer)
                                    <i class="fa fa-circle-dot"></i>
                                @endif
                                <label class="form-check-label" for="quiz_{{ $question->id }}3">
                                    {{ $question->answer_3 }}
                                </label>
                            </div>

                            <div class="form-check">
                                @if('answer_4' == $question->correct_answer)
                                    <i class="fas fa-check text-success"></i>
                                @elseif('answer_4' == $question->my_answer->answer)
                                    <i class="fa fa-circle-dot"></i>
                                @endif
                                <label class="form-check-label" for="quiz_{{ $question->id }}4">
                                    {{ $question->answer_4 }}
                                </label>
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
