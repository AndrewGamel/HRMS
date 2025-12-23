@extends('layouts.admin')

@section('title', ' السنوات المالية ')

@section('active_page', 'active')


@section('content_header_active_link')
    <a href="{{ route('finance_calenders.index') }}">الضبط السنوات المالية</a>
@endsection

{{-- @section('content_header_active', 'تعديل/') --}}

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title card_title_center">البيانات السنوات المالية
                    <a href="{{ route('finance_calenders.create') }}" class="btn btn-success ">إضافة</a>
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
                                        @if ($info->is_open == 0)

                                                <a href="{{ route('finance_calenders.do_open', $info->id) }}"
                                                     class="btn @if ($checkIsOpenCount == 0) btn-primary @else   btn-primary disabled @endif btn-sm">
                                                    <i class="fas @if ($checkIsOpenCount == 0) fa-lock-open @else fa-lock @endif"></i> </a>


                                            <a href="{{ route('finance_calenders.edit', $info->id) }}"class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                            <a href="{{ route('finance_calenders.delete', $info->id) }}"class="btn btn-danger btn-sm my-1 are_u_sure"><i class="fas fa-trash-alt"></i></a>
                                            <button class="btn btn-info btn-sm my-1 show_year_month" data-toggle="modal"
                                                data-target="#modal-secondary" data-id="{{ $info->id }}"><i
                                                    class="fas fa-eye"></i>
                                            </button>
                                        @else
                                            السنة المالية مفتوحة
                                        @endif

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


    <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog modal-xl text-center">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h4 class="modal-title "> شهور السنة المالية</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="show_year_month_Body">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.show_year_month', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "post",
                    url: '{{ route('finance_calenders.show_year_month') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    dataType: "html",
                    cache: false,
                    success: function(data) {
                        $('#show_year_month_Body').html(data);
                        //  $('#modal-secondary').modal("show");
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>

@endsection
