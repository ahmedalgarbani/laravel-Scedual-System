@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
الحجوزات
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحجز</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ حجوزات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('res_delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف الحجز بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
    @if (session()->has('ADD_RES'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافه الحجز بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
    @if (session()->has('error_res'))
        <script>
            window.onload = function() {
                notif({
                    msg: "القاعه محجوزه مسبقا من كلييه اخرا",
                    type: "danger"
                })
            }

        </script>
    @endif


    <!-- row -->
    <div class="row">
        <div class="card mg-b-20">

            <div class="card-body">
                <div class="table-responsive">
                    @if(auth()->user()->type == "admin")
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <a class="btn btn-success btn-block" href="{{route('res.create')}}">اضافه</a>
                        @endif
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="example_filter" class="dataTables_filter">
                                       </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"><table id="example" class="table key-buttons text-md-nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="example_info" style="width: 1201px;">
                                    <thead>
                                    <tr role="row">
                                        <th class="border-bottom-0 sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 194px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">#</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 292px;" aria-label="Position: activate to sort column ascending">المقرر</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 143px;" aria-label="Office: activate to sort column ascending">يوم الحجز</th>
                                        <th class="border-bottom-0 sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 194px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">بدايه الحجز</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 292px;" aria-label="Position: activate to sort column ascending">نهايه الحجز</th>
                                        <th class="border-bottom-0 sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 194px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">الكليه</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 292px;" aria-label="Position: activate to sort column ascending">رقم القاعه</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 292px;" aria-label="Position: activate to sort column ascending">موقع القاعه</th>
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 143px;" aria-label="Office: activate to sort column ascending">الاستاذ</th>
                                        @if(auth()->user()->type == "admin")
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 143px;" aria-label="Office: activate to sort column ascending">العمليات</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    @if(isset($reses))
                                    <tbody>
                                    <?php $i=0 ?>
                                    @foreach($reses as $res)
                                    <?php $i++ ?>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1">{{$i}}</td>
                                        <td>{{App\Models\Subject::where('id',$res->subject_name)->first()->subject_name}}</td>
                                        <td>{{$res->date_day}}</td>
                                        <td>{{date("h:i A", strtotime($res->start))}}</td>
                                        <td>{{date("h:i A", strtotime($res->end))}}</td>
                                        <td>{{App\Models\Collage::where('id',$res->collage_id)->first()->collage_name}}</td>
                                        <td>{{App\Models\ClassRoom::where('id',$res->class_id)->first()->class_number}}</td>
                                        <td>{{App\Models\ClassRoom::where('id',$res->class_id)->first()->location}}</td>
                                        <td>{{App\Models\Teacher::where('id',$res->teacher_id)->first()->name}}</td>
                                        @if(auth()->user()->type == "admin")
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{route('res.edit',$res->id)}}">تعديل</a>

                                            <button class="btn btn-danger btn-sm "
                                                    data-del="{{ $res->id }}"
                                                    data-toggle="modal"
                                                    data-target="#modaldemo9">حذف</button>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <!-- delete -->
                            <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">حذف حجز</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('res.destroy')}}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <div class="modal-body">
                                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                <input type="hidden" name="id" id="id" >
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                <button type="submit" class="btn btn-danger">تاكيد</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
    <script>
        //deltee
        $('#modaldemo9').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var res_id = button.data('del')
            var modal = $(this)
            modal.find('.modal-body #id').val(res_id)

        })
    </script>

@endsection
