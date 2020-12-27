@extends('layouts.app')
@section('title', 'Dashboard')
@section('css')

@endsection
@section('content')
<section class="nd-banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('/webstudent/images/anh-bia-facebook-dep-124.png') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('/webstudent/images/anh-bia-buon-1.jpg') }}" alt="Second slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</section>
<section class="dn-infor--teacher">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Thông tin giáo viên</h2>
            </div>
            <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
                @if ($teachers->count() > 0)
                    @foreach ($teachers as $teacher)
                    <div class="item">
                        <a href="detail_teacher.html">
                            <div class="img_item">
                                <img src="{{ asset('webstudent/images/maxresdefault (1).jpg') }}" alt="">
                            </div>
                        </a>
                        <div class="box_infor">
                            <h4><a href="#">{{ $teacher->gender == 1 ? 'Mr' : 'Ms' }}. {{ $teacher->name }}</a></h4>
                            <div class="description">
                                {!! $teacher->description !!}
                            </div>
                            <a href="detail_teacher.html" class="link_detail">Xem chi tiết</a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<section class="introduce">
    <div class="container">
        <div class="box_introduce">
            <div class="bg_intro"></div>
            <div class="row">
                <div class="col-lg-5 col-md-5 d-flex align-items-center">
                    <div class="introduce_logo text-center">
                        <img src="{{ asset('webstudent/images/logo448x152.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="infor_web">
                        <h2>Giới thiệu chung</h2>
                        <div class="description">
                            <ul>
                                <li>Được thành lập từ năm 2013, Tuyensinh247.com hoạt động sứ mệnh "Giúp các bạn học sinh trên khắp mọi miền Việt Nam có môi trường học bình đẳng, học với giáo viên giỏi hàng đầu Việt Nam"</li>
                                <li>Trong nhiều năm qua Tuyensinh247.com đã không ngừng khẳng định vị trí và chất lượng trong lĩnh vực đào tạo trực tuyến cho học sinh cấp 1, 2, 3 khi nhận được sự tin tưởng của hơn 1.000.000 học sinh theo học, số lượng học sinh đạt HSG, Thủ khoa, Á Khoa đại học không ngừng tăng qua từng năm.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dn-subject">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Các dạng bài tập</h2>
            </div>
            <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        <div class="list_subject">
            <div class="row">

                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="item_subject">
                        <a href="detail_exercise.html">
                            <div class="img_subject">
                                <img src="images/De-Thi-Mon-Toan-2020.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="infor_subject">
                                <h4>Đề thi môn toán 2020</h4>
                                <div class="name_subject"><span>Môn</span>: <span>Toán học</span></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
</script>
@endpush


