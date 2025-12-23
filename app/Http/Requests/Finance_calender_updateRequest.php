<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Finance_calender_updateRequest extends FormRequest
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
           'FINANCE_YR' => 'required',
           'FINANCE_YR_DESC' => 'required',
           'start_date' => 'required|date',
            'end_date' => 'required|date',

        ];
    }
    public function messages()
    {
        return [
            'FINANCE_YR.required' => 'كود السنة المالية مطلوب',
            'FINANCE_YR_DESC.required' => 'وصف السنة المالية مطلوب',
            
            'start_date.required' => 'بداية السنة المالية مطلوب ',
            'end_date.required' => 'النهاية السنة المالية مطلوب '
        ];
    }
}
