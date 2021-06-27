<?php

namespace App\Http\Requests;

use App\Models\Questionsoption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionsoptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('questionsoption_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'option_text' => [
                'string',
                'required',
            ],
            'correct' => [
                'required',
            ],
        ];
    }
}