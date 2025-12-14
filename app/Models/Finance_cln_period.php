<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance_cln_period extends Model
{
    use HasFactory;
     protected $table = 'finance_cln_periods';
    protected $fillable = ['finance_calenders_id', 'added_by', 'updated_by', 'number_of_days', 'com_code', 'FINANCE_YR', 'MONTH_ID', 'START_DATE_M', 'END_DATE_M', 'is_open', 'start_date_for_pasma', 'end_date_for_pasma', 'year_and_month', 'created_at', 'updated_at' ];
}