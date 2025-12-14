<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance_calender;
use App\Models\Finance_cln_period;
use App\Models\Months;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\Finance_calenderRequest;
use DateInterval;
use DatePeriod;
use DateTime;

class Finance_calendersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Finance_calender::select('*')->orderby('FINANCE_YR', 'DESC')->paginate(PAGINATION_COUNTER);
        return view('admins.Finance_calender.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $finance_calender = new Finance_calender();
        return view('admins.Finance_calender.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Finance_calenderRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataToInsert['FINANCE_YR'] = $request->FINANCE_YR;
            $dataToInsert['FINANCE_YR_DESC'] = $request->FINANCE_YR_DESC;
            $dataToInsert['start_date'] = $request->start_date;
            $dataToInsert['end_date'] = $request->end_date;
            $dataToInsert['com_code'] = auth()->user()->com_code;
            $dataToInsert['added_by'] = auth()->user()->id;

            $flag = Finance_calender::insert($dataToInsert);
            if ($flag) {
                $dataParent = Finance_calender::select('id')->where($dataToInsert)->first();
                $startDate = new DateTime($request->start_date);
                $endDate = new DateTime($request->end_date);
                $dateInterval = new DateInterval('P1M');
                $datePeriod = new DatePeriod($startDate, $dateInterval, $endDate);

                foreach ($datePeriod as $date) {
                    $dataMonth['finance_calenders_id'] = $dataParent['id'];
                    $monthName_en = $date->format('F');
                    $dataParentMonth = Months::select('id')->where('name_en', $monthName_en)->first();
                    $dataMonth['START_DATE_M'] = date('y-m-01', strtotime($date->format('y-m-d')));
                    $dataMonth['END_DATE_M'] = date('y-m-t', strtotime($date->format('y-m-d')));
                    $dataMonth['FINANCE_YR'] = $dataToInsert['FINANCE_YR'];
                    $dataMonth['MONTH_ID'] = $dataParentMonth['id'];
                    $dataMonth['year_and_month'] = date('y-m', strtotime($date->format('y-m-d')));
                    $datediff = strtotime($dataMonth['END_DATE_M']) -  strtotime($dataMonth['START_DATE_M']);
                    $dataMonth['number_of_days'] = round($datediff / (60 * 60 * 24)) + 1;
                    $dataMonth['start_date_for_pasma'] = date('y-m-01', strtotime($date->format('y-m-d')));
                    $dataMonth['end_date_for_pasma'] = date('y-m-t', strtotime($date->format('y-m-d')));
                    $dataMonth['com_code'] =  auth()->user()->com_code;
                    $dataMonth['updated_by'] = auth()->user()->id;
                    $dataMonth['added_by'] = auth()->user()->id;
                    $dataMonth['updated_at'] = date('y-m-d-H-i-s');
                    $dataMonth['created_at'] = date('y-m-d-H-i-s');
                    Finance_cln_period::insert($dataMonth);
                }
            }
            DB::commit();
            return redirect()->route('finance_calenders.index')->with(['success'=>'تم إدخال البيانات بنجاح']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Finance_calender $finance_calender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finance_calender $finance_calender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finance_calender $finance_calender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Finance_calender::select('*')->where('id', $id)->first();
            if (empty($data)) {
                return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما']);
            }
            if ($data['is_open'] == 1) {
                return redirect()->back()->with(['error' => 'عفوا السنة المالية مفتوحة']);
            }
            $flag = Finance_calender::where('id', $id)->delete();
            // OPTIONAL  MANUAL DELETE
            if ($flag) {
                Finance_cln_period::where('finance_calenders_id', $id)->delete();
            }
            return redirect()->route('finance_calenders.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عفوا هناك خطأ ما' . $th->getMessage()]);
        }
    }
}
