<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class viewValidate extends FormRequest
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
            //'image'=>'image',
            //'name'=>'string',
            //'NIC'=>'unique:employees,NIC|string|min:10|max:12',
            //'Address'=>'string',
            //'DOB'=>'date',
            'salary' => 'integer',
            //'joindate'=>'date_format:Y-m-d|before:today',
            //'tp'=>'min:10',
            //'Email'=>'unique:employees,Email|email'
        ];
    }

    public function messages()
    {
        return [
            //'NIC.unique'  => 'please enter numrtic method only'

        ];
    }
}
