<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use validator;

class StoreBlogPost extends FormRequest
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
            'ID' => 'numeric',
            'leve_type' => 'unique:leave_types,leve_type|alpha',
            'days' => 'numeric',
            'Date' => 'date_format:Y-m-d',
            '#days' => 'numeric',
        ];
    }

    public function messages()
    {
        return [

            '#days.numeric' => 'please enter numrtic method only',

        ];
    }
}
