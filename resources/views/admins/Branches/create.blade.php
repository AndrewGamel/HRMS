@extends('layouts.admin')

@section('title', ' إنشاء فرع ')

@section('active_page', 'active')


@section('content_header_active_link')
    <a href="{{ route('finance_calenders.index') }}">الضبط السنوات المالية</a>
@endsection

{{-- @section('content_header_active', 'تعديل/') --}}

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center"> تكويد سنة المالية جديدة</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('finance_calenders.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="FINANCE_YR"> كود السنة المالية</label>
                                <input type="text" id="FINANCE_YR" class="form-control" placeholder=" كود السنة "
                                    value="{{ old('FINANCE_YR') }}" name="FINANCE_YR">
                                @error('FINANCE_YR')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="FINANCE_YR_DESC"> وصف السنة المالية</label>
                                <input type="text" id="FINANCE_YR_DESC" class="form-control"
                                    placeholder=" وصف السنة " value="{{ old('FINANCE_YR_DESC') }}"
                                    name="FINANCE_YR_DESC">
                                @error('FINANCE_YR_DESC')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date"> بداية السنة المالية</label>
                                <input type="date" id="start_date" class="form-control" placeholder=" بداية السنة "
                                    value="{{ old('start_date') }}" name="start_date">
                                @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">النهاية السنة المالية</label>
                                <input type="date" id="end_date" class="form-control" placeholder=" النهاية السنة "
                                    value="{{ old('end_date') }}" name="end_date">
                                @error('end_date')
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
