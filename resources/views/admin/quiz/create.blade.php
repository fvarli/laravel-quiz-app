<x-app-layout>
    <x-slot name="header" class="font-semibold text-xl text-gray-800 leading-tight">
        Create Quiz
    </x-slot>
    <div class="card container mt-4">
        <div class="card-body">
            <form method="post" action="{{ route('quizzes.store') }}">
                @csrf
                <div class="form-group col-4 offset-4 text-center">
                    <label>Quiz Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="form-group col-4 offset-4 text-center mt-4">
                    <label>Quiz Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                </div>
                <div class="form-group col-4 offset-4 mt-4">
                    <input @if(old('finished_at')) checked @endif type="checkbox" id="isFinished"> <label class="mx-2">Is there end date?</label>
                </div>
                <div class="form-group col-4 offset-4 text-center mt-2 @if(!old('finished_at')) d-none @endif datetime">
                    <label>End Date</label>
                    <input type="datetime-local" name="finished_at" class="form-control" value="{{ old('finished_at') }}">
                </div>
                <div class="form-group col-4 offset-4 text-center mt-4 mb-2">
                    <button class="btn btn-primary w-100" type="submit">Create</button>
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
