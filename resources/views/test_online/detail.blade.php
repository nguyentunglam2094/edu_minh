@extends('layouts.app')
@section('title', 'Đề thi '. $detail->title)
@section('css')

@endsection
@section('content')

<section class="online_test">
    <div class="container">
        <h2>Luyện thi online</h2>
        <h4>{{ $detail->title }}</h4>

        <div class="row mt-4">
            <div class="col-lg-8 col-md-8">
                <div class="box_pdf_test_online">
                    <iframe src="{{ !empty($detail->file_pdf) ? asset($detail->file_pdf) : '' }}" type="application/pdf" width="100%" height="800px" frameborder="0"></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card card_answer">
                    <div class="card-header">
                        Thời gian làm bài {{ $detail->min }} phút!
                        <h4 id="time">{{ $detail->min }}:00</h4>
                    </div>
                    <div class="card-header" style="font-weight: 600;">
                        Các câu đã làm
                    </div>
                    <div class="card-body">
                        <div class="list_answer">
                            {{-- <div class="item_answer ">1</div>
                            <div class="item_answer active">1</div> --}}
                            @for ($i = 1; $i <= $detail->question_number; $i++)
                                <div class="item_answer number_{{ $i }}">{{ $i }}</div>
                            @endfor

                        </div>
                        <button type="button" class="form-control btn btn-success" id="start_test">BẮT ĐẦU LÀM</button>

                        <button type="button" class="form-control btn btn-primary submit" id="end_test">NỘP BÀI</button>
                    </div>
                </div>
                <div class="card card_question mt-4" id="input_answer">
                    <div class="card-header" style="font-weight: 600;">
                        Điền đáp án
                    </div>
                    <div class="card-body">
                        <div class="list_question" id="listQuestion">
                            <form action="{{ route('end.test') }}" method="POST" id="user_test">
                                @csrf
                                <input type="hidden" name="test_id" value="{{ $detail->id }}">
                                @for ($i = 1; $i <= $detail->question_number; $i++)
                                <div class="question_answer">
                                    <div class="title_question">Câu {{ $i }}: </div>
                                    <label class="content_answer_text">
                                        <input type="radio" class="select_answer" value="1" data-number="{{ $i }}" name="answer[{{ $i }}]">
                                        <span class="checkmark">A</span>
                                    </label>
                                    <label class="content_answer_text">
                                        <input type="radio" class="select_answer" value="2" data-number="{{ $i }}" name="answer[{{ $i }}]">
                                        <span class="checkmark">B</span>
                                    </label>
                                    <label class="content_answer_text">
                                        <input type="radio" class="select_answer" value="3" data-number="{{ $i }}"  name="answer[{{ $i }}]">
                                        <span class="checkmark">C</span>
                                    </label>
                                    <label class="content_answer_text">
                                        <input type="radio" class="select_answer" value="4" data-number="{{ $i }}"  name="answer[{{ $i }}]">
                                        <span class="checkmark">D</span>
                                    </label>
                                </div>
                                @endfor
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn nộp bài?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">
                                                Vui lòng kiểm tra lại các câu trả lời trước khi nộp bài. Bạn không thể thay đổi câu trả lời sau khi nộp bài.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Ok</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                      <span class="count_comment"></span>
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
                      <img src="{{ !empty(\Auth::user()->avatar) ? asset(\Auth::user()->avatar) : 'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg' }}" alt="avatar"/>
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
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                //submit form user_test
                $('#user_test').submit();
                return false;
            }
        }, 1000);
    }

    $( document ).ready(function() {
        loadComment();
        $('#input_answer').hide();
        $('#end_test').hide();
    });

    $('#start_test').on('click', function(e){
        var fiveMinutes = 60 * {{ $detail->min }},
            display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        $(this).hide();
        $('#end_test').show();
        $('#input_answer').show();
    })

</script>

<script>
    $('.select_answer').on('click', function(e){
        let number = $(this).data('number');
        $('.number_' + number).addClass('active');
    });

    $('.submit').on('click', function(e){
        let numItems = $('.active').length;
        if(numItems < {{ $detail->question_number }}){
            alert('Bạn không thể nộp bài khi chưa hoàn thành tất cả câu hỏi!');
            return false;
        }
        $("#exampleModal").modal()
    });

    var ex_id = {{ $detail->id }};

    function loadComment(){
        $.ajax({
            type: "GET",
            url: "{{ route('comment.test') }}",
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
            url: "{{ route('comment.test') }}",
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
                        '<textarea class=\"comment_replay\" id=\"comment_replay\" placeholder=\"Add a comment...\"></textarea>'+
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


