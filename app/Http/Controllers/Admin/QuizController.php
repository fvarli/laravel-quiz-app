<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $quizzes = Quiz::withCount('questions');

        if (request()->get('title')) {
            $quizzes = $quizzes->where('title', 'like', '%' . request()->get('title') . '%');
        }

        if (request()->get('status')) {
            $quizzes = $quizzes->where('status', request()->get('status'));
        }

        $quizzes = $quizzes->orderByDesc('id')->paginate(5);

        return view('admin.quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuizCreateRequest $request
     * @return RedirectResponse
     */
    public function store(QuizCreateRequest $request): RedirectResponse
    {
        $data = $request->except(['isFinished']);

        if ($request->input('isFinished') !== 'on') {
            $data['finished_at'] = null;
        }

        Quiz::create($data);
        return redirect()->route('quizzes.index')->withSuccess('Quiz has been created.');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $quiz = Quiz::with('top_ten.user', 'results.user')->withCount('questions')->find($id) ?? abort(404, 'Quiz you searched is not available now.');
        return view('admin.quiz.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $quiz = Quiz::withCount('questions')->find($id) ?? abort(404, 'Quiz you searched is not available now.');
        // dd($quiz);
        return view('admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuizUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(QuizUpdateRequest $request, int $id): RedirectResponse
    {
        $quiz = Quiz::find($id) ?? abort(404, 'Quiz you searched is not available now.');

        $requestData = $request->except(['_method', '_token', 'isFinished']);

        if ($request->input('isFinished') !== 'on') {
            $requestData['finished_at'] = null;
        }

        $quiz->update($requestData);
        return redirect()->route('quizzes.index')->withSuccess('Quiz (' . $id . ') has been updated.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $quiz = Quiz::find($id) ?? abort(404,'Quiz you searched is not available now.');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('Quiz ('.$id.') has been deleted.');
    }
}
