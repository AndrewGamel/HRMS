<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift_type extends Model
{
    use HasFactory;
    protected $table = 'shift_types';
    
    protected $fillable  = ['type', 'from_time', 'to_time', 'total_hours', 'com_code', 'added_by', 'updated_by'];

      public function addedBy()
    {
        return $this->belongsTo(Admin::class, 'added_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}
