<x-admin-layout>

    @push('styles')
    <!-- ION Slider -->
    <link href="{{ asset('morvin/assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <x-slot name="header">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>المنتجات</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item">المنتجات</li>
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

            <div class="col-xl-3 col-lg-4">



                <div class="card">

                    <div class="card-body">

                        <h4 class="header-title">الفلاتر</h4>

                        <div class="border p-3 rounded mt-4">

                            <h5 class="font-size-16">بحث</h5>

                            <div class="search-box me-2 mt-3">
                                <div class="position-relative">
                                    <form action="" method="get">
                                        <input type="text" value="{{ request('searchText') }}" name="searchText" class="form-control" placeholder="بحث...">
                                        <i class="ti-search search-icon"></i>

                                    </form>
                                </div>
                            </div>

                        </div>


                        <div class="border p-3 rounded mt-4">
                            <h5 class="font-size-16">الاقسام</h5>


                            <div id="accordion" class="custom-accordion categories-accordion">
                                @foreach($categories as $index => $category)
                                <div class="categories-group-card">
                                    <a href="#collapseOne{{ $index }}" class="categories-group-list collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="ti-desktop font-size-16 align-middle me-2"></i> {{ $category->name }}
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </a>
                                    <div id="collapseOne{{ $index }}" class="collapse {{ in_array(request('sub_category_id'), $category->subCategories->toArray()) ? 'show' : '' }}" data-parent="#accordion">
                                        <div>
                                            <ul class="list-unstyled categories-list mb-0">
                                                @if(count($category->subCategories) > 0)
                                                @foreach($category->subCategories as $sub_category)
                                                <li class="{{ request('sub_category_id') == $sub_category->id ? 'active' : '' }}"><a href="{{ route('admin.product.index', ['sub_category_id' => $sub_category->id]) }}"><i class="mdi mdi-circle-medium me-1"></i> {{ $sub_category->name }}</a></li>
                                                @endforeach
                                                @else
                                                <li> لا يوجد فئات فرعية </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    @if(count($products) > 0)
                    @foreach($products as $product)

                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-img">
                                    @if($product->discount)
                                    <div class="product-ribbon  bg-primary">
                                        ${{ $product->discount }} خصم
                                    </div>
                                    @endif

                                    <img width="170" height="182" src="{{ asset($product->photo) }}" alt="" class="img-fluid mx-auto d-block">
                                </div>



                                <div class="text-center">

                                    <a href="{{ route('admin.product.show', ['product' => $product->id]) }}" class="text-dark">
                                        <h5 class="font-size-18">{{ $product->title }}</h5>
                                    </a>

                                    <h4 class="mt-3 mb-0">${{ $product->price - $product->discount }} <span class="font-size-14 text-muted me-2"><del>${{ $product->price }}</del></span></h4>

                                    <div class="mt-3">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                @if($product->productRate())
                                                    
                                                    @foreach(range(1, 5 - ceil($product->productRate())) as $item)
                                                        <i class="mdi mdi-star"></i>
                                                    @endforeach
                                                    @if(is_decimal($product->productRate()))
                                                        <i class="mdi mdi-star-half-full text-warning"></i>
                                                    @endif
                                                    @foreach(range(1, floor($product->productRate())) as $item)
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    @endforeach
                                                    
                                                    
                                                @else
                                                    <p class="text-muted m-0">لا يوجد تقييم</p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-xl-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center text-danger">
                                    <p class="mb-sm-0 mt-2"> لايوجد منتجات لعرضها </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            {!! $products->links('admin.layout.custom_pagination') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="float-sm-end">
                                            <p class="mb-sm-0 mt-2">الصفحة <span class="font-weight-bold">{{ request('page') ?? 1 }}</span></p>
                                            
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





    @push('scripts')
    <!-- Ion Range Slider-->
    <script src="{{ asset('morvin/assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    @endpush

</x-admin-layout>