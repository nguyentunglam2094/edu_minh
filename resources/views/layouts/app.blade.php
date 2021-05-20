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
            @include('layouts.headers')
            @yield('content')

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
