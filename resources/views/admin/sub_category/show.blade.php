<x-admin-layout>

    <x-slot name="header">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>المنتجات</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">المنتجات</a></li>
                        <li class="breadcrumb-item">{{ $product->title }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <!-- <a href="{{ route('admin.product.destroy', ['product' => $product->id]) }}" class="btn btn-danger">تفعيل\ايقاف</a> -->
                    <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}" class="btn btn-info">تعديل</a>
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success">إضافة منتج</a>
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
                            <div class="col-xl-5">
                                <div class="product-detail">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                @foreach($product->images as $index => $img)
                                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="product-{{ $index }}-tab" data-bs-toggle="pill" href="#product-{{ $index }}" role="tab">
                                                    <img src="{{ asset($img->path) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                @foreach($product->images as $index => $img)
                                                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }} " id="product-{{ $index }}" role="tabpanel">
                                                    <div class="product-img">
                                                        <img src="{{ asset($img->path) }}" alt="" class="img-fluid mx-auto d-block" data-zoom="{{ asset($img->path) }}">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- end product img -->
                            </div>
                            <div class="col-xl-7">
                                <div class="mt-4 mt-xl-3">
                                    <a href="#" class="text-primary">{{ $product->subCategory->name }}</a>
                                    <h5 class="mt-1 mb-3">{{ $product->title }}</h5>

                                    <div class="d-inline-flex">
                                        <div class="text-muted me-3">
                                            @if($product->productRate())
                                                @foreach(range(1, 5 - ceil($product->productRate())) as $item)
                                                <span class="mdi mdi-star"></span>
                                                @endforeach
                                                @if(is_decimal($product->productRate()))
                                                <span class="mdi mdi-star-half-full text-warning"></span>
                                                @endif
                                                @foreach(range(1, floor($product->productRate())) as $item)
                                                <span class="mdi mdi-star text-warning"></span>
                                                @endforeach
                                                
                                            @else
                                                <p class="text-muted">لا يوجد تقييم</p>
                                            @endif
                                            <!-- <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star-half text-warning"></span> -->
                                        </div>
                                    </div>

                                    <h5 class="mt-2"><del class="text-muted me-2">${{ $product->price }}</del>${{ $product->price - $product->discount }} <span class="text-danger font-size-12 ms-2">${{ $product->discount }} خصم</span></h5>

                                    <hr class="my-4">

                                    <div class="mt-4">
                                        <h6>المميزات :</h6>

                                        <div class="mt-4">
                                            @foreach($product->productAttributes as $attribute)
                                            <p class="text-muted mb-2"><i class="mdi mdi-check-bold text-success me-2"></i>{{ $attribute->text }}</p>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        
                                        <h6>الوصف :</h6>

                                        <p class="text-muted mb-2">{!! $product->descr !!}</p>
                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="product-color mt-3">
                                                <h5 class="font-size-14">خيارات المنتج : <span class="text-muted">{{ $product->productOptionItems->first()->productOption->name }}</span> </h5>
                                                @foreach($product->productOptionItems as $item)
                                                <a href="#" class="">
                                                    <div class="product-color-item" style="background-color: {{ $item->productOptionValue->color ?? '' }};">
                                                        <!-- <img src="assets/images/product/img-7.png" alt="" class="avatar-md"> -->
                                                        <p class="text-muted" style="padding: 9px 20px;
                                                        margin-bottom: 0;
                                                        font-size: 20px;
                                                        font-weight: bold;">{{ $item->qty }}</p>
                                                    </div>
                                                    <p>{{ $item->productOptionValue->title }}</p>
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>

                                        
                                    </div>


                                    

                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>



                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">مميزات المنتج : </h4>
                        <div class="row">
                            @if(count($product->productOptionItems) > 0)
                                @foreach($product->productAttributes as $attribute)
                                <div class="col-xl-3">
                                    <div class="product-track rounded p-4">
                                        <i class="mdi mdi-truck-fast text-primary h2"></i>

                                        <h5 class="text-uppercase mt-3 font-size-17">{{ $attribute->name }}</h5>

                                        <p class="text-muted mt-3 mb-0">{{ $attribute->text }}</p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="col-12">
                                <p class="text-muted">لايوجد خيارات من هذا المنتج</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>




                


                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Reviews : </h4>
                        <div class="d-inline-flex mb-3">
                            <div class="text-muted me-3">
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star"></span>
                            </div>
                            <div class="text-muted">( 132 customer Review)</div>
                        </div>
                        <div class="border p-4 rounded">
                            <div class="media border-bottom pb-3">
                                <div class="media-body">
                                    <p class="text-muted mb-2">To an English person, it will seem like simplified English, as a skeptical Cambridge</p>
                                    <h5 class="font-size-15 mb-3">James</h5>

                                    <ul class="list-inline product-review-link mb-0">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="mdi mdi-thumb-up align-middle me-1"></i> Like</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="mdi mdi-message-text align-middle me-1"></i> Comment</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="float-sm-right font-size-12">11 Feb, 2020</p>
                            </div>
                            <div class="media border-bottom py-3">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Everyone realizes why a new common language would be desirable</p>
                                    <h5 class="font-size-15 mb-3">David</h5>

                                    <ul class="list-inline product-review-link mb-0">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="mdi mdi-thumb-up align-middle me-1"></i> Like</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="mdi mdi-message-text align-middle me-1"></i> Comment</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="float-sm-right font-size-12">22 Jan, 2020</p>
                            </div>
                            <div class="media pt-3">
                                <div class="media-body">
                                    <p class="text-muted mb-2">If several languages coalesce, the grammar of the resulting </p>
                                    <h5 class="font-size-15 mb-3">Scott</h5>

                                    <ul class="list-inline product-review-link mb-0">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="mdi mdi-thumb-up align-middle me-1"></i> Like</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="mdi mdi-message-text align-middle me-1"></i> Comment</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="float-sm-right font-size-12">04 Jan, 2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>



</x-admin-layout>