@extends('layouts.admin')
@section('title', ' تعديل الضبط العام للنظام')
@section('active_page', 'active')


@section('content_header_active_link')
    <a href="{{ route('admin_panal_settings.index') }}">الضبط العام</a>
@endsection

@section('content_header_active', 'تعديل/')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center"> تحديث البيانات الضبط العام للنظام</h3>
            </div>
            <div class="card-body">
                @if (@isset($data) and !@empty($data))
                    <form action="{{ route('admin_panal_settings.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="company_name">اسم الشركة</label>
                                    <input type="text" id="company_name" class="form-control"
                                        placeholder="  ادخل اسم الشركة  "
                                        value="{{ old('company_name', $data['company_name']) }}" name="company_name">
                                    @error('company_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">هاتف الشركة</label>
                                    <input type="text" id="phone" class="form-control"
                                        placeholder="  ادخل هاتف الشركة  " value="{{ old('phone', $data['phone']) }}"
                                        name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">بريد الشركة</label>
                                    <input type="text" id="email" class="form-control"
                                        placeholder="  ادخل بريد الشركة  " value="{{ old('email', $data['email']) }}"
                                        name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="address">عنوان الشركة</label>
                                    <input type="text" id="address" class="form-control"
                                        placeholder="  ادخل عنوان الشركة  " value="{{ old('address', $data['address']) }}"
                                        name="address">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="after_minute_calculate_delay"> بعد كم دقيقة نحسب تأخير الحضور </label>
                                    <input type="text" id="after_minute_calculate_delay" class="form-control"
                                        placeholder=" ادخل بعد كم دقيقة نحسب تأخير الحضور"
                                        value="{{ old('after_minute_calculate_delay', $data['after_minute_calculate_delay']) }}"
                                        name="after_minute_calculate_delay">
                                    @error('after_minute_calculate_delay')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="after_minute_calculate_early_departure"> بعد كم دقيقة نحسب الانصراف
                                        المبكر</label>
                                    <input type="text" id="after_minute_calculate_early_departure" class="form-control"
                                        placeholder="  ادخل  بعد كم دقيقة نحسب الانصراف المبكر  "
                                        value="{{ old('after_minute_calculate_early_departure', $data['after_minute_calculate_early_departure']) }}"
                                        name="after_minute_calculate_early_departure">
                                    @error('after_minute_calculate_early_departure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="after_minute_quarterday" class="text-sm">بعد كم دقيقة مجموع الانصراف المبكر
                                        أو الحضور
                                        المتأخر نخصم ربع يوم</label>
                                    <input type="text" id="after_minute_quarterday" class="form-control"
                                        placeholder="  ادخل بعد كم دقيقة مجموع الانصراف المبكر أو الحضور المتأخر نخصم ربع يوم"
                                        value="{{ old('after_minute_quarterday', $data['after_minute_quarterday']) }}"
                                        name="after_minute_quarterday">
                                    @error('after_minute_quarterday')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="after_time_half_daycut">بعد كم مرة انصراف المبكر أو تأخير نخصم نصف يوم
                                    </label>
                                    <input type="text" id="after_time_half_daycut" class="form-control"
                                        placeholder="  ادخل بعد كم مرة انصراف المبكر أو تأخير نخصم نصف يوم    "
                                        value="{{ old('after_time_half_daycut', $data['after_time_half_daycut']) }}"
                                        name="after_time_half_daycut">
                                    @error('after_time_half_daycut')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="after_time_allday_daycut">بعد كم مرة انصراف المبكر أو تأخير نخصم يوم كامل
                                    </label>
                                    <input type="text" id="after_time_allday_daycut" class="form-control"
                                        placeholder="ادخل بعد كم مرة انصراف المبكر أو تأخير نخصم يوم كامل   "
                                        value="{{ old('after_time_allday_daycut', $data['after_time_allday_daycut']) }}"
                                        name="after_time_allday_daycut">
                                    @error('after_time_allday_daycut')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="monthly_vacation_balance"> رصيد أجازات الموظف الشهري</label>
                                    <input type="text" id="monthly_vacation_balance" class="form-control"
                                        placeholder="ادخل رصيد أجازات الموظف الشهري"
                                        value="{{ old('monthly_vacation_balance', $data['monthly_vacation_balance']) }}"
                                        name="monthly_vacation_balance">
                                    @error('monthly_vacation_balance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="after_days_begin_vacation">بعد كم يوم ينزل للموظف رصيد أجازات </label>
                                    <input type="text" id="after_days_begin_vacation" class="form-control"
                                        placeholder="  ادخل بعد كم يوم ينزل للموظف رصيد أجازات"
                                        value="{{ old('after_days_begin_vacation', $data['after_days_begin_vacation']) }}"
                                        name="after_days_begin_vacation">
                                    @error('after_days_begin_vacation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="first_balance_begin_vacation" class="text-sm">الرصيد الاولي المرحل عند
                                        تفعيل الإجازات
                                        للموظف مثل نزول عشرة أيام و نصف بعد
                                        ستة شهور للموظف </label>
                                    <input type="text" id="first_balance_begin_vacation" class="form-control"
                                        placeholder="  ادخل الرصيد الاولي المرحل عند تفعيل الإجازات للموظف"
                                        value="{{ old('first_balance_begin_vacation', $data['first_balance_begin_vacation']) }}"
                                        name="first_balance_begin_vacation">
                                    @error('first_balance_begin_vacation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sanctions_value_first_absence">قيمة خصم الأيام بعد أول مرة غياب بدون إذن
                                    </label>
                                    <input type="text" id="sanctions_value_first_absence" class="form-control"
                                        placeholder="  ادخل  قيمة خصم الأيام بعد أول مرة غياب بدون إذن"
                                        value="{{ old('sanctions_value_first_absence', $data['sanctions_value_first_absence']) }}"
                                        name="sanctions_value_first_absence">
                                    @error('sanctions_value_first_absence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sanctions_value_second_absence">قيمة خصم الأيام بعد ثاني مرة غياب بدون إذن
                                    </label>
                                    <input type="text" id="sanctions_value_second_absence" class="form-control"
                                        placeholder="  ادخل قيمة خصم الأيام بعد ثاني مرة غياب بدون إذن"
                                        value="{{ old('sanctions_value_second_absence', $data['sanctions_value_second_absence']) }}"
                                        name="sanctions_value_second_absence">
                                    @error('sanctions_value_second_absence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sanctions_value_third_absence">قيمة خصم الأيام بعد ثالث مرة غياب بدون إذن
                                    </label>
                                    <input type="text" id="sanctions_value_third_absence" class="form-control"
                                        placeholder="  ادخل  قيمة خصم الأيام بعد ثالث مرة غياب بدون إذن  "
                                        value="{{ old('sanctions_value_third_absence', $data['sanctions_value_third_absence']) }}"
                                        name="sanctions_value_third_absence">
                                    @error('sanctions_value_third_absence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sanctions_value_forth_absence">قيمة خصم الأيام بعد رابع مرة غياب بدون إذن
                                    </label>
                                    <input type="text" id="sanctions_value_forth_absence" class="form-control"
                                        placeholder="  ادخل قيمة خصم الأيام بعد رابع مرة غياب بدون إذن    "
                                        value="{{ old('sanctions_value_forth_absence', $data['sanctions_value_forth_absence']) }}"
                                        name="sanctions_value_forth_absence">
                                    @error('sanctions_value_forth_absence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success "><i class="fas fa-mark"></i>تحديث</button>
                            </div>
                        </div>
                    </form>

                @else
                    <p class="bg-danger text-center">عفوا لا يوجد بيانات لعرضها</p>
                @endif
            </div>
        </div>
    </div>
@endsection
{{-- --}}
