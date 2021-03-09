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
                        <div class="col-lg-1">{{ $val->code }}</div>
                    @endforeach
                </div>
                @else
                <p>Chưa có bài tập trong dạng</p>
                @endif
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
</script>
@endpush


