<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentsRequest extends FormRequest
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
            'comment' => 'required|max:2500|string',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => ':attributeを入力してください',
            'comment.max' => ':attributeは2500文字以内で入力してください',
            'comment.string' => ':attributeは文字列で入力してください',
        ];
    }

    public function attributes()
    {
        return [
            'comment' => 'コメント',
        ];
    }
}
