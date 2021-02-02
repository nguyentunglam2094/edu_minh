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
    <link rel="shortcut icon" href="{{ asset('webstudent/images/logo448x152.png') }}" type="image/x-icon">
    @yield('css')
</head>
<body>
    <div class="wrap">
        <header>
            @include('layouts.headers')
            @yield('content')
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
                    var search = $(this).val();
                    var url = '{{ route('search.code') }}';
                    url += '?search='+search;
                    location.href = url;
                }
            });
    </script>
    @stack('scripts')
</body>
</html>
