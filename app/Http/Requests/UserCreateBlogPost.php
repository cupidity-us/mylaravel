<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateBlogPost extends FormRequest
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
             'name' => 'required|unique:user|max:255',
             'age' => 'required',     
        ];
    }

    public function messages(){
         return [
            'name.required'=>'学生姓名不能为空'
            ,'name.unique'=>'姓名重复了'
            ,'age.required'=>'年龄不能为空'
         ];
}


}
