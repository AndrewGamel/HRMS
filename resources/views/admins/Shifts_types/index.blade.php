@extends('layouts.admin')

@section('title', ' انواع الشفتات')

@section('content_header', ' قائمةالضبط')



@section('content_header_active_link')
    <a href="{{ route('shift_types.index') }}">الضبط الشفتات </a>
@endsection

{{-- @section('content_header_active', 'تعديل/') --}}

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center">
                    بيانات انواع الشفتات

                    <a href="{{ route('shift_types.create') }}" class="btn btn-success ">إضافة</a>
                </h3>
            </div>
            <div class="card-body">
                @if (@isset($data) && !@empty($data))

                    <table id="example2" class="table table-bordered table-hover ">
                        <thead class="thead-light">
                            <th>نوع الشفت </th>
                            <th> يبدأ من</th>
                            <th> ينتهي إلي</th>
                            <th>عدد الساعات </th>

                            <th> حالة اتفعيل</th>
                            <th>الإضافة بواسطة</th>
                            <th>التحديث بواسطة</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td> @if ($info->type == 1) صباحي @else مسائي @endif </td>
                                    <td>{{ $info->from_time }}</td>
                                    <td>{{ $info->to_time }}</td>
                                    <td>{{ $info->total_hours*1 }}</td>
                                    <td class="@if ($info['active'] == 1) bg-success  @else  bg-danger @endif">
                                        @if ($info['active'] == 1) مفعل @else غير مفعل @endif
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
                                        <a href="{{ route('shift_types.edit', $info->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('shift_types.destroy', $info->id) }}"
                                            class="btn btn-danger btn-sm my-1 are_u_sure"><i
                                                class="fas fa-trash-alt"></i></a>
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
