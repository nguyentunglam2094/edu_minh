@extends('layouts.app')
@section('title', 'Dashboard')
@section('css')

@endsection
@section('content')
<section class="nd-banner">
    <?php
        $countBanner = $listBanner->count();
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < $countBanner; $i++)
                <li data-target="#carouselExampleIndicators" data-slide-to="0" {{ $i == 0 ? 'class="active"' : '' }}></li>
            @endfor

        </ol>
        <div class="carousel-inner">
            @foreach ($listBanner as $key=>$item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset($item->image) }}" alt="slide">
                </div>
            @endforeach

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
                        <a href="#">
                            <div class="img_item">
                                <img src="{{ !empty($teacher->avatar) ? asset($teacher->avatar) : asset('/images/no-avatar-7.png') }}" alt="">
                            </div>
                        </a>
                        <div class="box_infor">
                            <h4><a href="#">{{ $teacher->gender == 1 ? 'Mr' : 'Ms' }}. {{ $teacher->name }}</a></h4>
                            <div class="description">
                                {!! $teacher->description !!}
                            </div>
                            <a href="#" class="link_detail">Xem chi tiết</a>
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
                        <img src="{{ asset('images/logo-01.png') }}" alt="" class="img-fluid">
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
                <a href="{{ route('list.subject') }}" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        <div class="list_subject">
            <div class="row">
                @foreach ($listEx as $type)
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="item_subject">
                        <a href="{{ route('detail.subject', $type->id) }}">
                            <div class="img_subject">
                                <img src="{{ !empty($type->image) ? asset($type->image) : asset('images/no-image.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="infor_subject">
                                <h4>{{ $type->title }}</h4>
                                <div class="name_subject"><span>Môn</span>: <span>{{ $type->subject->title }}</span></div>
                            </div>
                        </a>
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


