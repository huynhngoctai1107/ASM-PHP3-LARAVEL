
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Phường An Khánh, Quận Ninh Kiều, TP Cần Thơ</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>htai67934@gmail.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/index" class="nav-item nav-link @yield('active1')">Trang chủ</a>
                <a href="/about" class="nav-item nav-link @yield('active2')">Giới thiệu</a>
                <a href="/product" class="nav-item nav-link @yield('active3')">Sản Phẩm</a>
                <a href="/blog" class="nav-item nav-link @yield('active4')">Tin tức</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="/blog" class="nav-item nav-link @yield('active4')">Blog Grid</a>
                        <a href="/feature" class="dropdown-item"@yield('active5')>Our Features</a>
                        <a href="/testimonial" class="dropdown-item"@yield('active6')>Testimonial</a>
                        <a href="/404" class="dropdown-item"@yield('active7')>404 Page</a>
                    </div>
                </div> --}}
                <a href="/contact" class="nav-item nav-link @yield('active8')">Liên hệ</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                </a>
                <a class="btn-sm-square bg-white rounded-circle ms-3" href=" 
                @if(auth()->user())
                     /logout
                     @else
                     /login
                @endif">
                @if(auth()->user())
                <i class="fa fa-sign-out text-body"  ></i>
                @else
                <small class="fa fa-user text-body"></small>
               @endif
                </a>


                @if(auth()->user())
                 
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="\acout">
                    <i class="fa fa-user text-body" ></i>
                </a>
                @endif
                
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-shopping-bag text-body"></small>
                </a>
            </div>
        </div>
    </nav>
