<x-app-layout>
    <x-slot name="header" class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $quiz->title }} Question List
    </x-slot>
    <div class="card container mt-4">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i><span class="mx-2">Create Question</span></a>
            </h5>

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Photo</th>
                    <th scope="col">First Answer</th>
                    <th scope="col">Second Answer</th>
                    <th scope="col">Third Answer</th>
                    <th scope="col">Fourth Answer</th>
                    <th scope="col">Correct Answer</th>
                    <th scope="col" style="width: 10%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quiz->questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->image }}</td>
                        <td>{{ $question->answer_1 }}</td>
                        <td>{{ $question->answer_2 }}</td>
                        <td>{{ $question->answer_3 }}</td>
                        <td>{{ $question->answer_4 }}</td>
                        <td>{{ $question->correct_answer }}</td>
                        <td>
                            <a href="{{ route('questions.index', $quiz->id  ) }}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                            <a href="{{ route('quizzes.edit', $quiz->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('quizzes.destroy', $quiz->id ) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
