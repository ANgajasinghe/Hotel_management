<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeUpdateValidation extends FormRequest
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
            'desc' => 'required|max:100|string',

            //'t_name' => 'required|unique:room_types,name|max:100|string',
            't_name' => 'required|max:20|string',

            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'desc.required' => 'ERROR: Description field is required!',
            'desc.max' => 'ERROR: Description is too long. Limit to only 100 characters!',
            'desc.string' => 'ERROR: Description must be a string!',

            'price.numeric' => 'ERROR: Base price must be numeric!',
            'price.required' => 'ERROR: Base price field is required!',

            't_name.required' => 'ERROR: Type name field is required!',
            't_name.max' => 'ERROR: Type name is too long. Limit to only 20 characters!',
            't_name.string' => 'ERROR: Type name must be a string!',
            't_name.unique' => 'ERROR: Entered room type name has already been taken!'
        ];
    }
}
