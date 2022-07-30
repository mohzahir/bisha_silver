<x-admin-layout>

    @push('styles')
    <!-- twitter-bootstrap-wizard css -->
    <link href="{{ asset('morvin/assets/libs/twitter-bootstrap-wizard/prettify.css') }}" rel="stylesheet" type="text/css" />
    <!-- select2 css -->
    <link href="{{ asset('morvin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- dropzone css -->
    <link href="{{ asset('morvin/assets/libs/bootstrap-fileinput/fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('morvin/assets/libs/bootstrap-fileinput/fileinput-rtl.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap-select css -->
    <!-- <link href="{{ asset('morvin/assets/libs/bootstrap-select/bootstrap-select-rtl.css') }}" rel="stylesheet" type="text/css" /> -->
    <style>
        .deleteImgProd {
            position: absolute;
            top: 4px;
            right: 20px;
        }
        .prev_prod_imgs {
            margin-bottom: 20px;
        }
        .preview_images {
            border: 1px dashed #ccc;
            padding: 15px 15px;
        }
        .img_pro_dis {
            width: 100%;
            height: 200px;
        }
        .nav-pills, .nav-tabs {
            margin-bottom: 10px;
        }
        .OptionsTabs .tabs-right.nav-tabs {
            border: 0;
        }
        .OptionsTabs .tabs-right.nav-tabs > li.active > a, .OptionsTabs .tabs-right.nav-tabs > li.active > a:hover > li.active > a:focus {
            border: 0;
            background: #3498db;
            color: #fff;
        }
        .OptionsTabs .tabs-right.nav-tabs > li > a {
            margin-right: 0;
            padding-right: 35px;
        }
        .nav>li>a {
            padding: 10px 15px;
        }
        .OptionsTabs .tabs-left.nav-tabs > li > a, .OptionsTabs .tabs-right.nav-tabs > li > a {
            margin-bottom: 7px;
            border: 1px solid #ccc;
            border-radius: 4px !important;
        }
        .tabs-right.nav-tabs>li>a {
            display: block;
            margin-right: -1px;
        }
        .tabs-left.nav-tabs>li>a, .tabs-right.nav-tabs>li>a {
            margin-left: 0;
            margin-bottom: 3px;
        }
        .OptionsTabs .tabs-left.nav-tabs > li, .OptionsTabs .tabs-right.nav-tabs > li {
            position: relative;
        }
        .tabs-left.nav-tabs>li, .tabs-right.nav-tabs>li {
            float: none;
        }
        .RemoveTabOption {
            border: 0;
            background-color: #cfecff;
            position: absolute;
            top: 10px;
            right: 5px;
            font-size: 16px;
            cursor: pointer;
            color: #e73d4a;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            padding: 0;
            border-radius: 4px;
            z-index: 7;
            transition: all 0.4s ease-in-out;
        }
        .relative {
            position: relative;
        }
        .add_option {
            position: absolute;
            top: 0;
            left: 0;
        }
        .table_create h4 {
            font-size: 17px;
            font-weight: 600;
            color: #666;
            border-bottom: 1px solid #ccc;
            padding-bottom: 8px;
            margin-bottom: 15px;
            margin-top: 15px;
        }
        .btn.default:not(.btn-outline) {
            color: #666;
            background-color: #e1e5ec;
            border-color: #e1e5ec;
        }
        .btn:not(.btn-sm):not(.btn-lg) {
            line-height: 1.44;
        }
        .btn.default:not(.btn-outline) {
            color: #666;
            background-color: #e1e5ec;
            border-color: #e1e5ec;
        }
        .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn-group:not(:last-child)>.btn, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }
        .kv-rtl .btn {
            height: 45px !important;
            line-height: 33px !important;
        }
        .btn.blue:not(.btn-outline) {
            color: #FFF;
            background-color: #3598dc;
            border-color: #3598dc;
        }
        .close{
            padding: 0;
            top: 8px !important;
            right: 8px !important;
            cursor: pointer;
            background: 0 0;
            border: 0;
            -webkit-appearance: none;
            display: inline-block;
            margin-top: 0;
            margin-left: 0;
            width: 9px;
            height: 9px;
            /* background-repeat: no-repeat!important; */
            text-indent: -10000px;
            outline: 0;
            /* background-image: url(../img/remove-icon-small.png)!important; */
            /* float: left; */
            font-size: 21px;
            /* line-height: 1; */
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .2;
            font-weight: 700;
            /* filter: alpha(opacity=20); */
        }
    </style>
    @endpush

    <x-slot name="header">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>المنتجات</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">المنتجات</a></li>
                        <li class="breadcrumb-item"> اضافة منتج </li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success">اضافة منتج</a>
                </div>
            </div>
        </div>
    </x-slot>



    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('general.flash-message')
                            </div>
                        </div>
                        <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard">
                            <ul class="twitter-bs-wizard-nav">
                                <li class="nav-item add-product-border">
                                    <a href="#general-info" class="nav-link" data-toggle="tab">
                                        <span class="step-number">01. معلومات عامة</span>
                                    </a>
                                </li>
                                <li class="nav-item add-product-border">
                                    <a href="#basic-data" class="nav-link" data-toggle="tab">
                                        <span class="step-number">02. البيانات</span>
                                    </a>
                                </li>
                                <li class="nav-item add-product-border">
                                    <a href="#product-imgs" class="nav-link" data-toggle="tab">
                                        <span class="step-number">03. معرض الصور</span>
                                    </a>
                                </li>
                                <li class="nav-item add-product-border">
                                    <a href="#attributes" class="nav-link" data-toggle="tab">
                                        <span class="step-number">04. المواصفات</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#options" class="nav-link" data-toggle="tab">
                                        <span class="step-number">05. الخيارات</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- ebd ul -->
                            
                            <form action="{{ route('admin.product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane" id="general-info">
                                        <h4 class="header-title">معلومات عامة</h4>
                                        <p class="card-title-desc">الرجاء ملئ الحقول بالأسفل</p>
                            
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="sub_category_id">القسم</label>
                                                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                        <option value=""> -- إختر القسم -- </option>
                                                        @foreach($sub_categories as $sub_category)
                                                        <option {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }} value="{{ $sub_category->id }}">{{ $sub_category->category->name }} -> {{ $sub_category->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('sub_category_id')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="brand_id">العلامة التجارية</label>
                                                    <select name="brand_id" id="brand_id" class="form-control">
                                                        <option value=""> -- إختر العلامة التجارية -- </option>
                                                        @foreach($brands as $brand)
                                                        <option {{ $brand->id == $product->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                            
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="price">السعر</label>
                                                    <input id="price" value="{{ $product->price }}" name="price" type="text" class="form-control" placeholder="100">
                                                    @error('price')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="discount">الخصم</label>
                                                    <input id="discount" value="{{ $product->discount }}" name="discount" type="text" class="form-control" placeholder="0">
                                                    @error('discount')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="after_discount">السعر بعد الخصم</label>
                                                    <input id="after_discount" value="{{ $product->price - $product->discount }}" name="after_discount" type="text" class="form-control disabled" disabled placeholder="100">
                                                    @error('after_discount')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="qty">الكمية</label>
                                                    <input id="qty" value="{{ $product->qty }}" name="qty" type="text" class="form-control" placeholder="100">
                                                    @error('qty')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="sku">SKU</label>
                                                    <input id="sku" value="{{ $product->sku }}" name="sku" type="text" class="form-control" placeholder="100">
                                                    @error('sku')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="d-block" for="photo">أختر الصورة <span class="text-danger">* الحجم المناسب (1000 * (*))</span></label>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <input type="file" name="photo" id="photo" class="file" data-initial-preview="<img src='{{ asset($product->photo) }}' class='file-preview-image file-preview-image kv-preview-data rotate-1 file-zoom-detail'>">
                                                                @error('photo')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </span>
                                                            <!-- <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">مسح الصورة </a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            
                                        </div>
                            
                            
                            
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="next"><a href="#"> البيانات <i class="mdi mdi-arrow-left ms-1"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- end tabpane -->
                            
                                    <div class="tab-pane" id="basic-data">
                                        <h4 class="header-title">البيانات الاساسية</h4>
                                        <p class="card-title-desc">الرجاء ملئ الحقول بالأسفل</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="title">إسم المنتج</label>
                                                    <input id="title" value="{{ $product->title }}" name="title" type="text" class="form-control" placeholder="قم بإدخال إسم المنتج هنا">
                                                    @error('title')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            
                            
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="short_descr">وصف قصير</label>
                                                    <textarea class="form-control" name="short_descr" id="short_descr" rows="3" placeholder="قم بإدخال وصف للمنتج">
                                                    {{ $product->short_descr }}
                                                    </textarea>
                                                    @error('short_descr')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="descr">وصف المنتج</label>
                                                    <textarea id="mytextarea" class="form-control tinymceAR" name="descr" id="descr" rows="5" placeholder="قم بإدخال وصف للمنتج">
                                                    {{ $product->descr }}
                                                    </textarea>
                                                    @error('descr')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="keywords_meta">ميتا الكلمات الدلالية</label>
                                                    <textarea class="form-control" name="keywords_meta" id="keywords_meta" rows="3" placeholder="ادخل الوصف">
                                                    {{ $product->keywords_meta }}
                                                    </textarea>
                                                    @error('keywords_meta')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="descriptive_meta">ميتا الوصف</label>
                                                    <textarea class="form-control" name="descriptive_meta" id="descriptive_meta" rows="3" placeholder="ادخل الوصف">
                                                    {{ $product->descriptive_meta }}
                                                    </textarea>
                                                    @error('descriptive_meta')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            
                            
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="#"><i class="mdi mdi-arrow-right me-1"></i> معلومات عامة</a></li>
                                            <li class="next"><a href="#"> معرض الصور <i class="mdi mdi-arrow-left ms-1"></i></a></li>
                                        </ul>
                            
                                    </div>
                                    <!-- end tabpane -->
                            
                                    <div class="tab-pane" id="product-imgs">
                                        <h4 class="header-title">صورة المنتج</h4>
                                        <p class="card-title-desc">قم بتحميل صورة للمنتج</p>
                            
                                        <div class="col-sm-12">
                                            <div class="row ImageGallery">
                                                @foreach($product->images as $img)
                                                <div class="col-sm-3">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <a href="javascript:;" title="مسح" data-id="{{ route('admin.product.image.delete', ['product_id' => $product->id, 'image_id' => $img->id]) }}" class="btn btn-danger deleteImgProd confirmDeleteItem"><i class="fa fa-trash"></i></a>
                                                            <div class="preview_images prev_prod_imgs">
                                                                <a href="{{ asset($img->path) }}">
                                                                    <img src="{{ asset($img->path) }}" class="img-thumbnail img_pro_dis">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="file-loading">
                                                    <input id="file-1" type="file" name="product_imgs[]" data-overwrite-initial="false" multiple class="file" data-show-upload="false" data-msg-placeholder="اسقط الصور هنا" data-browse-on-zone-click="true" data-min-file-count="1">
                                                </div>
                                            </div>
                                        </div>
                            
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="#"><i class="mdi mdi-arrow-right me-1"></i> البيانات</a></li>
                                            <li class="next"><a href="#"> المواصفات <i class="mdi mdi-arrow-left me-1"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- end tabpane -->
                            
                                    <div class="tab-pane" id="attributes">
                            
                                        <div class="col-md-12">
                                            <div class="table-responsive table_create specifications_table relative">
                                                <h4>المواصفات</h4>
                                                <button type="button" title="إضافة المواصفات" id="AddSpecifications" class="btn btn-primary add_option"><i class="fa fa-plus"></i></button>
                                                <table style="margin-top: 10px;" class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content">
                                                    <tr>
                                                        <th> المواصفات </th>
                                                        <th> النص </th>
                                                        <th style="width: 100px;">التحكم</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($product->productAttributes) > 0)
                                                        @foreach($product->productAttributes as $index => $attribute)
                                                        <tr class="value_row">
                                                            <td>
                                                                <input required="" type="text" name="specifications[{{ $index }}][name]" value="{{ $attribute->name }}" placeholder="أدخل الأسم" class="form-control ">
                                                            </td>
                                                            <td>
                                                                <textarea required="" name="specifications[{{ $index }}][text]" placeholder="أدخل النص" class="form-control ">{{ $attribute->text }}</textarea>
                                                            </td>
                                                            <td>
                                                                <button type="button" title="مسح المواصفات" class="btn btn-danger removeRowTable"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                            
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="#"><i class="mdi mdi-arrow-right me-1"></i> معرض الصور</a></li>
                                            <li class="next"><a href="#"> الخيارات <i class="mdi mdi-arrow-left me-1"></i></a></li>
                                            <!-- <li class="float-end"><button type="submit" class="btn btn-primary">حفظ البيانات <i class="mdi mdi-arrow-left ms-1"></i></button></li> -->
                                        </ul>
                                    </div>
                                    <!-- end tabpane -->
                            
                                    <div class="tab-pane" id="options">
                            
                                        <div class="col-md-12">
                                            <div class="table_create relative">
                                                <h4>الخيارات</h4>
                                                <div class="row OptionsTabs">
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <ul class="nav nav-tabs tabs-right" style="display: block;">
                                                            <li class="active">
                                                                <a href="#OptionNo_ID" data-index="OptionNo_Key" data-toggle="tab" aria-expanded="true">{{ $product->productOptionItems->first()->productOption->name }}</a>
                                                                <button type="button" class="RemoveTabOption"><i class="fa fa-times-circle"></i></button>
                                                                <input type="hidden" name="options[option_id]" value="{{ $product->productOptionItems->first()->productOption->id }}">
                                                                <input type="hidden" name="options[option_name]" value="{{ $product->productOptionItems->first()->productOption->name }}">
                                                            </li>
                                                        </ul>
                                                        <div class="display_options">
                                                            
                                                            <select id="chooseOption" data-title="أختر الخيارات" data-live-search="true" class="form-control bs-select">
                                                                    <option value="">اختر الخيار</option>
                                                                    @foreach($options as $option)
                                                                    <option value="{{ $option->id }}"> {{ $option->name }} </option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="OptionNo_ID" data-index="OptionNo_Key">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table mt-10 table-bordered table-striped table_options table-condensed flip-content">
                                                                                <thead class="flip-content">
                                                                                <tr>
                                                                                    <th> قيمة الخيارات </th>
                                                                                    <th> الكمية </th>
                                                                                    <th style="width: 100px;">التحكم</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if(count($product->productOptionItems) > 0)
                                                                                    @foreach($product->productOptionItems as $index => $item)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <select required="" name="options[values][{{ $index }}][option_value_id]" class="form-control SelectValuesOption">
                                                                                                @foreach($product->productOptionItems->first()->productOption->productOptionsValues as $value)
                                                                                                <option {{ $value->id == $item->product_option_value_id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->title }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input required="" type="number" min="0" step="1" value="{{ $item->qty }}" name="options[values][{{ $index }}][qty]" placeholder="الكمية" class="form-control id_number">
                                                                                        </td>
                                                                                        <td>
                                                                                            <button type="button" class="btn btn-danger removeOptionValue"><i class="fa fa-trash"></i></button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                    @endif
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr>
                                                                                    <td colspan="2"></td>
                                                                                    <td>
                                                                                        <button type="button" title="أضافة خيار" class="btn btn-primary AddOptionValue"><i class="fa fa-plus"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                            <div class="display-none">
                                                                                <input type="hidden" class="valuesOptions" name="options[values_option]" value="{{ $product->productOptionItems->first()->productOption->productOptionsValues }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <!-- <li class="previous"><a href="#"><i class="mdi mdi-arrow-right me-1"></i> البيانات</a></li> -->
                                            <li class="previous"><a href="#"> المواصفات <i class="mdi mdi-arrow-right me-1"></i></a></li>
                                            <li class="float-end"><button type="submit" class="btn btn-primary">حفظ البيانات <i class="mdi mdi-arrow-left ms-1"></i></button></li>
                                        </ul>
                                    </div>
                                    <!-- end tabpane -->
                            
                                </div>
                            </form>
                                                
                        <form id="delete-form" style="display:none;" method="post"><input type="hidden" name="_token" value="{{ csrf_token() }}"></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


        
    </div>



    @push('scripts')

    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ asset('morvin/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('morvin/assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <!-- select 2 plugin -->
    <script src="{{ asset('morvin/assets/libs/select2/js/select2.min.js') }}"></script>
    <!-- dropzone plugin -->
    <!-- <script src="{{ asset('morvin/assets/libs/dropzone/min/dropzone.min.js') }}"></script> -->
    <script src="{{ asset('morvin/assets/libs/bootstrap-fileinput/fileinput4.js') }}"></script>

    <script>
        $(".file").fileinput({
            theme: 'fa',
            language: 'ar',
            uploadUrl: '/test',
            rtl: true,
            showUpload: false,
            fileActionSettings: {
                showUpload: false,
            },
            dropZoneTitle: 'افلت الصور هنا <br/>',
            dropZoneClickTitle: 'أو اضغط لتحديد الصور <br/>',
            showRemove: true,
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
            overwriteInitial: false,
            maxFileSize: 4000,
            maxFileCount: " 10 ",
            msgFilesTooMany: 'عدد الصور المحددة <b>({n})</b> تخطى الحد الأقصى <b>{m}</b>!',
            msgPlaceholder: 'اختر الصورة',
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            },
            browseLabel: 'تصفح',
            browseClass: 'btn blue',
            removeLabel: 'حذف',

        });
    </script>

    <!-- init js -->
    <script src="{{ asset('morvin/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
    <!--tinymce js-->
    <!-- <script src="{{ asset('morvin/assets/libs/tinymce/tinymce.min.js') }}"></script> -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- bootstrap-select js -->
    <!-- <script src="{{ asset('morvin/assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script> -->


    <!-- init js -->
    <script>
        tinymce.init({
            selector: 'textarea.tinymceAR',
            directionality : "rtl",
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            paste_as_text: true,
            importcss_append: true,
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table',
            skin: 'oxide-dark',
            content_style: 'body { font-family:Cairo,Arial,sans-serif; font-size:14px }',
        });
    </script>

    <!-- Specifications Script -->
    <script>
        $(document).on('click', '#AddSpecifications', function () {
            var TABLE = $('.specifications_table table tbody');
            var EnterTitle = "أدخل الأسم *";
            var EnterText = "أدخل النص *";
            var DeleteValue = "مسح المواصفات";
            var Index = Number(new Date());
            var html = '<tr class="value_row"><td>';
            html += '<input required type="text" name="specifications['+Index+'][name]" placeholder="' + EnterTitle + '" class="form-control" />';
            html += '</td><td>';
            html += '<textarea required name="specifications['+Index+'][text]" placeholder="' + EnterText + '" class="form-control"></textarea>';
            html += '</td><td>';
            html += '<button type="button" title="' + DeleteValue + '" class="btn btn-danger removeRowTable"><i class="fa fa-trash"></i></button>';
            html += '</td></tr>';
            TABLE.append(html);
        });
        $(document).on('click', '.removeRowTable', function() {
            $(this).parents('tr').remove();
        });
    </script>

    <!-- Options Script -->
    <script>
        OptionsTabsLength();
        // Change Choose Option
        $(document).on('change', '#chooseOption', function() {
            var Self = $(this);
            var Loading = $('.loading_request');
            var Index = Number(new Date());
            var Tabs = $('.OptionsTabs .nav-tabs');
            var TabContent = $('.OptionsTabs .tab-content');
            $.ajax({
                url: "{{ route('product.option.values') }}",
                type: 'post',
                dataType: 'json',
                beforeSend: function () {
                    Loading.show();
                },
                data: {'option': Self.val(), _token: ''},
                success: function (res) {
                    Loading.hide();
                    if(res.status === true) {
                        Tabs.find('li').removeClass('active');
                        TabContent.find('.tab-pane').removeClass('active');
                        TabContent.find('.tab-pane').addClass('fade');
                        var html = '<li class="active">';
                        html += '<a href="#OptionNo_ID" data-index="OptionNo_Key" data-toggle="tab">'+ res.data.name +'</a>';
                        html += '<button type="button" class="RemoveTabOption"><i class="fa fa-times-circle"></i></button>';
                        html += '<input type="hidden" name="options[option_id]" value="' + res.data.id + '">';
                        html += '<input type="hidden" name="options[option_name]" value="' + res.data.name + '">';
                        html += '</li>';
                        Tabs.append(html);
                        TabContent.append(res.data.append);
                        Self.val('');
                        // Self.selectpicker('refresh');
                        OptionsTabsLength();
                    }
                }
            });
        });
        // Remove Tab Option
        $(document).on('click', '.RemoveTabOption', function() {
            // Remove Tab By Find Href
            $(this).parent().remove();
            // Remove Content Tab By Find ID
            $('#OptionNo_ID').remove();
            // Remove Active Tabs
            $('.OptionsTabs .nav-tabs').find('li').removeClass('active');
            $('.OptionsTabs .tab-content').find('.tab-pane').removeClass('active');
            // Make Active The First Tab
            $('.OptionsTabs ul.nav-tabs li:first').addClass('active');
            $('.OptionsTabs .tab-content div:first').addClass('active in');
            OptionsTabsLength();
        });
        // Add New Value
        $(document).on('click', '.AddOptionValue', function() {
            var Append = $(this).parents('table').find('tbody');
            var Index = Math.floor(Math.random() * 100000);
            console.log($(this).parents('.table-responsive').find('.valuesOptions').val());
            var ValuesOptions = JSON.parse($(this).parents('.table-responsive').find('.valuesOptions').val());
            var html = '<tr><td>';
            html += '<select required name="options[values]['+ Index +'][option_value_id]" class="form-control SelectValuesOption">';
            for(var i=0; i<ValuesOptions.length; i++) {
                html += '<option value="'+ ValuesOptions[i]['id'] +'">'+ ValuesOptions[i]['title'] +'</option>';
            }
            html += '</select>';
            html += '</td><td>';
            html += '<input required type="number" min="0" step="1" value="1" name="options[values]['+ Index +'][qty]" placeholder="الكمية" class="form-control id_number"/>';
            html += '</td><td>';
            html += '<button type="button" class="btn btn-danger removeOptionValue"><i class="fa fa-trash"></i></button>';
            html += '</td></tr>';
            Append.append(html);

        });
        // Remove Option Value
        $(document).on('click', '.removeOptionValue', function() {
            $(this).parents('tr').remove();
        });

        function OptionsTabsLength() {
            if($('.OptionsTabs .nav-tabs li').length > 0) {
                $('.OptionsTabs .display_options').css('display', 'none');
            } else {
                $('.OptionsTabs .display_options').css('display', 'block');
            }
        }
    </script>

    <script>
        function confirmation() {
            return confirm('هل انت متأكد؟')
        }
        $('.confirmDeleteItem').click(function () {
        const Self = $(this);
        event.preventDefault();
        if(confirmation() === true) {
            $('#delete-form').prop('action', Self.data('id')).submit();
        }
    });
    </script>

    <!-- <script>
        $(document).ready(function () {
            $('.bs-select, .selectpicker').attr({'data-container': 'body', 'data-none-results-text': 'لا توجد نتائج مطابقة {0}', 'data-live-search-placeholder': 'بحث...'});
        });
    </script> -->
    @endpush

</x-admin-layout>