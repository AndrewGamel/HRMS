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
            $dataToInset['com_code'] = auth()->user()->com_code;
            $dataToInset['type'] = $request->type;
            $dataToInset['from_time'] = $request->from_time;
            $dataToInset['to_time'] = $request->to_time;
            $dataToInset['total_hours'] = $request->total_hours;
            $checkExists = get_cols_where_row(new Shift_type(), array('id'), $dataToInset);
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
    public function edit($id)
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_row(new Shift_type(), array('*'), array('com_code' => $com_code, 'id' => $id));
        if (empty($data)) {
            return redirect()->back()->with(['error' => 'عفوا غير قادر للوصول للبيانات مسجلة من قبل  !'])->withInput();
        }
        return view('admins.Shifts_types.edit', compact('data'));
    }
    public function update($id, Shift_typeRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Shift_type(), array('*'), array('com_code' => $com_code, 'id' => $id));
            if (empty($data)) {
                return redirect()->back()->with(['error' => 'عفوا غير قادر للوصول للبيانات مسجلة من قبل  !'])->withInput();
            }
            $checkExists = Shift_type::select('id')->where('com_code', $request->com_code)
                ->where('type', $request->type)->where('from_time', $request->from_time)->where('to_time', $request->to_time)
                ->where('total_hours', $request->total_hours)->where('id', '!=', $id)->first();
            if (!empty($checkExists)) {
                return redirect()->back()->with(['error' => 'عفوا هذه البيانات مسجلة من قبل  !'])->withInput();
            }
            $dataToUpdate['com_code'] = auth()->user()->com_code;
            $dataToUpdate['type'] = $request->type;
            $dataToUpdate['from_time'] = $request->from_time;
            $dataToUpdate['to_time'] = $request->to_time;
            $dataToUpdate['total_hours'] = $request->total_hours;
            $dataToUpdate['updated_by'] = auth()->user()->id;
            $dataToUpdate['active'] = $request->active;
            DB::beginTransaction();
            update(new Shift_type(), $dataToUpdate, array('com_code' => $com_code, 'id' => $id));
            DB::commit();
            return redirect()->route('shift_types.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            $com_code = auth()->user()->com_code;
        $data = get_cols_where_row(new Shift_type(), array('id'), array('com_code' => $com_code, 'id' => $id));
        if (empty($data)) {
            return redirect()->back()->with(['error' => 'عفوا غير قادر للوصول للبيانات مسجلة من قبل  !'])->withInput();
        }
              DB::beginTransaction();
            destroy(new Shift_type(), array('com_code' => $com_code, 'id' => $id));
            DB::commit();
             return redirect()->route('shift_types.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }

    }
}
