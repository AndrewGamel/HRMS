@extends('layouts.admin')

@section('title', ' المؤهلات ')

@section('content_header',' قائمةالضبط')



@section('content_header_active_link')
    <a href="{{ route('qualifications.index') }}">الضبط المؤهلات </a>
@endsection

{{-- @section('content_header_active', 'تعديل/') --}}

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center">
                    بيانات المؤهلات للموظفيين

                    <a href="{{ route('qualifications.create') }}" class="btn btn-success ">إضافة</a>
                </h3>
            </div>
            <div class="card-body">
                @if (@isset($data) and !@empty($data))

                    <table id="example2" class="table table-bordered table-hover ">
                        <thead class="thead-light">
                            <th>كود الفرع</th>
                            <th> الاسم</th>
                            <th> العنوان</th>
                            <th>الهاتف </th>
                            <th>الايميل </th>
                            <th> حالة اتفعيل</th>
                            <th>الإضافة بواسطة</th>
                            <th>التحديث بواسطة</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td class="@if ($info['active'] == 1) bg-success  @else  bg-danger @endif">
                                @if ($info['active'] == 1)
                                    مفعل
                                @else
                                    غير مفعل
                                @endif
                            </td>
                                    <td>{{ $info->addedBy->name }}</td>
                                    <td>
                                        @if ($info->updated_by > 0)
                                            {{ $info->updatedBy->name }}
                                        @else
                                            لا يوجد
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('qualifications.edit', $info->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('qualifications.destroy', $info->id) }}" class="btn btn-danger btn-sm my-1 are_u_sure"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="bg-danger text-center">عفوا لا يوجد بيانات لعرضها</p>
                @endif
            </div>
        </div>
    </div>
@endsection
