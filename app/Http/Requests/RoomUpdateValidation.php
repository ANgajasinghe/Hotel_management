<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomUpdateValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'desc' => 'required|max:100|string',
            'roomtype' => 'exists:room_types,id'
        ];
    }

    public function messages()
    {
        return [
            'desc.required' => 'ERROR: Description field is required!',
            'desc.max' => 'ERROR: Description is too long. Limit to only 100 characters!',
            'desc.string' => 'ERROR: Description must be a string!',

            'roomtype.exists' => 'ERROR: Selected room type does not exist!'
        ];
    }
}
