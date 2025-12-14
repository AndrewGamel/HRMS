<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_panal_setting extends Model
{
    use HasFactory;
    protected $table = "admin_panal_settings";
    protected $fillable = [
        'company_name', 'image', 'phone', 'email', 'address', 'com_code', 'added_by', 'updated_by', 'system_status', 'after_minute_calculate_delay', 'after_minute_calculate_early_departure', 'after_minute_quarterday', 'after_time_half_daycut', 'after_time_allday_daycut', 'monthly_vacation_balance', 'after_days_begin_vacation', 'first_balance_begin_vacation', 'sanctions_value_first_absence', 'sanctions_value_second_absence', 'sanctions_value_third_absence', 'sanctions_value_forth_absence', 'created_at', 'updated_at'
    ];
}
