<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $old_year = $this->input('old_year');
        $old_month = $this->input('old_month');
        $old_day = $this->input('old_day');
        $birth_day = $old_year . '-' . $old_month . '-' . $old_day;
        $this->merge([
            'birth_day' => $birth_day,
        ]);

        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|katakana|max:30',
            'under_name_kana' => 'required|string|katakana|max:30',
            'mail_address' => 'required|email|unique:users|max:100',
            'sex' => ['required','in:1,2,3'],
            'old_year' => 'required',
            'old_month' => 'required',
            'old_day' => 'required',
            'birth_day' => 'date|after_or_equal:2000-01-01|before_or_equal:today',
            'role' => ['required','in:1,2,3,4'],
            'password' => 'required|between:8,30|confirmed',
        ];
    }

}
