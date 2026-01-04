<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Shift_type;
use App\Http\Requests\Shift_typeRequest;

class Shift_typesController extends Controller
{
   public function index(){
    $com_code = auth()->user()->com_code;
    $data = get_cols_where_p(new Shift_type(),array('*'),array('com_code'=>$com_code),'id','DESC',PAGINATION_COUNTER);
    return view('admins.Shifts_types.index',compact('data'));
   }
}
