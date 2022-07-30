<x-admin-layout>

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
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @include('general.flash-message')

                                <h4 class="header-title">Textual inputs</h4>
                                <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each
                                    textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">إسم القسم</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name"  placeholder="قم بادخال اسم القسم" id="example-text-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">الوصف</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="descr" value="{{ old('descr') }}" placeholder="قم بادخال وصف للقسم" id="example-text-input">
                                            
                                        </textarea>
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




</x-admin-layout>