<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Finance_calender extends Model
{
    use HasFactory;
    protected $table = 'finance_calenders';
    protected $fillable = ['FINANCE_YR', 'com_code', 'added_by', 'updated_by', 'start_date', 'end_date', 'FINANCE_YR_DESC', 'is_open', 'created_at', 'updated_at'];
    
    public function addedBy()
    {
        return $this->belongsTo(Admin::class, 'added_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}