<x-app-layout>
    <x-slot name="header" class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Quiz
    </x-slot>
    <div class="card container mt-4">
        <div class="card-body">
            <form method="post" action="{{ route('quizzes.update', $quiz->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group text-center">
                    <label>Quiz Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div>
                <div class="form-group text-center mt-4">
                    <label>Quiz Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ $quiz->description }}</textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <label>Quiz Status</label>
                    <select name="status" class="form-control">
                        <option @if($quiz->questions_count < 4) disabled @endif @if($quiz->status === 'publish') selected @endif value="publish">Publish @if($quiz->questions_count < 4 ) - Number of the questions should be more than 4. @endif</option>
                        <option @if($quiz->status === 'passive') selected @endif value="passive">Passive</option>
                        <option @if($quiz->status === 'draft') selected @endif value="draft">Draft</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <input @if($quiz->finished_at) checked @endif type="checkbox" name="isFinished" id="isFinished"> <label class="mx-2">Is there end date?</label>
                </div>
                <div class="form-group text-center mt-2 @if(!$quiz->finished_at) d-none @endif datetime">
                    <label>End Date</label>
                    <input type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif>
                </div>
                <div class="form-group text-center mt-4 mb-2">
                    <button class="btn btn-primary w-100" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function (){
                if ($('#isFinished').is(':checked')) {
                    $(this).parent().next('.datetime').removeClass('d-none');
                } else {
                    $(this).parent().next('.datetime').addClass('d-none');
                }
            });
        </script>
    </x-slot>
</x-app-layout>
