<x-app-layout>
    <x-slot name="header" class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Question for {{ $question->question }}
    </x-slot>
    <div class="card container mt-4">
        <div class="card-body">
            <form method="POST" action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group text-center">
                    <label>Question</label>
                    <textarea name="question" class="form-control" rows="5">{{ $question->question }}</textarea>
                </div>
                <div class="form-group pt-4">
                    <label>Photo</label>
                    @if($question->image)
                    <a href="{{ asset(($question->image)) }}" target="_blank">
                        <img src="{{ asset($question->image) }}" alt="" style="width: 50%; height: 200px; object-fit: cover; margin-top: 20px; margin-bottom: 20px">
                    </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row pt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 1</label>
                            <textarea name="answer_1" class="form-control" rows="2">{{ $question->answer_1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 2</label>
                            <textarea name="answer_2" class="form-control" rows="2">{{ $question->answer_2 }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 3</label>
                            <textarea name="answer_3" class="form-control" rows="2">{{ $question->answer_3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 4</label>
                            <textarea name="answer_4" class="form-control" rows="2">{{ $question->answer_4 }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <label>Correct Answer</label>
                    <select name="correct_answer" class="form-control">
                        <option @if($question->correct_answer === 'answer_1') selected @endif value="answer_1">Answer 1</option>
                        <option @if($question->correct_answer === 'answer_2') selected @endif value="answer_2">Answer 2</option>
                        <option @if($question->correct_answer === 'answer_3') selected @endif value="answer_3">Answer 3</option>
                        <option @if($question->correct_answer === 'answer_4') selected @endif value="answer_4">Answer 4</option>
                    </select>
                </div>


                <div class="form-group mt-4 mb-2">
                    <a href="{{ route('questions.index', $question->quiz_id ) }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i><span class="mx-2">Back to Questions</span></a>
                    <button class="btn btn-primary float-end" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
