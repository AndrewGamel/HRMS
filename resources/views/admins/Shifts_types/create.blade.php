@extends('layouts.admin')

@section('title', ' إنشاء فرع ')

@section('content_header')
    قائمةالضبط
@endsection

@section('content_header_active_link')
    <a href="{{ route('branches.index') }}">الفروع </a>
@endsection

@section('content_header_active')
    إنشاء فرع
@endsection



@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center"> إضافة فرع جديد </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('branches.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"> أسم الفرع </label>
                                <input type="text" id="name" class="form-control" placeholder="أكتب أسم الفرع "
                                    value="{{ old('name') }}" name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address"> عتوان الفرع</label>
                                <input type="text" id="address" class="form-control" placeholder="أدخل عتوان الفرع "
                                    value="{{ old('address') }}" name="address">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone"> هاتف فرع</label>
                                <input type="text" id="phone" class="form-control" placeholder="  هاتف فرع  "
                                    value="{{ old('phone') }}" name="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">إيميل الفرع </label>
                                <input type="text" id="email" class="form-control" placeholder=" إيميل الفرع "
                                    value="{{ old('email') }}" name="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="active"> حالة التفعيل الفرع </label>
                                <select name="active" id="active" class="form-control ">
                                    <option value="0">غير مفعل</option>
                                    <option value="1" selected>مفعل</option>
                                </select>
                                @error('active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success "><i class="far fa-mark"></i>إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- --}}
