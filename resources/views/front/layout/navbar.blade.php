<div>
    <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
        <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="{{route('front.home')}}" @class(['nav-link', 'active' => request()->routeIs('front.home')])> الرئيسيه </a></li>
            <li class="nav-item"><a href="{{route('front.store.index')}}" @class(['nav-link', 'active' => request()->routeIs('front.store.index')])> المتجر </a></li>
            <li class="nav-item"><a href="#" @class(['nav-link', 'active' => request()->routeIs('')])> عن بشه سلفر </a></li>
            <li class="nav-item"><a href="#" @class(['nav-link', 'active' => request()->routeIs('')])> تواصل معنا </a></li>
            <li class="nav-item"><a href="#" @class(['nav-link', 'active' => request()->routeIs('')])> المدونه </a></li>
            
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
            <!-- /.nav-collapse-->
            <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">اظهار البحث</span><i class="fa fa-search"></i></a>
            <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span> عناصر السله</span></a></div>
            </div>
        </div>
        </div>
    </nav>
    <div id="search" class="collapse">
        <div class="container">
        <form role="search" class="mr-auto">
            <div class="input-group">
            <input type="text" placeholder="Search" class="form-control">
            <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>