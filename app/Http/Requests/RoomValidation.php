<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomValidation extends FormRequest
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
            'r_no' => 'required|unique:rooms,id|numeric',
            'desc' => 'required|max:100|string',
            'roomtype' => 'exists:room_types,id'
        ];
    }

    public function messages()
    {
        return [
            'r_no.numeric' => 'ERROR: Room number must be numeric!',
            'r_no.required' => 'ERROR: Room number field is required!',
            'r_no.unique' => 'ERROR: Entered room number has already been taken!',

            'desc.required' => 'ERROR: Description field is required!',
            'desc.max' => 'ERROR: Description is too long. Limit to only 100 characters!',
            'desc.string' => 'ERROR: Description must be a string!',

            'roomtype.exists' => 'ERROR: Selected room type does not exist!'
        ];
    }
}
