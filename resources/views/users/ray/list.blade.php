@extends('users.admin.layouts.login')
@section('styles')
    <link href="{{ url('adminpanel/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">



        <!-- begin:: Container -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid col-12">


            <!-- begin:: Portlet -->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            قائمة الأشعة
                        </h3>
                        <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="بحث باستخدام الاسم"
                               name='name_ar' @if( request()->name_ar) value={{request()->name_ar}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>
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
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{ route('ray.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    إضافة جديد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-primary text-center table-checkable kt_table_1">
                        <thead class="bg-primary">
                            <tr>
                                <th>الصورة</th>
                                <th>الإسم</th>
                                <th>التشخيض</th>
                                <th>الإيميل</th>
                                <th>الحالة</th>
                                <th colspan="2">الإجراء</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rays as $ray)
                                <tr>
                                    <td>
                                        {{-- @if (strpos($ray->picture,'ray') !== false) --}}
                                            <img src="{{ asset('images/ray/'.$ray->picture) }}" width="50px"
                                                height="50px">
                                        {{-- @else
                                            <img src="{{ $ray->picture }}" width="50px" height="50px">
                                        @endif --}}
                                    </td>
                                    <td>{{ $ray->first_name }} {{ $ray->last_name }}</td>
                                    <td>{{ $ray->address }}</td>
                                    <td>{{ $ray->email }}</td>
                                    @if ($ray->medical_degree=='نشط'||$ray->medical_degree=='غير نشط')

                                    @if ($ray->medical_degree=='نشط')
                                    <td><span class="badge bg-success">{{ $ray->medical_degree }}</span></td>
                                    @endif
                                    @if ($ray->medical_degree=='غير نشط')
                                    <td> <span class="badge bg-danger">{{ $ray->medical_degree }}</span></td>
                                    @endif
                                    @if ($ray->medical_degree==null)
                                    <td> <span class="badge bg-warning">{{ $ray->medical_degree }}</span></td>
                                    @endif
                                    @else

                                    <td> <span class="badge bg-info">{{ $ray?$ray->medical_degree:'null' }}</span></td>
                                    @endif
                                    <td>
                                        <form action="{{ route('ray.edit', $ray->id) }}" method="post">
                                            @method('get')
                                            @csrf
                                            <button type="submit" class="btn btn-md btn-warning"> تعديل <i
                                                    class="fa fa-edit" aria-hidden="true"></i></button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="{{ route('ray.destroy', $ray->id) }}" method="post">
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
    <script src="{{ url('adminpanel/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('adminpanel/assets/js/demo3/pages/crud/datatables/advanced/multiple-controls.js') }}"
        type="text/javascript"></script>
@endsection
