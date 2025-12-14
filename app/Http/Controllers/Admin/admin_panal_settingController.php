<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_panal_setting;
use App\Http\Requests\Admin_panal_settingRequest;

class admin_panal_settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Admin_panal_setting::select('*')->Where('com_code', $com_code)->first();
        return view('admins.Admin_panal_setting.index', compact(['data']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin_panal_setting $admin_panal_setting)
    {
        $com_code = auth()->user()->com_code;
        $data = Admin_panal_setting::select('*')->Where('com_code', $com_code)->first();
        return view('admins.Admin_panal_setting.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Admin_panal_settingRequest $request)
    {

        try {
            $com_code = auth()->user()->com_code;
           $dataToUpdate['company_name'] = $request->company_name;
           $dataToUpdate['phone'] = $request->phone;
           $dataToUpdate['sanctions_value_forth_absence'] = $request->sanctions_value_forth_absence;
           $dataToUpdate['address'] = $request->address;
           $dataToUpdate['email'] = $request->email;
           $dataToUpdate['after_minute_calculate_delay'] = $request->after_minute_calculate_delay;
           $dataToUpdate['after_minute_calculate_early_departure'] = $request->after_minute_calculate_early_departure;
           $dataToUpdate['after_minute_quarterday'] = $request->after_minute_quarterday;
           $dataToUpdate['after_time_half_daycut'] = $request->after_time_half_daycut;
           $dataToUpdate['after_time_allday_daycut'] = $request->after_time_allday_daycut;
           $dataToUpdate['monthly_vacation_balance'] = $request->monthly_vacation_balance;
           $dataToUpdate['after_days_begin_vacation'] = $request->after_days_begin_vacation;
           $dataToUpdate['first_balance_begin_vacation'] = $request->first_balance_begin_vacation;
           $dataToUpdate['sanctions_value_first_absence'] = $request->sanctions_value_first_absence;
           $dataToUpdate['sanctions_value_second_absence'] = $request->sanctions_value_second_absence;
           $dataToUpdate['sanctions_value_third_absence'] = $request->sanctions_value_third_absence;
           $dataToUpdate['updated_by'] = auth()->user()->id;
            Admin_panal_setting::where(['com_code'=> $com_code])->update($dataToUpdate);
           
            return redirect()->route('admin_panal_settings.index')->with('success','تم تعديل بنجاح');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما'])->withInput();
        }
    }
}
