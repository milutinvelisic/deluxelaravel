<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompleteReservationRequest extends FormRequest
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
            "crDateFromHidden" => "required",
            "crDateToHidden" => "required",
            "crRoomTypeHidden" => "required",
            "crUsername" => "required",
            "crPassword" => "required",
            "crEmail" => "required",
        ];
    }
}
