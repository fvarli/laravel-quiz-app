<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'image', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer'];

    protected $appends = ['true_percent'];

    public function my_answer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Answer::class)->where('user_id', auth()->user()->id);
    }

    public function getTruePercentAttribute(): float
    {
        $answer_count = $this->answers()->count();
        $true_answer = $this->answers()->where('answer', $this->correct_answer)->count();
        return round((100 / $answer_count) * $true_answer);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
