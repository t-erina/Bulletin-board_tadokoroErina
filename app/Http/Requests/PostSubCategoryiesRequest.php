<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSubCategoryiesRequest extends FormRequest
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
            'main_category_id' => 'required|exists:post_main_categories,id',
            'sub_category' => 'required|max:100|string|unique:post_sub_categories',
        ];
    }

    public function messages()
    {
        return [
            'main_category_id.required' => ':attributeを選択してください',
            'main_category_id.exists' => '存在しない:attributeです',
            'sub_category.required' => ':attributeを入力してください',
            'sub_category.max' => ':attributeは100文字以内で入力してください',
            'sub_category.string' => ':attributeは文字列で入力してください',
            'sub_category.unique' => 'この:attributeは既に存在します',
        ];
    }

    public function attributes()
    {
        return [
            'main_category_id' => 'メインカテゴリー',
            'sub_category' => 'サブカテゴリー名',
        ];
    }
}
