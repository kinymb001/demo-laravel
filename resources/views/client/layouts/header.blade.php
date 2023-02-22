<header>
    <nav class="d-flex navbar navbar-collapse">
        <div class="menu flex-30">
            <ul class=" d-flex align-items-center justify-content-between h-100">
                <li>
                    <a href="">Mua nhà</a>
                </li>
                <li>
                    <a href="{{ route('search') }}">Tìm kiếm</a>
                </li>
                <li>
                    <a href="">Khám phá</a>
                </li>
                <li>
                    <a class="active" href="">Blog</a>
                </li>
            </ul>
        </div>
        <div class="flex-30 text-center logo-layout">
            <a id="show_menu" href="javascript:void(0)" class="logo-f justify-content-center d-none d-block-lg">
                <img src="{{ asset('client/images/icons/menu.png') }}" alt="" class="header-nav-menu-icon">
            </a>
            <a href="" class="logo-f justify-content-center">
                <img class="logo" src="{{ asset('client/images/logo/logo.png') }}">
            </a>
        </div>
        <div class="flex-30">
            <div class="d-flex h-100 align-items-center justify-content-end">
                <div class="d-flex">
                    <a href="" class="like-page bell">
                        <i class="fas fa-bell"></i>
                    </a>
                    <a href="" class="like-page">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
                <div class="btn-db">
                    <a href="" class="btn-news">
                        Đăng bài
                    </a>
                </div>
                <div>
                    <div class="d-flex">
                        <div class="d-none-mobile1">
                            <span class="d-block user-name">Cao Văn Sơn</span>
                            <span class="d-block user-position">Intern</span>
                        </div>
                        <div>
                            <a href="">
                                <img class="avatar-user"
                                    src="{{ asset('client/images/logo/meo-hai-tay-cam-dieu-thuoc-hut.jpg') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div id="dropdown-menu-right" class="dropdown-menu-right">
    <div class="p-r w-h-100">
        <div>
            <a id="close_menu" href="javascript:void(0)">
                <i class="fas fa-times"></i>
            </a>
            <a href="">
                <img class="menu-logo" src="{{ asset('client/images/logo/logo.png') }}">
            </a>
        </div>
        <div>
            <ul>
                <li>
                    <a href="">Mua nhà</a>
                </li>
                <li>
                    <a href="">Thuê nhà</a>
                </li>
                <li>
                    <a href="">Khám phá</a>
                </li>
                <li>
                    <a href="">Blog</a>
                </li>
            </ul>
        </div>
        <div class="p-a btn-menu w-100">
            <div>
                <a class="db-btn w-100" href="">Đăng bài</a>
            </div>
            <div class="d-flex">
                <a class="btn-sign_up" href="">Đăng ký</a>
                <a class="btn-sign_in" href="">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>
