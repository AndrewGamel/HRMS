<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrancheRequest;
use App\Models\Branche;
use Illuminate\Http\Request;
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
    public function edit($id,BrancheRequest $request)
    {
        $com_code = auth()->user()->com_code;
          $checkExists = get_cols_where_row(new Branche(),array('*'));
       return view('admins.Branches.edit',compact('data'));
    }
    public function update()
    {
       
    }
    public function delete()
    {
       
    }
}