<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
     public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_p(new Department(), array('*'), array('com_code' => $com_code), 'id', 'DESC', PAGINATION_COUNTER);
        return view('admins.Departments.index', compact('data'));
    }
    public function create()
    {
        return view('admins.Departments.create');
    }
}
