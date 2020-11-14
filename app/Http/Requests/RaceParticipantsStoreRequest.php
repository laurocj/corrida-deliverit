<?php

namespace App\Http\Requests;

use App\RaceParticipant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class RaceParticipantsStoreRequest extends FormRequest
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
        $racing_id = $this->racing;

        Validator::extend('participate_once_per_date', function ($attribute, $value) use ($racing_id) {

            $query = RaceParticipant::join('racings', 'race_participants.racing_id', '=', 'racings.id')
                    ->where('participant_id', $value)
                    ->where('racings.date', function($query) use ($racing_id) {
                        $query->select('date')->from('racings')->where('id', $racing_id);
                    });

            return !$query->count();
        });

        return [
            'participant' => 'required|exists:participants,id|participate_once_per_date',
            'racing' => 'required|exists:racings,id',
            'start' => 'nullable|date_format:H:i:s',
            'finish' => 'nullable|date_format:H:i:s',
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
            'participant.participate_once_per_date' => 'A participant can only register for races on different days'
        ];
    }
}
