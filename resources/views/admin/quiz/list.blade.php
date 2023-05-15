<x-app-layout>
    <x-slot name="header" class="font-semibold text-xl text-gray-800 leading-tight">
        Quiz List
    </x-slot>
    <div class="card container mt-4">


        <div class="card-body">
            <h5 class="card-title float-end" style="margin-bottom: 0px !important;">
                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i><span class="mx-2">Create Quiz</span></a>
            </h5>
            <form method="GET" action="" class="row mb-2" style="--bs-gutter-x:0px">
                <div class="col-2">
                    <input type="text" name="title" class="form-control" placeholder="Quiz Name"
                           value="{{ request()->get('title') }}">
                </div>
                <div class="col-2 mx-2">
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">Select Status</option>
                        <option @if(request()->get('status') == 'publish') selected @endif value="publish">Publish
                        </option>
                        <option @if(request()->get('status') == 'passive') selected @endif value="passive">Passive
                        </option>
                        <option @if(request()->get('status') == 'draft') selected @endif value="draft">Draft</option>
                    </select>
                </div>
                @if(request()->get('title') || request()->get('status'))
                    <div class="col-2">
                        <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                @endif

            </form>


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
                                @if(!$quiz->finished_at)
                                    <span class="badge bg-success">Publish</span>
                                @elseif($quiz->finished_at > now())
                                    <span class="badge bg-success">Publish</span>
                                @else
                                    <span class="badge bg-secondary">Expired</span>
                                @endif
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
                            <a href="{{ route('quizzes.details', $quiz->id) }}" class="btn btn-sm btn-secondary">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            <a href="{{ route('questions.index', $quiz->id ) }}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-question"></i></a>
                            <a href="{{ route('quizzes.edit', $quiz->id ) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-pencil"></i></a>
                            <a href="{{ route('quizzes.destroy', $quiz->id ) }}" class="btn btn-sm btn-danger"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
