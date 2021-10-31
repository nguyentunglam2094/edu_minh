<div class="modal-header">
    <h5 class="modal-title">Chi tiết đáp án</h5>
    <button type="button" class="close" style="display: contents;" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">x</span>
    </button>


  </div>

@if (!empty($detail))
<section class="detail_teacher detail_subject">
    <div class="container">
        <h4>Mã #{{ $detail->code }}</h4>
        <h5>Câu hỏi {{ $detail->question }}</h5>
        <div class="detail_exercise">
            <div class="col-lg-12 col-md-12">
                <img src="{{ asset(!empty($detail->image_question) ? $detail->image_question : 'images/no-image.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-12 col-md-12" style="margin-top: 15px; margin-bottom: 15px" >
                <strong style="font-size: 20px"> Đáp án: @switch($detail->selected_question)
                    @case(1) A @break
                    @case(2) B @break
                    @case(3) C @break
                    @case(4) D @break
                    @default
                @endswitch</strong>
            </div>
            <div class="col-lg-12 col-md-12">
                @if (!empty($detail->image_answer))
                    @foreach (explode('|', $detail->image_answer) as $key=>$item)
                        @if (!empty($item))
                        <img src="{{ asset($item) }}" alt="" class="img-fluid">
                        @endif
                    @endforeach
                @else
                    <strong>Chưa có lời giải</strong>
                @endif
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
                      <span class="count_comment">{{ $count }} Comments</span>
                    </div>
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
                        <div class="pull-right">
                          <button type="button" id="post_comment">Bình luận</button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row" id="comments">
                    <ul id="list_comment" class="col-md-12">
                        <!-- Start List Comment 1 -->
                        @foreach ($listComment as $comment)
                        <li class="box_result row">
                            @if (!empty($comment->user))
                            <div class="avatar_comment col-md-1">
                                <img src="{{ !empty($comment->user->avatar) ? asset($comment->user->avatar) : 'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg' }}" alt="avatar"/>
                            </div>
                            @else
                            <div class="avatar_comment col-md-1">
                                <img src="{{ !empty($comment->teacher->avatar) ? asset($comment->teacher->avatar) : 'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg' }}" alt="avatar"/>
                            </div>
                            @endif

                            <div class="result_comment col-md-11">
                                @if (!empty($comment->user))
                                <h4>{{ !empty($comment->user) ? $comment->user->name : 'No name' }} (Học sinh)</h4>
                                @else
                                <h4>{{ !empty($comment->teacher) ? $comment->teacher->name : 'No name' }} (Giáo viên)</h4>
                                @endif
                                <p>{!! $comment->comment !!}</p>
                                <div class="tools_comment">
                                    {{--  <a class="like" href="javascript:void(0):">Like</a>
                                    <span aria-hidden="true"> · </span>  --}}
                                    <a class="replay" data-parentid="{{ $comment->id }}" href="javascript:void(0);">Reply</a>
                                    <span aria-hidden="true"> · </span>
                                    {{-- <i class="far fa-thumbs-up"></i> <span class="count">1</span>
                                    <span aria-hidden="true"> · </span> --}}
                                    <span>{{ !empty($comment->created_at) ? date('H:i:s d-m-Y', strtotime($comment->created_at)) : 'N/a' }}</span>
                                </div>
                                <ul class="child_replay_{{ $comment->id }}"></ul>
                                @if (count($comment->parentComment) > 0)
                                    <ul class="child_replay">
                                        @foreach ($comment->parentComment as $parentComment)
                                        <li class="box_reply row ">
                                            @if (!empty($parentComment->user))
                                                <div class="avatar_comment col-md-1">
                                                    <img src="{{ !empty($parentComment->user->avatar) ? asset($parentComment->user->avatar) : 'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg' }}" alt="avatar"/>
                                                </div>
                                            @else
                                                <div class="avatar_comment col-md-1">
                                                    <img src="{{ !empty($parentComment->teacher->avatar) ? asset($parentComment->teacher->avatar) : 'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg' }}" alt="avatar"/>
                                                </div>
                                            @endif
                                            <div class="result_comment col-md-11">
                                                @if (!empty($parentComment->user))
                                                    <h4>{{ !empty($parentComment->user) ? $parentComment->user->name : 'No name' }} (Học sinh)</h4>
                                                @else
                                                    <h4>{{ !empty($parentComment->teacher) ? $parentComment->teacher->name : 'No name' }} (Giáo viên)</h4>
                                                @endif

                                                <p>{!! $parentComment->comment !!}</p>
                                                <div class="tools_comment">
                                                    <span>{{ !empty($parentComment->created_at) ? date('H:i:s d-m-Y', strtotime($parentComment->created_at)) : 'N/a' }}</span>
                                                </div>
                                                <ul class="child_replay"></ul>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{-- <button class="show_more" type="button">Load 10 more comments</button> --}}

                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="detail_teacher detail_subject">
    <div class="container">
        <h4>Không tìm thấy câu hỏi</h4>
    </div>
</section>
@endif
