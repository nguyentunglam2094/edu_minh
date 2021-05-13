@extends('layouts.app')
@section('title', 'Tất cả dạng bài tập')
@section('css')

@endsection
@section('content')

<section class="dn-subject">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Danh sách bài tập</h2>
            </div>
            <!-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> -->
        </div>

        @if ($list->total() > 0)
        <div class="list_subject">
            <div class="row">
                @foreach ($list as $type)
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="item_subject">
                        <a href="#" class="detail_ex" data-exid="{{ $type->id }}">
                            <div class="img_subject">
                                <img src="{{ !empty($type->image_answer) ? asset($type->image_answer) : asset('images/no-image.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="infor_subject">
                                <h4>{{ 'Mã câu: ' . $type->code .' '. $type->question }}</h4>
                                <div class="name_subject"><span>Môn </span>: <span>{{ $type->subject->title }}</span></div>
                                <div class="name_subject"><span>Lớp </span>: <span>{{ $type->class->title }}</span></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    @if ($list->currentPage() == 1)
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    @else
                    <a class="page-link" href="{{ $list->path() . '?page='. ($list->currentPage() - 1) }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    @endif
                  </li>
                  @for ($i = 1; $i <= $list->lastPage(); $i++)
                    <li class="page-item"><a class="page-link" href="{{ $list->path() . '?page='.$i }}">{{ $i }}</a></li>
                  @endfor
                  <li class="page-item">
                      @if ($list->currentPage() == $list->lastPage())
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                      @else
                      <a class="page-link" href="{{ $list->path() . '?page='. ($list->currentPage() + 1) }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                      @endif

                  </li>
                </ul>
              </nav>
        </div>
        @endif

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

    $('body').on('click', '#post_comment', function(e){
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


