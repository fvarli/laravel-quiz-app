<x-app-layout>
    <x-slot name="header" class="font-semibold text-xl text-gray-800 leading-tight">
        Quiz List
    </x-slot>
    <div class="card container mt-4">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="mx-2">Create Quiz</span></a>
            </h5>

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Number of Question</th>
                    <th scope="col">Status</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->questions_count }}</td>
                    <td>
                        @switch($quiz->status)
                            @case('publish')
                                <span class="badge bg-success">Publish</span>
                                @break
                            @case('passive')
                                <span class="badge bg-danger">Passive</span>
                                @break
                            @case('draft')
                                <span class="badge bg-warning">Draft</span>
                                @break
                        @endswitch
                    </td>
                    <td>
                        <span title="{{ \Carbon\Carbon::parse($quiz->finished_at)->format('d/m/Y H:i:s') }}">
                        {{ $quiz->finished_at ? $quiz->finished_at->diffforHumans() : null }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('questions.index', $quiz->id ) }}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                        <a href="{{ route('quizzes.edit', $quiz->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('quizzes.destroy', $quiz->id ) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $quizzes->links() }}
        </div>
    </div>
</x-app-layout>
