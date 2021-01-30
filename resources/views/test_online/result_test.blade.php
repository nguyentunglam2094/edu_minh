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
                                    <div class="title_question">Câu {{ $answer->question_number }}: <span><a href="javascript:void(0);" style="font-style: 14px !important;">Xem đáp án</a></span></div>
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
                    <div class="col-md-6 text-left">
                      <span class="count_comment">264235 Comments</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <span class="sort_title">Sort by</span>
                      <select class="sort_by">
                        <option>Top</option>
                        <option>Newest</option>
                        <option>Oldest</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="body_comment">
                <div class="row">
                    <div class="avatar_comment col-md-1">
                      <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                    </div>
                    <div class="box_comment col-md-11">
                      <textarea class="commentar" placeholder="Add a comment..."></textarea>
                      <div class="box_post">
                        <div class="pull-left">
                          <input type="checkbox" id="post_fb"/>
                          <label for="post_fb">Also post on Facebook</label>
                        </div>
                        <div class="pull-right">
                          <span>
                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
                            <i class="fa fa-caret-down"></i>
                          </span>
                          <button onclick="submit_comment()" type="button" value="1">Post</button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <ul id="list_comment" class="col-md-12">
                        <!-- Start List Comment 1 -->
                        <li class="box_result row">
                            <div class="avatar_comment col-md-1">
                                <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                            </div>
                            <div class="result_comment col-md-11">
                                <h4>Nath Ryuzaki</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                <div class="tools_comment">
                                    <a class="like" href="javascript:void(0):">Like</a>
                                    <span aria-hidden="true"> · </span>
                                    <a class="replay" href="javascript:void(0):">Reply</a>
                                    <span aria-hidden="true"> · </span>
                                    <i class="far fa-thumbs-up"></i> <span class="count">1</span>
                                    <span aria-hidden="true"> · </span>
                                    <span>26m</span>
                                </div>
                                <ul class="child_replay">
                                    <li class="box_reply row">
                                        <div class="avatar_comment col-md-1">
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                        </div>
                                         <div class="result_comment col-md-11">
                                            <h4>Sugito</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                            <div class="tools_comment">
                                                <a class="like" href="javascript:void(0):">Like</a>
                                                <span aria-hidden="true"> · </span>
                                                <a class="replay" href="javascript:void(0):">Reply</a>
                                                <span aria-hidden="true"> · </span>
                                                <i class="far fa-thumbs-up"></i> <span class="count">1</span>
                                                <span aria-hidden="true"> · </span>
                                                <span>26m</span>
                                            </div>
                                            <ul class="child_replay"></ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Start List Comment 2 -->
                        <li class="box_result row">
                            <div class="avatar_comment col-md-1">
                                <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                            </div>
                            <div class="result_comment col-md-11">
                                <h4>Gung Wah</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                <div class="tools_comment">
                                    <a class="like" href="javascript:void(0):">Like</a>
                                    <span aria-hidden="true"> · </span>
                                    <a class="replay" href="javascript:void(0):">Reply</a>
                                    <span aria-hidden="true"> · </span>
                                    <i class="far fa-thumbs-up"></i> <span class="count">1</span>
                                    <span aria-hidden="true"> · </span>
                                    <span>26m</span>
                                </div>
                                <ul class="child_replay"></ul>
                            </div>
                        </li>
                    </ul>
                    <button class="show_more" type="button">Load 10 more comments</button>
                </div>
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
@endpush


