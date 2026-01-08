@extends('layouts.admin')

@section('title', ' إنشاء شفت جديد ')

@section('content_header')
    قائمةالضبط
@endsection

@section('content_header_active_link')
    <a href="{{ route('shift_types.index') }}">الشفتات </a>
@endsection

@section('content_header_active')
    إنشاء شفت
@endsection



@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center"> إضافة شفت جديد </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('shift_types.store') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">نوع الشفت </label>
                                <select name="type" id="type" class="form-control ">
                                        <option @if (old('type') == 1) selected @endif value="1"> صباحي</option>
                                        <option @if (old('type') == 2) selected @endif value="2">مسائي</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from_time">  الشفت يبدأ من الساعة</label>
                                <input type="time" id="from_time" class="form-control"
                                    value="{{ old('from_time') }}" name="from_time">
                                @error('from_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to_time"> الشفت ينتهي الي الساعة</label>
                                <input type="time" id="to_time" class="form-control"
                                       value="{{ old('to_time') }}" name="to_time">
                                @error('to_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_hours">  إجمالي الساعات</label>
                                <input type="text" id="total_hours" class="form-control" placeholder="أدخل عدد الساعات "
                                    value="{{ old('total_hours') }}" name="total_hours">
                                @error('total_hours')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="active"> حالة التفعيل الفرع </label>
                                <select name="active" id="active" class="form-control ">
                                    <option @if (old('active') == 1 ) selected @endif value="1">مفعل</option>
                                    <option @if (old('active') == 0 and old('active') != '') selected @endif value="0">غير مفعل</option>
                                </select>
                                @error('active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success "><i class="far fa-mark"></i>إضافة الشفت</button>
                            <a href="{{ route('shift_types.index') }}"class="btn btn-danger ">إلغاء</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- --}}
