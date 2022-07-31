<x-admin-layout>

    @push('styles')
        <!-- dropzone css -->
        <link href="{{ asset('morvin/assets/libs/bootstrap-fileinput/fileinput.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('morvin/assets/libs/bootstrap-fileinput/fileinput-rtl.css') }}" rel="stylesheet" type="text/css" />
        <style>
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
                    <h4>الاقسام</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">الاقسام</a></li>
                        <li class="breadcrumb-item"> اضافة قسم </li>
                    </ol>
                </div>
            </div>
            <!-- <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-success">اضافة قسم</a>
                </div>
            </div> -->
        </div>
    </x-slot>



    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @include('general.flash-message')

                            <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                <li class="nav-item">
                                    <a class="nav-link fw-bold p-3 active" href="#">البيانات الاساسية</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link p-3 fw-bold" href="#">Active</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-3 fw-bold" href="#">Unpaid</a>
                                </li> -->
                            </ul>
                                <h4 class="header-title">Textual inputs</h4>
                                <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each
                                    textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">إسم القسم</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ old('name') }}" type="text" name="name"  placeholder="قم بادخال اسم القسم" id="example-text-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الوصف</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="descr" placeholder="قم بادخال وصف للقسم" id="example-text-input">{{ old('descr') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                        
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="d-block" for="photo">أختر الصورة <span class="text-danger">* الحجم المناسب (1000 * (*))</span></label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class="file" data-initial-preview="">
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
                            

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">حفظ</button>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-warning">رجوع</a>
                        </div>
                    </div>
                </form>

            </div> <!-- end col -->
        </div>
        <!-- end row -->


        
    </div>




    @push('scripts')

    <!-- dropzone plugin -->
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
    @endpush

</x-admin-layout>