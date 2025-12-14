@extends('layouts.admin')

@section('title', 'الضبط العام للنظام')
@section('active_page','active')


@section('contentheader', ' قائمة الضبط')

@section('content_header_active_link')
    <a href="{{ route('admin_panal_settings.index') }}">الضبط العام</a>
@endsection

@section('content_header_active')


@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center"> بيانات الضبط العام للنظام</h3>
            </div>
            <div class="card-body">
               

                @if (@isset($data) and !@empty($data))
                    <table id="example2" class="table table-bordered table-hover">

                        <tr>
                            <td class="width_30">اسم الشركة</td>
                            <td>{{ $data['company_name'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">هاتف الشركة</td>
                            <td>{{ $data['phone'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">حالة التفعييل</td>
                            <td class="@if ($data['system_status'] == 1) bg-success  @else  bg-danger @endif">
                                @if ($data['system_status'] == 1)
                                    مفعل
                                @else
                                    غير مفعل
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="width_30">بريد الشركة</td>
                            <td>{{ $data['email'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">عنوان الشركة</td>
                            <td>{{ $data['address'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">بعد كم دقيقة نحسب تأخير الحضور </td>
                            <td>{{ $data['after_minute_calculate_delay'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30"> بعد كم دقيقة نحسب الانصراف المبكر</td>
                            <td>{{ $data['after_minute_calculate_early_departure'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">بعد كم دقيقة مجموع الانصراف المبكر أو الحضور المتأخر نخصم ربع يوم </td>
                            <td>{{ $data['after_minute_quarterday'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">بعد كم مرة انصراف المبكر أو تأخير نخصم نصف يوم </td>
                            <td>{{ $data['after_time_half_daycut'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">بعد كم مرة انصراف المبكر أو تأخير نخصم يوم كامل </td>
                            <td>{{ $data['after_time_allday_daycut'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">رصيد أجازات الموظف الشهري </td>
                            <td>{{ $data['monthly_vacation_balance'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">بعد كم يوم ينزل للموظف رصيد أجازات </td>
                            <td>{{ $data['after_days_begin_vacation'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">الرصيد الاولي المرحل عند تفعيل الإجازات للموظف مثل نزول عشرة أيام و نصف بعد
                                ستة شهور للموظف </td>
                            <td>{{ $data['first_balance_begin_vacation'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">قيمة خصم الأيام بعد أول مرة غياب بدون إذن </td>
                            <td>{{ $data['sanctions_value_first_absence'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">قيمة خصم الأيام بعد ثاني مرة غياب بدون إذن </td>
                            <td>{{ $data['sanctions_value_second_absence'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">قيمة خصم الأيام بعد ثالث مرة غياب بدون إذن </td>
                            <td>{{ $data['sanctions_value_third_absence'] }}</td>
                        </tr>
                        <tr>
                            <td class="width_30">قيمة خصم الأيام بعد رابع مرة غياب بدون إذن </td>
                            <td>{{ $data['sanctions_value_forth_absence'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><a href="{{ route('admin_panal_settings.edit') }}" class="btn btn-danger btn-sm  ">
                                  <i class="right fas fa-edit"></i>  تعديل</a></td>
                        </tr>
                    </table>
                @else
                    <p class="bg-danger text-center">عفوا لا يوجد بيانات لعرضها</p>
                @endif
            </div>
        </div>
    </div>
@endsection
