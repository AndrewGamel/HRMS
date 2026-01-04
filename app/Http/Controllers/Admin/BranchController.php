<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrancheRequest;
use App\Models\Branche;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_p(new Branche(), array('*'), array("com_code" => $com_code), 'id', 'DESC', PAGINATION_COUNTER);
        return view('admins.Branches.index', compact('data'));
    }

    public function create()
    {
        return view('admins.Branches.create');
    }
    public function store(BrancheRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExists = get_cols_where_row(new Branche(), array('id'), array('com_code' => $com_code, 'name' => $request->name));
            if (!empty($checkExists)) {
                return redirect()->back()->with(['error' => '!عفوا أسم الفرع مسجل من قبل  '])->withInput();
            }
            DB::beginTransaction();
            $dataToInsert['name'] = $request->name;
            $dataToInsert['address'] = $request->address;
            $dataToInsert['phone'] = $request->phone;
            $dataToInsert['email'] = $request->email;
            $dataToInsert['active'] = $request->active;
            $dataToInsert['added_by'] =  auth()->user()->id;
            $dataToInsert['com_code'] = auth()->user()->com_code;
            insert(new Branche(), $dataToInsert);
            DB::commit();
            return redirect()->route('branches.index')->with(['success' => 'تم إدخال البيانات بنجاح']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }
    }
    public function edit($id)
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_row(new Branche(), array('*'), array('id' => $id, 'com_code' => $com_code));
        if (empty($data)) {
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }
        return view('admins.Branches.edit', compact('data'));
    }
    public function update($id, BrancheRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Branche(), array('*'), array('com_code' => $com_code, 'id' => $id));
            if (empty($data)) {
                return redirect()->back()->with(['error' => '!عفوا غير قادر للوصول لبيانات  المطلوبة    '])->withInput();
            }
            DB::beginTransaction();
            $dataToUpdate['name'] = $request->name;
            $dataToUpdate['address'] = $request->address;
            $dataToUpdate['phone'] = $request->phone;
            $dataToUpdate['email'] = $request->email;
            $dataToUpdate['active'] = $request->active;
            $dataToUpdate['updated_by'] =  auth()->user()->id;
            $dataToUpdate['com_code'] = auth()->user()->com_code;
            update(new Branche(), $dataToUpdate, array('com_code' => $com_code, 'id' => $id));
            DB::commit();
            return redirect()->route('branches.index')->with(['success' => 'تم تعديل البيانات بنجاح']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }
    }
    public function destroy($id) {
         try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Branche(), array('*'), array('com_code' => $com_code, 'id' => $id));
            if (empty($data)) {
                return redirect()->back()->with(['error' => '!عفوا غير قادر للوصول لبيانات  المطلوبة    '])->withInput();
            }
            DB::beginTransaction();
            destroy(new Branche(), array('com_code' => $com_code, 'id' => $id));
            DB::commit();
            return redirect()->route('branches.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }

    }
}
