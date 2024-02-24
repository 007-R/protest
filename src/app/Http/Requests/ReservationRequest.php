<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'user_id' => 'required',
            'shop_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'number' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'ユーザーIDは必須です',
            'shop_id.required' => 'ユーザーIDは必須です',
            'date.required' => '予約日程は必須です',
            'time.required' => '予約時間は必須です',
            'number.required' => '予約人数は必須です',
        ];
    }
}
