<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable  = ['added_by', 'updated_by', 'phone', 'name', 'com_code', 'active', 'created_at', 'updated_at'];
}