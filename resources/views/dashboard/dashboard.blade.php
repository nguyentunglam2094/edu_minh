@extends('layouts.app')
@section('title', 'Dashboard')
@section('css')

@endsection
@section('content')
<section class="nd-banner">
    <?php
        $countBanner = $listBanner->count();
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < $countBanner; $i++)
                <li data-target="#carouselExampleIndicators" data-slide-to="0" {{ $i == 0 ? 'class="active"' : '' }}></li>
            @endfor

        </ol>
        <div class="carousel-inner">
            @foreach ($listBanner as $key=>$item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset($item->image) }}" alt="slide">
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</section>
<section class="dn-infor--teacher">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Thông tin giáo viên</h2>
            </div>
            {{-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> --}}
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
                @if ($teachers->count() > 0)
                    @foreach ($teachers as $teacher)
                    <div class="item">
                        <a href="{{ route('detail.teacher', $teacher->id) }}">
                            <div class="img_item">
                                <img src="{{ !empty($teacher->avatar) ? asset($teacher->avatar) : asset('/images/no-avatar-7.png') }}" alt="">
                            </div>
                        </a>
                        <div class="box_infor">
                            <h4><a href="{{ route('detail.teacher', $teacher->id) }}">{{ $teacher->name }}</a></h4>
                            <div class="description">
                                {!! $teacher->description !!}
                            </div>
                            <a href="{{ route('detail.teacher', $teacher->id) }}" class="link_detail">Xem chi tiết</a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<section class="introduce">
    <div class="container">
        <img src="{{ asset('/images/Asset5.png') }}" alt="" class="image-dashboard">
    </div>
</section>
<section class="dn-subject">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Danh sách bài tập</h2>
            </div>
            {{-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="{{ route('list.subject') }}" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> --}}
        </div>
        <div class="list_subject">
            <div class="row">
                @foreach ($listEx as $type)
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="item_subject">
                        <a href="#" class="detail_ex" data-exid="{{ $type->id }}">
                            <div class="img_subject">
                                <img src="{{ !empty($type->image_question) ? asset($type->image_question) : asset('images/no-image.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="infor_subject">
                                <h4>{{ 'Mã câu: ' . $type->code .' '. $type->question }}</h4>
                                <div class="name_subject"><span>Môn </span>: <span>{{ !empty($type->subject) ? $type->subject->title : '' }}</span></div>
                                <div class="name_subject"><span>Lớp </span>: <span>{{ !empty($type->class) ? $type->class->title : '' }}</span></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    var ex_id;
    var parent_comment = null;

    $('.detail_ex').on('click', function(e){
        ex_id = $(this).data('exid');
        $('#detailEx').modal('show');
    });

    // $('#detailEx').on('shown.bs.modal', function (e) {
    //     // do something...
    //     loadComment(ex_id)
    // });

    // $('body').on('click', '#post_comment', function(e){
    //     let newCmt = $('#new_comment').val();

    //     if(newCmt === '' || newCmt == null){
    //         alert('Bạn không thể gửi comment mà không nhập nội dung!');
    //         return false;
    //     }
    //     $.ajax({
    //         type: "GET",
    //         url: "{{ route('comment.exersire') }}",
    //         data: {
    //             newCmt: newCmt,
    //             ex_id: ex_id,
    //             _token: "{{ csrf_token() }}"
    //             },
    //         success: function (result) {
    //             $('#new_comment').val(null);
    //             $('#comments').html(result);
    //         },
    //         error: function (result) {
    //         }
    //     });
    // });

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
@endpush


