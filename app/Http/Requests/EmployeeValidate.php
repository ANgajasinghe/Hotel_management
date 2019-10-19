<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeValidate extends FormRequest
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
            'Rno' => 'unique:employees,id|numeric',
            'image' => 'image',
            'name' => 'required|string',
            'NIC' => 'unique:employees,NIC|required|string|min:10|max:12',
            'Address' => 'required|string',
            'DOB' => 'required|date',
            'salary' => 'required|integer',
            'joindate' => 'required|date_format:Y-m-d|before:today',
            'tp' => 'min:10',
            'Email' => 'unique:employees,Email|email',
//            'date' => [
//        'required',
//
//        Rule::unique('memployees')->where(function ($query) use('id','date') {
//            return $query->where('id', $id)
//                ->where('day', $day);
//        }),
//    ],
        ];
    }

    public function messages()
    {
        return [
            'NIC.unique' => 'NIC must be unique',
            'NIC.max' => 'please add Valid NIC no ',
            'NIC.min' => 'please add Valid NIC no ',
            'tp.min' => 'please add Valid Telephone No  ',
            'Rno' => 'please enter numeric value for registation no',
            'date.unique' => 'Given ip and hostname are not unique',


        ];
    }
}
