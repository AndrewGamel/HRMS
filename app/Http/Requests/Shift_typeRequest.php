<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Shift_typeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'      => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'total_hours' => 'required|numeric',
            'active' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'from_time.required'       => 'بداية الشفت  مطلوب',
            'to_time.required' => ' نهاية الشفت مطلوب',
            'type.required' => 'نوع الشفت مطلوب',
            'total_hours.required'      => '  عدد الساعات مطلوب ',
            'active.required'        => '  التفعيل مطلوب ',
        ];
    }
}
