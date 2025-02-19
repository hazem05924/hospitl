@extends('users.admin.layouts.login')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
@endsection
@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor col-12" id="kt_content">

        <!-- begin:: Content Head -->
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ isset($doctor) ? 'نموذج تعديل بيانات الطبيب' : 'نموذج إضافة طبيب' }}
                        </h3>
                    </div>
                    <div class="form-group form-group-last">
                        <div class="alert alert-secondary" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                            <div class="alert-text">
                              new  نموذج إضافة طبيب جديد من هنا. </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Content Container-->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid col-12">
            <div class="row">
                <div class="offset col-md-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right"
                            action="{{ isset($doctor) ? route('doctor.update', $doctor->id) : route('doctor.store') }}"
                            method="POST" enctype="multipart/form-data">
                            <div class="kt-portlet__body">

                                @csrf
                                @if (isset($doctor))
                                    @method('PUT')
                                @endif

                                <div class="form-group">
                                    <label>الإسم الأول</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <input id="first_name" class="form-control" type="text" name="first_name"
                                            value="{{ isset($doctor) ? $doctor->first_name : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الإسم الأخير</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <input id="last_name" class="form-control" type="text" name="last_name"
                                            value="{{ isset($doctor) ? $doctor->last_name : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>رقم الهوية</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-address-card"></i></span></div>
                                        <input id="national_id" class="form-control" type="number" name="national_id"
                                            value="{{ isset($doctor) ? $doctor->national_id : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-location-arrow"></i></span></div>
                                        <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ isset($doctor) ? $doctor->address : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الإيميل</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                        <input id="email" class="form-control" type="email" name="email"
                                            value="{{ isset($doctor) ? $doctor->email : '' }}">
                                    </div>
                                </div>
                                @if (!isset($doctor))
                                    <div class="form-group">
                                        <label>كلمة المرور</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fa fa-key"></i></i></span></div>
                                            <input id="password" class="form-control" type="text" name="password">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>تاريخ الميلاد</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-calendar"></i></span></div>
                                        <input type="date" class="form-control" name="birth_date" id="date"
                                            value="{{ isset($doctor) ? $doctor->birth_date : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الجنس</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-venus-mars"></i></span></div>
                                        <select class="form-control" name="gender" id="gender">
                                            <option>إختر الجنس</option>
                                            <option value="male" 
                                                @if (isset($doctor)) {{ $doctor->gender == 'male' ? 'selected' : '' }} @endif>
                                                ذكر
                                            </option>
                                            <option value="female" selected
                                                @if (isset($doctor)) {{ $doctor->gender == 'female' ? 'selected' : '' }} @endif>
                                                أنثى
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>رقم الهاتف الأرضي</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-phone"></i></span></div>
                                        <input id="phone" class="form-control" type="number" name="phone"
                                            value="{{ isset($doctor) ? $doctor->phone : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>رقم الجوال</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-mobile"></i></span></div>
                                        <input id="mobile" class="form-control" type="number" name="mobile"
                                            value="{{ isset($doctor) ? $doctor->mobile : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>رقم هاتف الطوارئ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-h-square"></i></span></div>
                                        <input id="emergency" class="form-control" type="number" name="emergency"
                                            value="{{ isset($doctor) ? $doctor->emergency : '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>الأقسام</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-h-square"></i></span></div>
                                        <select id="kt_select2_3" class="kt-select form-control" name="departments[]"
                                            id="departments">
                                            <option>إختر قسم....</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" 
                                                    {{-- @if (isset($doctor)) {{ $doctor->hasDepartment($department->id) ? 'selected' : '' }} @endif --}}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>الدرجة الطبية</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fas fa-file-alt"></i></span></div>
                                        <textarea class="form-control" name="medical_degree" id="medical_degree" cols="30" rows="5">{{ isset($doctor) ? $doctor->medical_degree : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>التخصص</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fas fa-file-alt"></i></span></div>
                                        <textarea class="form-control" name="specialist" id="specialist" cols="30" rows="5">{{ isset($doctor) ? $doctor->specialist : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>السيرة الشخصية</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fas fa-file-alt"></i></span></div>
                                        <textarea class="form-control" name="biography" id="biography" cols="30" rows="5">{{ isset($doctor) ? $doctor->biography : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>المؤهلات التعليمية</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fas fa-file-alt"></i></span></div>
                                        <textarea class="form-control" name="educational_qualification" id="educational_qualification" cols="30"
                                            rows="5">{{ isset($doctor) ? $doctor->educational_qualification : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group  d-flex flex-row-reverse">
                                    <div class="kt-form__actions">
                                        <input type="submit" value="{{ isset($laboratorist) ? 'تحديث' : 'حفظ' }}"
                                            class="btn-lg btn-primary">
                                        <input type="reset" class="btn-lg btn-danger" value="إلغاء">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content Container-->
    </div>
    <!-- begin:: Content -->
@endsection

@section('scripts')
    <script src="{{ url('adminpanel/assets/js/demo12/pages/custom/user/edit-user.js') }}" type="text/javascript"></script>
    <script src="{{ url('adminpanel/assets/js/demo3/pages/crud/forms/widgets/select2.js') }}" type="text/javascript">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#date', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
@endsection
