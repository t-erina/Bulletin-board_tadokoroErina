<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostsRequest extends FormRequest
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
            'sub_category_id' => 'required|exists:post_sub_categories,id',
            'title' => 'required|max:100|string',
            'post' => 'required|max:5000|string',
        ];
    }

    public function messages()
    {
        return[
            'sub_category_id.required' => ':attributeを選択してください',
            'sub_category_id.exists' => '存在しない:attributeです',
            'title.required' => ':attributeを入力してください',
            'title.max' => ':attributeは100文字以内で入力してください',
            'title.string' => ':attributeは文字列で入力してください',
            'post.required' => ':attributeを入力してください',
            'post.max' => ':attributeは5000文字以内で入力してください',
            'post.string' => ':attributeは文字列で入力してください',
        ];
    }

    public function attributes()
    {
        return[
            'sub_category_id' => 'サブカテゴリー',
            'title' => 'タイトル',
            'post' => '投稿',
        ];
    }
}
