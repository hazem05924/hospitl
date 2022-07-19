@extends('users.admin.layouts.login')
@section('styles')
    <link href="{{ url('adminpanel') }}/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor  col-12" id="kt_content">

        <!-- begin:: Content Head -->
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">قائمة ملفات المرضي</h3>
                    <form action="" method="get">

                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                        <input type="text" class="form-control" @if( request()->first_name) value={{request()->first_name}} @endif placeholder="بحث..." id="generalSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                            <span><i class="flaticon2-search-1"></i></span>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-info">بحث </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Container -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!-- begin:: Alert -->
            @if (session()->has('success'))
                <div class="alert alert-light alert-elevate" role="alert">
                    <div class="alert-icon"><i class="flaticon2-check-mark kt-font-success"></i></div>
                    <div class="alert-text">
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif
            <!-- end:: Alert -->

            <!-- begin:: Portlet -->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>

                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{ route('patients.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    إضافة ملف مريض جديد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-responsive table-striped- table-bordered table-primary text-center table-checkable  kt_table_1"
                        id="kt_table_1">
                        <thead class="bg-primary">
                            <tr>
                                <th>الإسم</th>
                                <th>رقم الهوية</th>
                                <th>العنوان</th>
                                <th>رقم الجوال</th>
                                <th>التشخيض المبدئي</th>
                                <th> الحالة</th>
                                <th>تاريخ الميلاد</th>
                                <th>تاريخ الدخول</th>
                                <th>الطبيب</th>
                                <th>القسم</th>
                                <th colspan="3">الإجراء</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                    <td>{{ $patient->national_id }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->mobile }}</td>
                                    <td>{{ $patient->blood_group }}</td>
                                    <td>{{ $patient->specialist }}</td>
                                    <td>{{ $patient->birth_date }}</td>
                                    <td>{{ $patient->created_at }}</td>
                                    <td>{{ $patient->doctor ?$patient->doctor->first_name :''}}</td>
                                    <td>
                                        @foreach ($patient->departments as $de)
                                            <span
                                                class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">{{ $de->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('patients.edit', $patient->id) }}" method="post">
                                            @method('get')
                                            @csrf
                                            <button type="submit" class="btn btn-md btn-warning"> تعديل <i
                                                    class="fa fa-edit" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('patients.show', $patient->id) }}" method="post">
                                            @method('get')
                                            @csrf
                                            <button type="submit" class="btn btn-md btn-default"> تحويل <i
                                                    class="fa fa-edit" aria-hidden="true"></i></button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-md"> حذف <i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
            <!-- end:: Portlet -->
        </div>
        <!-- end:: Container -->
    </div>
    <!-- begin:: Content -->
@endsection

@section('scripts')
    <script src="{{ url('adminpanel') }}/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript">
    </script>
    <script src="{{ url('adminpanel') }}/assets/js/demo3/pages/crud/datatables/advanced/multiple-controls.js"
        type="text/javascript"></script>
@endsection
