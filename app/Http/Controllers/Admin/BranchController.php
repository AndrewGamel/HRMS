<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
          return view('admins.Branches.index');
    }

public function create(){
          return view('admins.Branches.create');
    }
}
