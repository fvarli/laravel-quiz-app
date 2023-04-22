<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'question' => 'required|min:3',
            'image' => 'image|nullable|max:2048|mimes:jpg,jpeg,png',
            'answer_1' => 'required|min:3',
            'answer_2' => 'required|min:3',
            'answer_3' => 'required|min:3',
            'answer_4' => 'required|min:3',
            'correct_answer' => 'required',
        ];
    }
}
