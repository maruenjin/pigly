<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightLogRequest extends FormRequest
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
            'date' => 'required|date',
        'weight' => 'required|numeric|regex:/^\d{1,3}(\.\d)?$/',
        'calories' => 'required|integer|min:0',
        'exercise_time' => 'required',
        'exercise_detail' => 'nullable|string|max:120',
        ];
    }

    public function messages()
    {
    return [
        'date.required' => '日付を入力してください',
        'weight.required' => '体重を入力してください',
        'weight.numeric' => '数字で入力してください',
        'weight.regex' => '4桁まで、小数点1桁で入力してください',
        'calories.required' => '摂取カロリーを入力してください',
        'calories.integer' => '数字で入力してください',
        'exercise_time.required' => '運動時間を入力してください',
        'exercise_detail.max' => '120文字以内で入力してください',
    ];
    }
}
