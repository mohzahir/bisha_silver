<x-admin-layout>

    @push('styles')
    <!-- ION Slider -->
    <link href="{{ asset('morvin/assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <x-slot name="header">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>الاقسام</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item">الاقسام</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-success">اضافة قسم</a>
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
                                <a class="nav-link fw-bold p-3 active" href="#">All Orders</a>
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
                                        <th>رقم القسم</th>
                                        <th>اسم القسم</th>
                                        <th>الوصف</th>
                                        <th style="width: 120px;">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                <label class="form-check-label" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#{{ $category->id }}</a> </td>
                                        <td>{{ $category->name }}</td>
                                        
                                        <td>
                                            {{ $category->descr ?? '-' }}
                                        </td>
                                        
                                        <td id="tooltip-container1">
                                            <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
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


</x-admin-layout>