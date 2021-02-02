<ul id="list_comment" class="col-md-12">
    <!-- Start List Comment 1 -->
    @foreach ($listComment as $comment)
    <li class="box_result row">
        <div class="avatar_comment col-md-1">
            <img src="{{ !empty($comment->user->avatar) ? asset($comment->user->avatar) : 'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg' }}" alt="avatar"/>
        </div>
        <div class="result_comment col-md-11">
            <h4>{{ !empty($comment->user) ? $comment->user->name : 'No name' }}</h4>
            <p>{!! $comment->comment !!}</p>
            <div class="tools_comment">
                {{--  <a class="like" href="javascript:void(0):">Like</a>
                <span aria-hidden="true"> · </span>  --}}
                <a class="replay" data-parentid="{{ $comment->id }}" href="javascript:void(0);">Reply</a>
                <span aria-hidden="true"> · </span>
                {{-- <i class="far fa-thumbs-up"></i> <span class="count">1</span>
                <span aria-hidden="true"> · </span> --}}
                <span>26m</span>
            </div>
            <ul class="child_replay"></ul>
            @if (count($comment->parentComment) > 0)
                <ul class="child_replay">
                    @foreach ($comment->parentComment as $parentComment)
                    <li class="box_reply row">
                        <div class="avatar_comment col-md-1">
                            <img src="{{ !empty($parentComment->user->avatar) ? asset($parentComment->user->avatar) : 'https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg' }}" alt="avatar"/>
                        </div>
                        <div class="result_comment col-md-11">
                            <h4>{{ !empty($parentComment->user) ? $parentComment->user->name : 'No name' }}</h4>
                            <p>{!! $parentComment->comment !!}</p>
                            <div class="tools_comment">
                                {{-- <a class="like" href="javascript:void(0):">Like</a>
                                <span aria-hidden="true"> · </span> --}}
                                <a class="replay" href="javascript:void(0);">Reply</a>
                                <span aria-hidden="true"> · </span>
                                {{--  <i class="far fa-thumbs-up"></i> <span class="count">1</span>
                                <span aria-hidden="true"> · </span>  --}}
                                <span>26m</span>
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
<button class="show_more" type="button">Load 10 more comments</button>
