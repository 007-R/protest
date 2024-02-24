<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comment' => 'required|string|max:400',
            'image' => 'required|file|mimes:jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'comment.required' => 'コメントは必ず入力してください',
            'comment.max' => 'コメントは400文字以下で入力してください',
            'comment.string' => 'コメントには文字を入力してください',
            'image.reqired' => '画像を添付してください',
            'image.mimes:jpg,png' => 'jpgかpngを添付してください',
        ];
    }

}
