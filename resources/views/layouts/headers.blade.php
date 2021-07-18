<section class="header">
    <div class="heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="logo">
                        <a href="{{ route('home.page') }}">
                            <img src="{{ asset('images/Artboard1.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="search_box">
                        <div class="icon_search">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" id="search_input" class="input_search form-control" placeholder="Searching..." name="search">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-content-center align-items-center">
                    @if (!\Auth::check())
                        <div class="box_login">
                            <a href="{{ route('view.login') }}" id="btnLogin" style="color: black;">
                                <i class="fas fa-user"></i> Đăng nhập
                            </a> |
                            <a href="{{ route('signup.view') }}" style="color: black;">
                                <i class="fas fa-user-friends"></i> Đăng ký
                            </a>
                        </div>
                    @else
                        <div class="box_login_success">
                            <a href="javascript:void(0);" class="dropdown-login-sucess dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar">
                                    <img src="{{ !empty(\Auth::user()->avatar) ? asset(\Auth::user()->avatar) : asset('images/user.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="name_user">{{ !empty(\Auth::user()->name) ? \Auth::user()->name : 'User' }}</div>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('update.profile.view') }}">Trang cá nhân</a>
                                <a class="dropdown-item" href="{{ route('history.test') }}">Xem lại điểm thi online</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                            </div>
                        </div>

                        <div class="box_login_success" style="margin-left: 5px">
                            <a href="javascript:void(0);" style="color: black;" class="dropdown-login-sucess" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar"><svg style="margin-left: 10px;margin-top: 10px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                  </svg></div>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">Thông báo 1</a>
                                <a class="dropdown-item">Thông báo 1</a>
                                <a class="dropdown-item">Thông báo 1</a>
                                <a class="dropdown-item">Thông báo 1</a>
                                <a class="dropdown-item">Thông báo 1</a>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section class="nd-main-menu">
    <div id="bg_header"></div>
    <div class="container">
        <div class="nav-wrapper">
            <nav class="navbar">
                <a href="{{ route('home.page') }}" class="mobile_logo">
                    <img src="{{ asset('images/Artboard1.png') }}" alt="">
                </a>

                <div class="open-menu" id="open-menu">
                    <img src="{{ asset('webstudent/images/menu.png') }}" alt="">
                </div>

                <ul class="nav no-search" id="menu-mobile">
                    <div class="logo_mobile">
                        <a href="{{ route('home.page') }}">
                            <img src="{{ asset('images/Artboard1.png') }}" alt="">
                        </a>
                    </div>
                    <div class="close" id="close-sidebar">
                        <img src="images/cancel.png" alt="">
                    </div>
                    <li class="nav-item border-left"><a href="{{ route('home.page') }}">Trang chủ</a></li>
                    <li class="nav-item dn-nav_item">
                        <a href="" class="item_dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Toán học</a>
                        <div class="dropdown-menu dropdown-item-nav" aria-labelledby="dropdownMenuButton">
                            @for ($i = 6; $i < 13; $i++)
                                <a class="dropdown-item" href="{{ route('list.subject.class', ['subject'=>'toan-hoc', 'class'=>'lop-'.$i]) }}">Lớp {{ $i }}</a>
                            @endfor
                        </div>
                    </li>
                    <li class="nav-item dn-nav_item">
                        <a href="" class="item_dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vật lý</a>
                        <div class="dropdown-menu dropdown-item-nav" aria-labelledby="dropdownMenuButton">
                            @for ($i = 6; $i < 13; $i++)
                                <a class="dropdown-item" href="{{ route('list.subject.class', ['subject'=>'vat-ly', 'class'=>'lop-'.$i]) }}">Lớp {{ $i }}</a>
                            @endfor
                        </div>
                    </li>
                    <li class="nav-item dn-nav_item">
                        <a href="" class="item_dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hoá học</a>
                        <div class="dropdown-menu dropdown-item-nav" aria-labelledby="dropdownMenuButton">
                            @for ($i = 6; $i < 13; $i++)
                                <a class="dropdown-item" href="{{ route('list.subject.class', ['subject'=>'hoa-hoc', 'class'=>'lop-'.$i]) }}">Lớp {{ $i }}</a>
                            @endfor
                        </div>
                    </li>
                    {{-- <li class="nav-item dn-nav_item">
                        <a href="" class="item_dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sinh học</a>
                        <div class="dropdown-menu dropdown-item-nav" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Lớp 1</a>
                            <a class="dropdown-item" href="#">Lớp 2</a>
                            <a class="dropdown-item" href="#">Lớp 3</a>
                        </div>
                    </li> --}}

                    <li class="nav-item dn-nav_item">
                        <a href="" class="item_dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tiếng Anh</a>
                        <div class="dropdown-menu dropdown-item-nav" aria-labelledby="dropdownMenuButton">
                            @for ($i = 6; $i < 13; $i++)
                                <a class="dropdown-item" href="{{ route('list.subject.class', ['subject'=>'tieng-anh', 'class'=>'lop-'.$i]) }}">Lớp {{ $i }}</a>
                            @endfor
                        </div>
                    </li>

                    <li class="nav-item dn-nav_item">
                        <a href="" class="item_dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thi online</a>
                        <div class="dropdown-menu dropdown-item-nav" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('index.test.online', 'toan-hoc') }}">Toán</a>
                            <a class="dropdown-item" href="{{ route('index.test.online', 'vat-ly') }}">Vật lý</a>
                            <a class="dropdown-item" href="{{ route('index.test.online', 'hoa-hoc') }}">Hóa học</a>
                            <a class="dropdown-item" href="{{ route('index.test.online', 'tieng-anh') }}">Tiếng anh</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@push('scripts')
