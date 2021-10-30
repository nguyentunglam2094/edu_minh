<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('webstudent/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('webstudent/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link rel="shortcut icon" href="{{ asset('images/Artboard1.png') }}" type="image/x-icon">

    <meta property="og:title" content="Trung tâm Bright Star">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="Trung tâm Bright Star">
    <meta property="og:image" content="{{ asset('images/image_share_link.jpg') }}" />
    <meta property="og:image:height" content="300">
    <meta property="og:image:width" content="300">

    @yield('css')

</head>
<body>
    <div class="wrap">
        <header>
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

                                @foreach ($listClass as $class)
                                <li class="nav-item dn-nav_item">
                                    <a href="#" class="item_dropdown {{ $class->testType->count() > 0 ? 'dropdown-toggle' : '' }}" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $class->title }}</a>
                                    @if ($class->testType->count() > 0)
                                        <div class="dropdown-menu dropdown-item-nav" aria-labelledby="dropdownMenuButton">
                                            @foreach ($class->testType as $testType)
                                            <a class="dropdown-item" href="{{ route('view.type.test', ['id'=>$testType->id, 'slug'=>$detail->slug]) }}">{{ $testType->title }}</a>
                                            @endforeach
                                        </div>
                                    @endif
                                </li>
                                @endforeach


                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            @push('scripts')

            <section class="dn-subject">
                <div class="container">

                    <div class="row mb-2">
                        <div class="col-lg-10 col-md-10">
                            <h2>{{ $title }}</h2>
                        </div>
                        <!-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                            <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
                        </div> -->
                    </div>
                    <div class="list_subject">
                        <div class="row">
                            @foreach ($tests as $test)
                            <div class="col-lg-3 col-md-3 mb-4">
                                <div class="item_subject">
                                    <a href="{{ route('test.online', $test->id) }}">
                                        <div class="img_subject">
                                            <img src="{{ asset('images/testImage.jpeg') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="infor_subject">
                                            <h4>{{ $test->title }}</h4>
                                            <div class="name_subject"><span>Số lượng câu hỏi</span>: {{ $test->question_number }}<span></span></div>
                                            <div class="name_subject"><span>Thời gian làm bài</span>: {{ $test->min }}<span></span></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                              <li class="page-item">
                                @if ($tests->currentPage() == 1)
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                @else
                                <a class="page-link" href="{{ $tests->path() . '?page='. ($tests->currentPage() - 1) }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                @endif
                              </li>
                              @for ($i = 1; $i <= $tests->lastPage(); $i++)
                                <li class="page-item"><a class="page-link" href="{{ $tests->path() . '?page='.$i }}">{{ $i }}</a></li>
                              @endfor
                              <li class="page-item">
                                  @if ($tests->currentPage() == $tests->lastPage())
                                  <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                  @else
                                  <a class="page-link" href="{{ $tests->path() . '?page='. ($tests->currentPage() + 1) }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                  @endif

                              </li>
                            </ul>
                          </nav>
                    </div>

                </div>
            </section>

            <!-- Large modal -->
            <div class="modal fade bd-example-modal-lg" id="detailEx" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            @include('layouts.footers')
        </header>
    </div>

    <script src="{{ asset('webstudent/js/jquery-3.4.1.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script src="{{ asset('webstudent/js/index.js') }}"></script>

    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase.js"></script>
    <script src="{{ asset('js/firebase.init.js') }}"></script>

    <script>
        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification permission granted.");
                // console.log(messaging.getToken());
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);
                $.ajax({
                    type:'POST',
                    url: '{{ route('update.token.device') }}',
                    data:{token : token, _token: "<?php echo csrf_token(); ?>"},
                    success:function(data){
                    //    console.log(data);
                    }
                });
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });

            messaging.onMessage(function(payload, data) {
                //kiểm tra số tin nhắn chưa đ
                console.log("Message received. ", payload);
                toastr.success(payload.notification.body,payload.notification.title, {
                    onclick: function(){
                        // var url = '{{ url('/detailTransaction/') }}/' + payload.data.id;
                        // window.location.href = url;
                        // update ajax push
                        console.log('abcddddddd');
                    }
                });
                //admin.detail.transaction
                // NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload)
            });
    </script>

    <script>
        function loadComment(ex_id, type = null){
            $.ajax({
                type: "GET",
                url: "{{ route('comment.exersire') }}",
                data: {
                    ex_id: ex_id,
                    type: type,
                    _token: "{{ csrf_token() }}"
                    },
                success: function (result) {
                    $('.modal-content').html(result);
                },
                error: function (result) {
                }
            });
        }

        function convertMsg(msg) {
            msg = msg.toLowerCase();
            msg = msg.charAt(0).toUpperCase() + msg.slice(1);
            return msg;
        }
        @if(Session::has('message'))
            console.log(1);
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
          @else
          console.log(2);

          @endif
    </script>

    <script>
    $('body').on('keyup','#search_input',function(e){
        if (e.key === 'Enter' || e.keyCode === 13) {
            ex_id = $(this).val();
            type = 1;
            $('#detailEx').modal('show');
        }
    });

    var ex_id;
    var parent_comment = null;
    var type = null;

    $('#detailEx').on('shown.bs.modal', function (e) {
        // do something...
        loadComment(ex_id, type);
    });

    $('body').on('click', '#post_comment', function(e){
        let newCmt = $('#new_comment').val();

        if(newCmt === '' || newCmt == null){
            alert('Bạn không thể gửi comment mà không nhập nội dung!');
            return false;
        }
        $.ajax({
            type: "GET",
            url: "{{ route('comment.exersire') }}",
            data: {
                newCmt: newCmt,
                ex_id: ex_id,
                _token: "{{ csrf_token() }}"
                },
            success: function (result) {
                $('#new_comment').val(null);
                $('#comments').html(result);
            },
            error: function (result) {
            }
        });
    });

    $('body').on('click', '.replay', function (e) {
        cancel_reply();
        $current = $(this);
        parent_comment = $(this).data('parentid');
        el = document.createElement('li');
        el.className = "box_reply row";
        el.innerHTML =
            '<div class=\"col-md-12 reply_comment\">'+
                '<div class=\"row\">'+
                    '<div class=\"avatar_comment col-md-1\">'+
                    '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
                    '</div>'+
                    '<div class=\"box_comment col-md-10\">'+
                    '<textarea class=\"comment_replay\" placeholder=\"Add a comment...\"></textarea>'+
                    '<div class=\"box_post\">'+
                        '<div class=\"pull-right\">'+
                        '<button class=\"cancel\" onclick=\"cancel_reply()\" type=\"button\">Cancel</button>'+
                        '<button onclick=\"submit_reply()\" type=\"button\" value=\"1\">Reply</button>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
        $current.closest('li').find('.child_replay_'+parent_comment).prepend(el);
    });

    function submit_reply(){
        let newCmt = $('.comment_replay').val();
        if(newCmt === '' || newCmt == null){
            alert('Bạn không thể gửi comment mà không nhập nội dung!');
            return false;
        }
        $.ajax({
            type: "GET",
            url: "{{ route('comment.exersire') }}",
            data: {
                newCmt: newCmt,
                ex_id: ex_id,
                parent_id:parent_comment,
                _token: "{{ csrf_token() }}"
                },
            success: function (result) {
                $('.comment_replay').val(null);
                $('#comments').html(result);
            },
            error: function (result) {
            }
        });
    }

    function cancel_reply(){
        $('.reply_comment').remove();
    }

    </script>
    @stack('scripts')
</body>
</html>
