<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>نظام عيادة خارجية</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dist/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/adminlte/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('dist/adminlte/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('dist/adminlte/css/custom-style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-light">
            <!-- Brand Logo -->
            <a href="{{ url('/home') }}" class="brand-link">
                <img src="{{ asset('dist/img/logo.jpg') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">لوحة التحكم</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div>
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image  mr-1 ">
                            <img src="{{ asset('dist/img/doctor.jpg') }}" class="img-circle elevation-2"
                                alt="User Image">

                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->type }}</a>
                            <a href="#" class="d-block" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                        </div>
                    </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    المستخدمين
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('users/doctor/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            الأطباء
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('users/doctor/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة الأطباء</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('users/doctor/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة طبيب</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('users/nurses/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            الممرضين
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('users/nurses/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة الممرضين</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('users/nurses/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة ممرض</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('users/receptionists/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            موظف الاستقبال
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('users/receptionists/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة موظف الاستقبال</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('users/receptionists/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة موظف الاستقبال</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('users/laboratorists/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            العمال
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('users/laboratorists/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة العمال</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('users/laboratorists/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة عامل</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('users/pharmacists/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            الصيادلة
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('users/pharmacists/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة الصيادلة
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('users/pharmacists/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة صيدلي</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('departments/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    الأقسام
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('departments/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة الأقسام</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('departments/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة قسم</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('users/patients/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    ملفات المرضى
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('users/patients/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة ملفات المرضى</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('users/patients/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة ملف مريض جديد</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('accountants/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    تذاكر الدخول
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('accountants/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة تذاكر الدخول</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('accountants/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة تذكرة مريض</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('/casehistories') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    العناية بالمريض
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/casehistories') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة المرضي</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('casehistories/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة جديد</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    بنك الدم
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('blood_bank/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            المتبرعين
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('blood_bank/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة المتبرعين</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('blood_bank/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة متبرع</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('blood_bank/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            التبرع بالدم
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('blood_bank/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة التبرع</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('blood_bank/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة تبرع</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    المختبر
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('lap/lapreports/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            تقرير المختبر
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('lap/lapreports/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة تقارير المختبر</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('lap/lapreports/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة تقرير مختبر</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{ url('lap/laptemplates/') }}" class="nav-link ">
                                        <i class="nav-icon fa fa-dashboard"></i>
                                        <p>
                                            إسم المختبر
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('lap/laptemplates/') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>قائمة أسماء المختبر</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('lap/laptemplates/create') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>إضافة مختبر جديد</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('users/ray/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    الأشعة
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('users/ray/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة الأشعة</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('users/ray/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة جديد</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('/appointments/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    المواعيد
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/appointments/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة المواعيد</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/appointments/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة موعد </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('medicines/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    الأدوية
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('medicines/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة الأدوية</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('medicines/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة دواء </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('medicines/categories/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة الأنواع </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('medicines/categories/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة نوع</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('/documents/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    الوثائق
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/documents/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة الوثائق</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/documents/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة وثيقة </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('/prescriptions/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    التقارير
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/prescriptions/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة التقارير</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/prescriptions/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة تقرير </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('ticketout/') }}" class="nav-link ">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    تذاكر الخروج
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('ticketout/') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>قائمة تذاكر الخروج</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('ticketout/create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة تذكرة مريض</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                <!-- /.sidebar-menu -->
                </div>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->

            {{-- </div> --}}
        </div>
        <!-- /.content-wrapper -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/adminlte/js/adminlte.min.js') }}"></script>
</body>
