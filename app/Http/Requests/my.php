<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class my extends FormRequest
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

            'ItemName' => 'string',
            'stockeddate' => 'date',
            'stockedqty' => 'integer',
            'issueddate' => 'string',
            'issuedqty' => 'date',
            'availableqty' => 'integer',

        ];


    }

    public function messages()
    {
        return [
            'stockedqty.integer' => 'please enter numbers only',
            'availableqty.integer' => 'please enter numbers only',

        ];
    }
}
