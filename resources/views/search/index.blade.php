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
     حجوزات {{auth()->user()->name}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">حجوزاتي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ حجوزات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="card mg-b-20">

            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <form class="form-group" method="post" action="{{route('search-res')}}">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">اسم الاستاذ</label>
                                        <input type="text" class="form-control" disabled value="{{auth()->user()->name}}" id="inputName" name="start_date">
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label">من تاريخ</label>
                                        <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="inputName" name="start_date">
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label"> الى تاريخ</label>
                                        <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="inputName" name="end_date">
                                    </div>
                                </div>
                                <br>

                                <button type="submit" class="btn btn-success">search</button>
                            </form>
                        </div>
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
                                        <th class="border-bottom-0 sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 143px;" aria-label="Office: activate to sort column ascending">موقع القاعه</th>
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

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @endif
                                </table>
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


@endsection
