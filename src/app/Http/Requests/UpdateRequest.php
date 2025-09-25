<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric|min:0|max:10000',
            // 画像を変更しなくてもバリデーションを成功させるため、requiredルールをはずす
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'season' => 'required|array',
            'season.*' => 'exists:seasons,id',
            'description' => 'required|max:120',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '数値で入力してください',
            'price.min' => '0-10000円以内で入力してください',
            'price.max' => '0-10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.image' => '「png」または「jpeg」形式でアップロードしてください',
            'image.mimes' => '「png」または「jpeg」形式でアップロードしてください',
            'season.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',
        ];
    }
}
