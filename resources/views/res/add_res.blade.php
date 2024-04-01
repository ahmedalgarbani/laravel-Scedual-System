@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <!-- Bootstrap stylesheet -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- ClockPicker Stylesheet -->
    <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
    <!--Internal   Notify -->
    <link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    الحجوزات - اضافة حجز
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة حجز</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

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
                    type: "warning"
                })
            }

        </script>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('res.store') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        @method('POST')
                        @csrf
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الكليه</label>
                                <select name="collage_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد الكليه</option>
                                    @foreach ($collages as $collage)
                                        <option value="{{ $collage->id }}"> {{ $collage->collage_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الاستاذ</label>
                                <select id="teacher" name="teacher_id" class="form-control"
                                        onchange="console.log($(this).val())"
                                        onclick="console.log($(this).val())"
                                >
                                </select>
                            </div>


                            <div class="col">
                                <label for="inputName" class="control-label">الماده</label>
                                <select id="subject" name="subject_name" class="form-control"
                                >
                                    <option value="" selected disabled>حدد الماده</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"> {{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">القاعه الدراسيه</label>
                                <select id="class_id" name="class_id" class="form-control"
                                >
                                    <option value="" selected disabled>حدد القاعه</option>
                                    @foreach ($classRooms as $classRoom)
                                        <option value="{{ $classRoom->id }}"> {{ $classRoom->class_number }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label>تاريخ الحجز</label>
                                <input class="form-control fc-datepicker" name="date_day" placeholder="YYYY-MM-DD"
                                       type="text" value="{{ date('Y-m-d') }}" required>
                            </div>



                            <div class="col">
                                <label>وقت البدايه</label>
                                <input class="form-control " id="timepicker" name="start" placeholder="YYYY-MM-DD"
                                       type="time" value="00:00" required>
                            </div>

                            <div class="col">
                                <label>وقت النهايه</label>
                                <input class="form-control clockpicker" name="end" placeholder="YYYY-MM-DD"
                                       type="time" value="00:00"  required>
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">



                        </div>

                        {{-- 4 --}}


                        {{-- 5 --}}
                        <div class="row">

                        </div>



                        <br>


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!-- jQuery and Bootstrap scripts -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <!-- ClockPicker script -->
    <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker()
            .find('input').change(function(){
            // TODO: time changed
            console.log(this.value);
        });
        $('#demo-input').clockpicker({
            autoclose: true
        });


    </script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
         $(document).ready(function(){
            $('#timepicker').timepacker()
        });

    </script>

    <script>
        $(document).ready(function() {
            $('select[name="collage_id"]').on('change', function() {
                var collageid = $(this).val();
                if (collageid) {
                    $.ajax({
                        url: "{{ URL::to('collage_s') }}/" + collageid,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="teacher_id"]').empty();
                            $.each(data, function(key, value) {
                                console.log(key)
                                $('select[name="teacher_id"]').append('<option value="' +
                                    key + '"  >' + value + '</option>');
                            });

                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });



    </script>




@endsection
