@extends('layouts.app')
@section('title', 'Dạng bài tập')
@section('css')

@endsection
@section('content')

<section class="detail_teacher detail_subject">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="avatar">
                    <img src="{{ !empty($detail->image) ? asset($detail->image) : asset('webstudent/images/hinh-anh-dep-co-giao-dung-lop-giang-bai_015649220.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="box_info_subject">
                    <h4>{{ $detail->title }}</h4>
                    <div class="description"> {!! $detail->description !!} </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="box_description">
                    <h4>Danh sách các loại bài tập</h4>
                    <div id="list_subject">
                        <ul class="term-list">
                            @foreach ($listEx as $ex)
                                <li class="term-item ">
                                    <a href="{{ route('detail.exersire', $ex->id) }}">{{ $ex->code .'. '. $ex->question }}</a>
                                </li>
                            @endforeach
                        </ul>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dn-infor--teacher">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Dạng bài tập tương tự</h2>
            </div>
            {{-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> --}}
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
                @foreach ($listSubject as $listType)
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


