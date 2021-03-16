@extends('layouts.app')
@section('title', 'Dạng bài tập')
@section('css')

@endsection
@section('content')

<section class="detail_teacher detail_subject">
    <div class="container">
        <h4>Mã dạng bài #{{ $detail->code}}</h4>
        <div class="detail_exercise">
            <div class="col-lg-12 col-md-12">
                {{-- <img src="{{ asset($detail->image_question) }}" alt="" class="img-fluid"> --}}
                <h5> {!! $detail->title !!}</h5>
            </div>

            <div class="cpl-lg-12">
                @if ($detail->exercise->count())
                <p>Danh sách câu hỏi</p>
                <div class="row">
                    @foreach ($detail->exercise as $val)
                        <div class="col-lg-1 show_popup" data-imgquestion="{{ asset($val->image_question) }}"
                            data-imganswer="{{ asset($val->image_answer) }}">No.{{ $val->code }}</div>
                    @endforeach
                </div>
                @else
                    <p>Chưa có bài tập trong dạng</p>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" id="code"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <p>Câu hỏi</p>
                        <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" style="width: 100%;" id="question_img">
                    </div>
                    <div class="col-12">
                        <p>Đáp án</p>
                        <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" style="width: 100%;" id="answer_img">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="dn-infor--teacher">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Các dạng bài khác</h2>
            </div>
            {{-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> --}}
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
                @foreach ($other as $listType)
                <div class="item">
                    <a href="#">
                        <div class="img_item">
                            <img src="{{ !empty($listType->image) ? asset($listType->image) : asset('webstudent/images/hinh-anh-dep-co-giao-dung-lop-giang-bai_015649220.jpg') }}" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="#">{{ $listType->title }}</a></h4>
                        <div class="description">
                            {!! $listType->description !!}
                        </div>
                        <a href="#" class="link_detail">Xem chi tiết</a>
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
    $('.show_popup').on('click', function(){
        let urlQ = $(this).data('imgquestion');
        let urlA = $(this).data('imganswer');
        document.getElementById("question_img").src = urlQ;
        document.getElementById("answer_img").src = urlA;
        $("#exampleModal").modal();
    });
</script>

@endpush


