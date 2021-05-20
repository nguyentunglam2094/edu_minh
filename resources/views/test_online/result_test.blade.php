@extends('layouts.app')
@section('title', 'kết quả '. $detail->title)
@section('css')

@endsection
@section('content')

<section class="online_test">
    <div class="container">
        <h2>Luyện thi online</h2>
        <h4>{{ $detail->code . '. ' . $detail->title }}</h4>
        <div class="row mt-4">
            <div class="col-lg-8 col-md-8">
                <div class="box_pdf_test_online">
                    <iframe src="{{ asset($detail->file_pdf) }}" type="application/pdf" width="100%" height="800px" frameborder="0"></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card card_answer">
                    <div class="card-header" style="font-weight: 600;">Kết quả: {{ $result->answer_corredt .'/'.$detail->question_number }}</div>
                    <div class="card-body">
                        <div class="list_answer">
                            {{-- <div class="item_answer ">1</div>
                            <div class="item_answer active">1</div> --}}
                            @foreach ($detail->answers as $answer)
                                <?php
                                    $checkAnswer = $result->userAnser->where('question_number', $answer->question_number)->first();
                                ?>
                                <div class="item_answer {{ $checkAnswer->answer == $answer->selected_question ? 'active' : 'danger' }}">{{ $answer->question_number }}</div>
                            @endforeach
                        </div>
                        <button type="button" class="form-control btn btn-primary submit">Làm lại</button>
                    </div>
                </div>
                <div class="card card_question mt-4">
                    <div class="card-header" style="font-weight: 600;">Đáp án</div>
                    <div class="card-body">
                        <div class="list_question" id="listQuestion">
                            @foreach ($detail->answers as $answer)
                                <?php
                                    $checkAnswer = $result->userAnser->where('question_number', $answer->question_number)->first();
                                    $check = false;
                                    if($checkAnswer->answer == $answer->selected_question){
                                        $check = true;
                                    }
                                ?>
                                <div class="question_answer">
                                    <div class="title_question">Câu {{ $answer->question_number }}: <span><a class="check_answer"
                                        href="javascript:void(0);" style="font-style: 14px !important;"
                                        data-image="{{ asset($answer->image_answer) }}" data-testtitle="{{ $detail->title }}" data-numberq={{ $answer->question_number }}>
                                        Xem đáp án
                                    </a></span></div>

                                    @if ($check)
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 1 ? 'active3' : '' }}">A</span>
                                        </label>
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 2 ? 'active3' : '' }}">B</span>
                                        </label>
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 3 ? 'active3' : '' }}">C</span>
                                        </label>
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 4 ? 'active3' : '' }}">D</span>
                                        </label>
                                    @else
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 1 ? 'active3' : '' }} {{ $checkAnswer->answer == 1 ? 'danger' : '' }}">A</span>
                                        </label>
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 2 ? 'active3' : '' }} {{ $checkAnswer->answer == 2 ? 'danger' : '' }}">B</span>
                                        </label>
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 3 ? 'active3' : '' }} {{ $checkAnswer->answer == 3 ? 'danger' : '' }}">C</span>
                                        </label>
                                        <label class="content_answer_text">
                                            <span class="checkmark {{ $answer->selected_question == 4 ? 'active3' : '' }} {{ $checkAnswer->answer == 4 ? 'danger' : '' }}">D</span>
                                        </label>
                                    @endif
                                </div>
                            @endforeach
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

                    {{-- <div class="col-md-6 text-left">
                      <span class="count_comment">264235 Comments</span>
                    </div> --}}

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

    <!-- Large modal -->
    <div class="modal fade bd-example-modal-lg" id="answer_test" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <section class="detail_teacher detail_subject">
                    <div class="container">
                        <h4 id="test_title"></h4>
                        <h5 id="number_question"></h5>

                        <strong>Lời giải</strong>

                        <div class="detail_exercise">
                            <div class="col-lg-12 col-md-12">
                                <img src="" id="image_answer" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>


</section>



@endsection
@push('scripts')
<script>
    $('.select_answer').on('click', function(e){
        let number = $(this).data('number');
        $('.number_' + number).addClass('active');
    });

    $('.submit').on('click', function(e){
        let numItems = $('.active').length;
        // if(numItems < {{ $detail->question_number }}){
        //     alert('Bạn cần phải trả lời tất cả các câu hỏi');
        //     return false;
        // }
        $("#exampleModal").modal()
    });

</script>
<script>
    $('.select_answer').on('click', function(e){
        let number = $(this).data('number');
        $('.number_' + number).addClass('active');
    });

    $('.submit').on('click', function(e){
        let numItems = $('.active').length;
        $("#exampleModal").modal()
    });

    var ex_id = {{ $detail->id }};
    $( document ).ready(function() {
        loadComment();
    });

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

<script>
    $('body').on('click', '.check_answer', function(e){
        let image = $(this).data('image');
        let test_title = $(this).data('testtitle');
        let numberq = $(this).data('numberq');

        $('#test_title').html(test_title);
        $('#number_question').html('Câu số: ' + numberq);
        $('#image_answer').attr('src', image);

        $('#answer_test').modal('show');
    })
</script>
@endpush


