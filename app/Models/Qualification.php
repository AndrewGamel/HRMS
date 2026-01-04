<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $fillable  = ['added_by', 'updated_by', 'name', 'com_code', 'active', 'created_at', 'updated_at'];
}