@extends('layouts.admin')

@section('title', ' إنشاء شفت جديد ')

@section('content_header')
    قائمةالضبط
@endsection

@section('content_header_active_link')
    <a href="{{ route('departments.index') }}">الشفتات </a>
@endsection

@section('content_header_active')
    إنشاء إدارة
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
                                <label for="name">   اسم الأدارة</label>
                                <input type="text" id="name" class="form-control" placeholder="أدخل اسم الأدارة "
                                    value="{{ old('name') }}" name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">  هاتف الأدارة</label>
                                <input type="text" id="phone" class="form-control" placeholder="أدخل هاتف الأدارة "
                                    value="{{ old('phone') }}" name="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="active"> حالة التفعيل الأدارة </label>
                                <select name="active" id="active" class="form-control ">
                                    <option @if (old('active') == 0 and old('active') != '') selected @endif value="0">غير مفعل</option>
                                    <option @if (old('active') == 1 ) selected @endif value="1">مفعل</option>
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

