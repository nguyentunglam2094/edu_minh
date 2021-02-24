@extends('layouts.app')
@section('title', 'Bài tập')
@section('css')

@endsection
@section('content')

<section class="detail_teacher detail_subject">
    <div class="container">
        <h4>Mã #{{ $detail->code}}</h4>
        <div class="detail_exercise">
            <div class="col-lg-12 col-md-12">
                {{-- <img src="{{ asset($detail->image_question) }}" alt="" class="img-fluid"> --}}
                {!! $detail->question !!}
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script type="text/javascript" id="MathJax-script" async
  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
</script>
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
    var parent_comment = null;
        $(document).ready(function() {

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
                $current.closest('li').find('.child_replay').prepend(el);
            });
        });

        function submit_reply(){
            let newCmt = $('#comment_replay').val();
            if(newCmt === '' || newCmt == null){
                alert('Bạn không thể gửi comment mà không nhập nội dung!');
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{ route('comment.test') }}",
                data: {
                    newCmt: newCmt,
                    ex_id: ex_id,
                    parent_id:parent_comment,
                    _token: "{{ csrf_token() }}"
                    },
                success: function (result) {
                    $('#comment_replay').val(null);
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


