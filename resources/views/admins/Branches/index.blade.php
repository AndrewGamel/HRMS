@extends('layouts.admin')

@section('title', ' الفروع ')

@section('content_header_active_link')
    <a href="{{ route('branches.index') }}">الضبط الفروع </a>
@endsection

{{-- @section('content_header_active', 'تعديل/') --}}

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center">
                    بيانات فروع الشركة

                    <a href="{{ route('branches.create') }}" class="btn btn-success ">إضافة</a>
                </h3>
            </div>
            <div class="card-body">
                @if (@isset($data) and !@empty($data))

                    <table id="example2" class="table table-bordered table-hover ">
                        <thead class="thead-light">
                            <th>كود السنة</th>
                            <th>وصف السنة</th>
                            <th>تاريخ البداية</th>
                            <th>تاريخ النهاية</th>
                            <th>الأضافة بوايطة</th>
                            <th>التحديث بواسطة</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->FINANCE_YR }}</td>
                                    <td>{{ $info->FINANCE_YR_DESC }}</td>
                                    <td>{{ $info->start_date }}</td>
                                    <td>{{ $info->end_date }}</td>
                                    <td>{{ $info->addedBy->name }}</td>
                                    <td>
                                        @if ($info->updated_by > 0)
                                            {{ $info->updatedBy->name }}
                                        @else
                                            لا يوجد
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('branches.edit', $info->id) }}" class="btn btn-warning btn-sm">تحديث</a>
                                        <a href="{{ route('branches.delete', $info->id) }}" class="btn btn-danger btn-sm my-1 are_u_sure"><i class="fas fa-trash-alt"></i></a>
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
