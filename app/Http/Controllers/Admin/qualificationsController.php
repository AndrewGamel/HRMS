<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QualificationRequest;
use Illuminate\Support\Facades\DB;


class qualificationsController extends Controller
{
    public function index() {
        return view('admins.Qualification.index');
    }
    public function create() {}
    public function store() {}
    public function edit() {}
    public function update() {}
}
