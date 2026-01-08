<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Shift_type;
use App\Http\Requests\Shift_typeRequest;
use Illuminate\Support\Facades\DB;

class Shift_typesController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_p(new Shift_type(), array('*'), array('com_code' => $com_code), 'id', 'DESC', PAGINATION_COUNTER);
        return view('admins.Shifts_types.index', compact('data'));
    }
    public function create()
    {
        return view('admins.Shifts_types.create');
    }
    public function store(Shift_typeRequest $request)
    {
        try {
            $dataToInset['com_code'] =auth()->user()->com_code;
            $dataToInset['type'] = $request->type;
            $dataToInset['from_time'] = $request->from_time;
            $dataToInset['to_time'] = $request->to_time;
            $dataToInset['total_hours'] = $request->total_hours;
            $checkExists = get_cols_where_row(new Shift_type(), array('id'),$dataToInset);
            if (!empty($checkExists)) {
                return redirect()->back()->with(['error' => 'عفوا هذه البيانات مسجلة من قبل  !'])->withInput();
            }

            $dataToInset['active'] = $request->active;
            $dataToInset['added_by'] = auth()->user()->id;
            DB::beginTransaction();
            insert(new Shift_type(), $dataToInset);
            DB::commit();
            return redirect()->route('shift_types.index')->with(['success' => 'تم إدخال البيانات بنجاح']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }
    }
}