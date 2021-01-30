@extends('layouts.app')
@section('title', 'Đề thi '. $detail->title)
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
                        <button type="button" class="form-control btn btn-primary submit">Nộp bài</button>
                    </div>
                </div>
                <div class="card card_question mt-4">
                    <div class="card-header" style="font-weight: 600;">
                        Điền đáp án
                    </div>
                    <div class="card-body">
                        <div class="list_question" id="listQuestion">
                            <form action="{{ route('end.test') }}" method="POST">
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


