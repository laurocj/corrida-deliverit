<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultsStoreRequest extends FormRequest
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
        return [
            'participant' => 'required|exists:participants,id',
            'racing' => 'required|exists:racings,id',
            'start' => 'required|date_format:H:i:s',
            'finish' => 'required|date_format:H:i:s',
        ];
    }
}
