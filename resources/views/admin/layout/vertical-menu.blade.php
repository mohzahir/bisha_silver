<div data-simplebar class="h-100">


    <div class="user-sidebar text-center">
        <div class="dropdown">
            <div class="user-img">
                <img src="{{ asset('morvin/assets/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle">
                <span class="avatar-online bg-success"></span>
            </div>
            <div class="user-info">
                <h5 class="mt-3 font-size-16 text-white">محمد زاهر</h5>
                <span class="font-size-13 text-white-50">مدير</span>
            </div>
        </div>
    </div>



    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">القائمة</li>

            <li>
                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                    <i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end">3</span>
                    <span>لوحة التحكم</span>
                </a>
            </li>

            <li class="">
                <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                    <i class="dripicons-cart"></i>
                    <span>المنتجات</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                    <li>
                        <a href="{{ route('admin.product.index') }}">عرض المنتجات</a>
                    </li>
                    <li><a href="{{ route('admin.product.create') }}">اضافة منتج</a></li>
                </ul>
            </li>
            <li class="">
                <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                    <i class="dripicons-cart"></i>
                    <span>الأقسام</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                    <li>
                        <a href="{{ route('admin.category.index') }}">عرض الأقسام</a>
                    </li>
                    <li><a href="{{ route('admin.category.create') }}">اضافة قسم</a></li>
                </ul>
            </li>
            

        </ul>
    </div>
    <!-- Sidebar -->
</div>