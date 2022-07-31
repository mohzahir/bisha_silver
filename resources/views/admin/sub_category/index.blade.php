<x-admin-layout>

    @push('styles')
    <!-- DataTables -->
    <!-- <link href="{{ asset('morvin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- DataTables -->
    <!-- <link href="{{ asset('morvin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> -->

    @endpush

    <x-slot name="header">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>الأقسام الفرعية</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item">الأقسام الفرعية</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('admin.sub_category.create') }}" class="btn btn-success">اضافة قسم فرعي</a>
                </div>
            </div>
        </div>
    </x-slot>





    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body  pt-0">
                        <ul class="nav nav-tabs nav-tabs-custom mb-4">
                            <li class="nav-item">
                                <a class="nav-link fw-bold p-3 active" href="#">جميع الاقسام الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-3 fw-bold" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-3 fw-bold" href="#">Unpaid</a>
                            </li>
                        </ul>
                        <div class="table-responsive">
                            <table class="table table-centered datatable dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck">
                                                <label class="form-check-label" for="ordercheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>الرقم</th>
                                        <th>الاسم</th>
                                        <th>الوصف</th>
                                        <th>الحالة</th>
                                        <th style="width: 120px;">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($sub_categories) > 0)
                                    @foreach($sub_categories as $sub_category)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                <label class="form-check-label" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#{{ $sub_category->id }}</a> </td>
                                        <td>{{ $sub_category->name }}</td>
                                        
                                        <td>
                                            {{ $sub_category->descr ?? '-' }}
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-success font-size-12">
                                                {{ $sub_category->status == 'active' ? 'مفعل' : 'غير مفعل' }}
                                            </div>
                                        </td>
                                        
                                        <td id="tooltip-container1">
                                            <a href="{{ route('admin.sub_category.edit', ['sub_category' => $sub_category->id]) }}" class="me-3 text-warning" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="الأقسام الفرعية"><i class="mdi mdi-eye font-size-18"></i></a>
                                            <a href="{{ route('admin.sub_category.edit', ['sub_category' => $sub_category->id]) }}" class="me-3 text-primary" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل"><i class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div>


    @push('scripts')

    <!-- Required datatable js -->
    <!-- <script src="{{ asset('morvin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('morvin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> -->
    
    <!-- Responsive examples -->
    <!-- <script src="{{ asset('morvin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('morvin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script> -->

    <!-- <script src="{{ asset('morvin/assets/js/pages/ecommerce-datatables.init.js') }}"></script> -->

    @endpush


</x-admin-layout>