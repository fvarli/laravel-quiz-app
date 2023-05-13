<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'image', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer'];

    public function my_answer()
    {
        return $this->hasOne(Answer::class)->where('user_id', auth()->user()->id);
    }
}
