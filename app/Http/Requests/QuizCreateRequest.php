<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:10|max:200',
        ];

        if ($this->input('isFinished') === 'on') {
            $rules['finished_at'] = 'after:'.now();
        }

        return $rules;
    }

}
