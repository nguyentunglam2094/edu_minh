@extends('layouts.app')
@section('title', 'Giáo viên')
@section('css')

@endsection
@section('content')

<section class="detail_teacher detail_subject">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="avatar">
                    <img src="{{ !empty($detail->avatar) ? asset($detail->avatar) : asset('images/no-image.png') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="box_info_subject">
                    <h4>Giáo Viên: {{ $detail->name }}</h4>
                    <h4>Môn dạy: {{ $detail->subject->title }}</h4>
                    <h4>Mô tả chi tiết:</h4>
                    <div class="description"> {!! $detail->description !!} </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="dn-infor--teacher">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Các giáo viên khác</h2>
            </div>
            {{-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> --}}
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
                @foreach ($otherTeachers as $teacher)
                <div class="item">
                    <a href="{{ route('detail.teacher', $teacher->id) }}">
                        <div class="img_item">
                            <img src="{{ !empty($teacher->avatar) ? asset($teacher->avatar) : asset('images/no-image.png') }}" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="{{ route('detail.teacher', $teacher->id) }}">{{ $teacher->name }}</a></h4>
                        <div class="description">
                            {!! $teacher->description !!}
                        </div>
                        <a href="{{ route('detail.teacher', $teacher->id) }}" class="link_detail">Xem chi tiết</a>
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


