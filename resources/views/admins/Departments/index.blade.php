@extends('layouts.admin')

@section('title', ' انواع الأدارات')

@section('content_header', ' قائمةالضبط')



@section('content_header_active_link')
    <a href="{{ route('departments.index') }}">الضبط الأدارات </a>
@endsection


@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center">
                    بيانات انواع الأدارات

                    <a href="{{ route('departments.create') }}" class="btn btn-success ">إضافة</a>
                </h3>
            </div>
            <div class="card-body">
                @if (@isset($data) && !@empty($data) && count($data)>0)

                    <table id="example2" class="table table-bordered table-hover ">
                        <thead class="thead-light">
                            <th>   أسم الأدارة </th>
                            <th>  الهاتف</th>
                            <th> حالة اتفعيل</th>
                            <th>الإضافة بواسطة</th>
                            <th>التحديث بواسطة</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td class="@if ($info['active'] == 1) bg-success  @else  bg-danger @endif">
                                        @if ($info['active'] == 1) مفعل @else غير مفعل @endif
                                    </td>
                                    <td>@php
                                        $dt = new DateTime($info->created_at);
                                        $time = $dt->format('H:i');
                                        $time12 = date('h:i', strtotime($info->created_at));
                                        $date = $dt->format('Y-m-d');
                                        $day = date('l', strtotime($date));
                                        $newDatetime = date('A', strtotime($time));
                                        $newDateTimeType = (( $newDatetime == 'AM')?'صباحاَ' : 'مساء');
                                    @endphp
                                    {{ $time12. ' '. $newDateTimeType }}<br>
                                    {{ $day .' '. $date }}<hr>
                                        {{ $info->addedBy->name }}
                                    </td>
                                     <td>
                                        @if ($info->updated_by > 0)
                                         @php
                                        $dt = new DateTime($info->updated_at);
                                        $time = $dt->format('H:i');
                                        $time12 = date('h:i', strtotime($info->updated_at));
                                        $date = $dt->format('Y-m-d');
                                        $day = date('l', strtotime($date));
                                        $newDatetime = date('A', strtotime($time));
                                        $newDateTimeType = (( $newDatetime == 'AM')?'صباحاَ' : 'مساء');
                                    @endphp
                                      {{  $time12. " ". $newDateTimeType }}<br>
                                    {{ $day .' '. $date }}<hr>
                                            {{ $info->updatedBy->name }}
                                        @else
                                            لا يوجد
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('departments.edit', $info->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('departments.destroy', $info->id) }}" class="btn btn-danger btn-sm my-1 are_u_sure"><i class="fas fa-trash-alt"></i></a>
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
