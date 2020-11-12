<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantsStoreRequest extends FormRequest
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
            'cpf' => 'required|string|max:14|regex:/[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}/i',
            'name' => 'required|string|min:6',
            'birth' => 'required|date_format:Y-m-d|before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'birth.before_or_equal' => 'Participant must be of legal age'
        ];
    }
}
