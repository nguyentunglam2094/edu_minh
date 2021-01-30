@extends('layouts.app')
@section('title', 'Bài tập')
@section('css')

@endsection
@section('content')

<section class="detail_teacher detail_subject">
    <div class="container">
        <h4>#{{ $detail->code .'. ' .$detail->question }}</h4>
        <div class="detail_exercise">
            <div class="col-lg-12 col-md-12">
                <img src="{{ asset($detail->image_question) }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="dn-infor--teacher dn-list_excercise">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Danh sách bài tập tương tự</h2>
            </div>
            {{-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> --}}
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
               @foreach ($listSame as $item)
               <div class="item_subject">
                <a href="#">
                    <div class="img_subject">
                        <img src="{{ !empty($item->image_question) ? asset($item->image_question) : asset('images/no-image.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="infor_subject">
                        <h4>#{{ $item->code . '. ' .$item->question }}</h4>
                        <div class="name_subject"><span>Môn</span>: <span>{{ $item->typeExercire->subject->title }}</span></div>
                    </div>
                </a>
            </div>
               @endforeach
            </div>
          </div>
    </div>
</section>
<section class="comment">
    <div class="container">
        <div class="col-md-12" id="fbcomment">
            <div class="header_comment">
                <div class="row">
                    <div class="col-md-6 text-left">
                      <span class="count_comment">264235 Comments</span>
                    </div>
                    {{-- <div class="col-md-6 text-right">
                      <span class="sort_title">Sort by</span>
                      <select class="sort_by">
                        <option>Top</option>
                        <option>Newest</option>
                        <option>Oldest</option>
                      </select>
                    </div> --}}
                </div>
            </div>

            <div class="body_comment">
                <div class="row">
                    <div class="avatar_comment col-md-1">
                      <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                    </div>
                    <div class="box_comment col-md-11">
                      <textarea class="commentar" id="new_comment" placeholder="Add a comment..."></textarea>
                      <div class="box_post">
                        {{-- <div class="pull-left">
                          <input type="checkbox" id="post_fb"/>
                          <label for="post_fb">Also post on Facebook</label>
                        </div> --}}
                        <div class="pull-right">
                          {{-- <span>
                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
                            <i class="fa fa-caret-down"></i>
                          </span> --}}
                          <button type="button" id="post_comment">Bình luận</button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row" id="comments">

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('scripts')
<script>
    var ex_id = {{ $detail->id }};
    $( document ).ready(function() {
        loadComment();
    });

    function loadComment(){
        $.ajax({
            type: "GET",
            url: "{{ route('comment.exersire') }}",
            data: {
                ex_id: ex_id,
                _token: "{{ csrf_token() }}"
                },
            success: function (result) {
                $('#comments').html(result);
            },
            error: function (result) {
            }
        });
    }

    $('#post_comment').on('click', function(e){
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

</script>
<script>
        $(document).ready(function() {

            $('body').on('click', '.replay', function (e) {
                cancel_reply();
                $current = $(this);
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
                                '<span>'+
                                    '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\" />'+
                                    '<i class=\"fa fa-caret-down\"></i>'+
                                '</span>'+
                                '<button class=\"cancel\" onclick=\"cancel_reply()\" type=\"button\">Cancel</button>'+
                                '<button onclick=\"submit_reply()\" type=\"button\" value=\"1\">Reply</button>'+
                                '</div>'+
                            '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                $current.closest('li').find('.child_replay').prepend(el);
            });
        });

        function submit_reply(){
            var comment_replay = $('.comment_replay').val();
            el = document.createElement('li');
            el.className = "box_reply row";
            el.innerHTML =
                    '<div class=\"avatar_comment col-md-1\">'+
                    '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
                    '</div>'+
                    '<div class=\"result_comment col-md-11\">'+
                    '<h4>Anonimous</h4>'+
                    '<p>'+ comment_replay +'</p>'+
                    '<div class=\"tools_comment\">'+
                    {{--  '<a class=\"like\" href=\"javascript:void(0):\">Like</a><span aria-hidden=\"true\"> · </span>'+  --}}
                    {{--  '<i class="\far fa-thumbs-up\"></i> <span class=\"count\">0</span>'+  --}}
                    {{--  '<span aria-hidden=\"true\"> · </span>'+  --}}
                    '<a class=\"replay\" href=\"javascript:void(0):\">Reply</a><span aria-hidden=\"true\"> · </span>'+
                        '<span>1m</span>'+
                    '</div>'+
                    '<ul class="child_replay"></ul>'+
                    '</div>';
                $current.closest('li').find('.child_replay').prepend(el);
                $('.comment_replay').val('');
                cancel_reply();
        }

        function cancel_reply(){
            $('.reply_comment').remove();
        }
</script>
@endpush


