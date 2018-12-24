<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClassroomRequest extends FormRequest
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
        // return [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique('users')->ignore(request()->user)
        //     ],
        //     'avatar' => ['image'],
        //     'password' => ['confirmed'],
        // ];
        return [
            'name' => ['required', 'string', 'max:255'],
            'company_id' => ['required', 'string', 'max:255'],
            'teacher_id' => ['required', 'string', 'max:255'],
        ];
    }
}
