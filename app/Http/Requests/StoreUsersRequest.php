<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'username' => 'required|max:30|string',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|between:8,30|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => ':attributeは必須です',
            'username.max' => ':attributeは30文字以内で入力してください',
            'username.string' => ':attributeは文字列で入力してください',
            'email.required' => ':attributeは必須です',
            'email.max' => ':attributeは100文字以内で入力してください',
            'email.email' => ':attributeの形式で入力してください',
            'email.unique' => 'この:attributeは既に登録されています',
            'password.required' => ':attributeは必須です',
            'password.between' => ':attributeは8~30文字以内で入力してください',
            'password.confirmed' => ':attributeが一致しません',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'ユーザー名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}
