<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="font-family: 'Cairo', sans-serif;" >مستفي الاقصى</title>
    <!-- favicon -->
    <link rel="icon" type="asset/image/png" href="asset/images/logo.png">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <!-- Bootstrap RTL -->
    <link rel="stylesheet" href="asset/css/bootstrap-rtl.css">
    <!--  Custom css  -->
    <link rel="stylesheet" href="asset/css/custom.css?v=<?php echo time(); ?>">
    <!-- Font -->
    <link rel="stylesheet" href="asset/font/droid-kufi.css">


    <link rel="stylesheet" href="asset/css/lightbox.min.css">

    <script type="text/javascript" src="asset/js/lightbox-plus-jquery.min.js"></script>

</head>

<body>

    <!--    Start navbar    -->
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a href="index.php" class="navbar-brand"><img width="80px" src="asset/images/logo.jpg"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link">الرئسية</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/specialty')}}" class="nav-link">تخصصاتنا</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/dates')}}" class="nav-link">مواعيدنا</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/servicese')}}" class="nav-link">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('viewBook')}}" class="nav-link">حجز موعد</a>
                    </li>
                        <button type="button" class="btn btn-outline-success"><a href="{{route('login')}}" class="nav-link">تسجيل الدخول </a></button>


                </ul>
            </div>
        </div>
    </nav>
    <!--    End navbar    -->

<!-- ======= Book A Section ======= -->
        <section id="book-a-table" class="book-a-table p-4">
            <div class="container">
                <div class="section-title">
                    <h2 style="text-align-last: center; padding: 10px; border-bottom: 5px solid rgb(21, 226, 35); width: 20%; position: relative; right: 50%; transform: translate(50% , 0)">حجز مواعيد</h2>
                </div>
                <form method="POST" action="{{ isset($appointment) ? route('appointments.update', $appointment->id) : route('appointments.store') }}" class="email-form p-5">
                    
                    @csrf
                    <div class="form-group form-group-last">
                        <div class="alert alert-secondary" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                            <div class="alert-text">
                                يمكنك حجز موعد جديد من هنا.
                            </div>
                        </div>
                    </div>


                    @if (isset($appointment))
                                    @method('PUT')
                        @endif
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>إسم المريض</label>
                            <div class="input-group">
                                
                                @if (isset($patients))
                                <select class="form-control text-black" name="patient" id="patient">
                                    <option>إختيار المريض</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            @if (isset($appointment)) {{ $patient->id == $appointment->patient_id ? 'selected' : '' }} @endif>
                                            {{ $patient->first_name }} {{ $patient->last_name }}</option>
                                    @endforeach
                                </select>
                            @endif
                            </div>
                        </div> 

                        <div class="form-group col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>إسم الطبيب</label>
                            <div class="input-group">
                                
                                @if (isset($doctors))
                                <select class="form-control text-black" name="doctor_id" id="doctor_id">
                                    <option>إختيار الطبيب</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            @if (isset($appointment)) {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }} @endif>
                                            {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                    @endforeach
                                </select>
                            @endif
                             
                            </div>
                        </div>

                        <div class="form-group col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>القسم</label>
                            <div class="input-group">
                                
                                @if (isset($departments))
                                    <select class="form-control" name="department" id="department">
                                        <option>إختيار القسم</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                @if (isset($appointment)) {{ $department->id == $appointment->department_id ? 'selected' : '' }} @endif>
                                                {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>


                        
                        <div class="form-group col-lg-4 col-md-6 form-group mt-3 mt-md-0" id="dateDiv">
                            <label>الموعد</label>
                            <div class="input-group">
                                
                                <input class="form-control" type="date" name="date" 
                                    placeholder="إختيار اليوم"
                                    @if (isset($appointment)) value="{{ $appointment->date }}" @endif>
                            </div>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 form-group mt-3 mt-md-0" id="timeSlotsDiv">
                            <label>الأوقات المتاحة</label>
                            <div class="input-group">
        
                                <input type="time" name="timeSlots" class="form-control"
                                @if (isset($appointment)) value="{{ $appointment->time }}" @endif>
                            </div>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <label>الحالة</label>
                            <div class="input-group">
                                
                                <select class="form-control" name="status" id="status">
                                    <option value="مؤكدة">مؤكدة</option>
                                    <option value="انتظار">انتظار</option>
                                    <option value="ملغيه">ملغيه</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="notes" id="notes" rows="5" placeholder="رسالة ...">
                            {{ isset($appointment) ? $appointment->notes : '' }}
                        </textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="{{ isset($appointment) ? 'تحديث' : 'حفظ' }}" class="btn" style="background-color: rgb(21, 226, 35); color: white; border: none; border-radius: 10px; padding: 10px 30px; outline-color: rgb(21, 226, 35);">
                        </div>
                </form>

            </div>
        </section>
        <!-- End Book A Section -->


<footer class="text-center">
    <strong>    جميع الحقوق محفوظة  {{ now()->year }}-{{ now()->year+1 }} &copy;<a href="#">{{ env('APP_NAME') }}</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ env('APP_VERSION') }}
    </footer>
    <!-- End Footer -->

    <!-- jQuery -->
    <script src="asset/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="asset/js/bootstrap.min.js"></script>



 


    </body>
</html>

