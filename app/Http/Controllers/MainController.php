<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }

    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404, 'Quiz you searched is not available now.');
        return view('quiz_detail', compact('quiz'));
    }

    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first() ?? abort(404, 'Quiz you searched is not available now.');
        return view('quiz', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        $correct = 0;

        $quiz = Quiz::whereSlug($slug)->with('questions')->first() ?? abort(404, 'Quiz you searched is not available now.');
        foreach ($quiz->questions as $question) {
            Answer::create(
                [
                    'user_id' => auth()->user()->id,
                    'question_id' => $question->id,
                    'answer' => $request->post($question->id)
                ]
            );

            // echo $question->correct_answer.' - '.$request->post($question->id).'<br>';

            if($question->correct_answer === $request->post($question->id)){
                $correct += 1;
            }
        }
        $point = round((100 / count($quiz->questions)) * $correct);
        $wrong = count($quiz->questions) - $correct;

        // return $correct;

        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong,
        ]);

       return redirect()->route('quiz.detail', $quiz->slug)->withSuccess('Quiz completed successfully.');
    }
}
