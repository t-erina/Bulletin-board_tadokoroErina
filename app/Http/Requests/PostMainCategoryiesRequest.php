<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\returnSelf;

class PostMainCategoryiesRequest extends FormRequest
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
            'main_category' => 'required|max:100|string|unique:post_main_categories,main_category',
        ];
    }

    public function messages()
    {
        return [
            'main_category.required' => ':attributeを入力してください',
            'main_category.max' => ':attributeは100文字以内で入力してください',
            'main_category.string' => ':attributeは文字列で入力してください',
            'main_category.unique' => 'この:attributeは既に存在します',
        ];
    }

    public function attributes()
    {
        return [
            'main_category' => 'メインカテゴリー名',
        ];
    }
}
