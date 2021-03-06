<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            
                // 'title' => 'bail|required|between:3,5',
                // 'content' => 'required',
                // 'check' => 'required',
                // 'photo' => 'required',
                // 'tos' => 'accepted',
            //    'website'=>'required|active_url',
            //    'sdt'=>'required|date|after:today',
            //    'edt'=>'required|date|after:sdt'
            'password'=>'required|confirmed',

            
        ];
    }

    
    // public function messages()
    // {
    //     return [
    //         'required' => 'A title is required',
    //     ];
    // }

    public function attributes()
    {
        return [
            'title' => 'user name',
        ];
    }
}
