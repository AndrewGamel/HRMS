<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_panal_settingRequest extends FormRequest
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
            'company_name' => 'required',
            'phone' => 'required|numeric|min_digits:11|max_digits:11',
            // 'address' => 'required',
            'email' => 'required|email',

            "after_minute_calculate_delay" => 'required|numeric',
            "after_minute_calculate_early_departure" => 'required|numeric',
            "after_minute_quarterday" => 'required|numeric',
            "after_time_half_daycut" => 'required|numeric',
            "after_time_allday_daycut" => 'required|numeric',

            "monthly_vacation_balance" => 'required|numeric',
            "after_days_begin_vacation" => 'required|numeric',
            "first_balance_begin_vacation" => 'required|numeric',

            "sanctions_value_first_absence" => 'required|numeric',
            "sanctions_value_second_absence" => 'required|numeric',
            "sanctions_value_third_absence" => 'required|numeric',
            "sanctions_value_forth_absence" => 'required|numeric',


        ];
    }
    public function messages(): array
    {
        return [
            'company_name.required' => 'اسم الشركة مطلوب',
            'phone.required' => 'هاتف الشركة مطلوب',
            'phone.numeric' => 'ادخل الارقام فقط',
            'phone.max_digits' => 'ادخل الارقام فقط وأن لايتغطي عن 11 رقم',
            'phone.min_digits' => 'ادخل الارقام فقط وأن لايتغطي عن 11 رقم',
            'email.required' => 'بريد الشركة مطلوب',
            'address.required' => 'عنوان الشركة مطلوب',

            'after_minute_calculate_delay.numeric' => 'ادخل الارقام فقط',
            'after_minute_calculate_delay.required' => 'ادخل  بيانات هذا الحقل',

            'after_minute_calculate_early_departure.numeric' => 'ادخل الارقام فقط',
            'after_minute_calculate_early_departure.required' => 'ادخل بيانات هذا الحقل',

            'after_minute_quarterday.numeric' => 'ادخل الارقام فقط',
            'after_minute_quarterday.required' => 'ادخل  بيانات هذا الحقل',


            'after_time_half_daycut.numeric' => 'ادخل الارقام فقط',
            'after_time_half_daycut.required' => 'ادخل  بيانات هذا الحقل',

            'after_time_allday_daycut.numeric' => 'ادخل الارقام فقط',
            'after_time_allday_daycut.required' => 'ادخل  بيانات هذا الحقل',


            'monthly_vacation_balance.numeric' => 'ادخل الارقام فقط',
            'monthly_vacation_balance.required' => 'ادخل الارقام فقط',

            'after_days_begin_vacation.numeric' => 'ادخل الارقام فقط',
            'after_days_begin_vacation.required' => 'ادخل  بيانات هذا الحقل',

            'first_balance_begin_vacation.numeric' => 'ادخل الارقام فقط',
            'first_balance_begin_vacation.required' => 'ادخل  بيانات هذا الحقل',

            'sanctions_value_first_absence.required' => 'ادخل  بيانات هذا الحقل',
            'sanctions_value_second_absence.required' => 'ادخل  بيانات هذا الحقل',
            'sanctions_value_third_absence.required' => 'ادخل  بيانات هذا الحقل',
            'sanctions_value_forth_absence.required' => 'ادخل  بيانات هذا الحقل',

            'sanctions_value_first_absence.numeric' => 'ادخل الارقام فقط',
            'sanctions_value_second_absence.numeric' => 'ادخل الارقام فقط',
            'sanctions_value_third_absence.numeric' => 'ادخل الارقام فقط',
            'sanctions_value_forth_absence.numeric' => 'ادخل الارقام فقط',


        ];
    }
}
