@extends('layouts.app')
@section('title', 'Dashboard')
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
                                    <a href="">{{ $ex->code .'. '. $ex->question }}</a>
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
                <h2>Danh sách các môn học khác</h2>
            </div>
            <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
                <div class="item">
                    <a href="#">
                        <div class="img_item">
                            <img src="images/maxresdefault (1).jpg" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="#">Toán học 11</a></h4>
                        <div class="description">
                            Cung cấp những kiến thức từ vỡ lòng - là kiến thức học sinh muốn học Hóa cần phải biết (công thức tính mol, cân bằng phương trình phản ứng...) đến nền tảng cốt lõi (muốn ôn thi phải biết) (cấu tạo nguyên tử, liên kết hóa học...), là bước đệm để ôn thi.
                        </div>
                        <a href="#" class="link_detail">Xem chi tiết</a>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="img_item">
                            <img src="images/giao-vien-01.jpg" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="#">Vật lý 11</a></h4>
                        <div class="description">
                            Cung cấp những kiến thức từ vỡ lòng - là kiến thức học sinh muốn học Hóa cần phải biết (công thức tính mol, cân bằng phương trình phản ứng...) đến nền tảng cốt lõi (muốn ôn thi phải biết) (cấu tạo nguyên tử, liên kết hóa học...), là bước đệm để ôn thi.
                        </div>
                        <a href="#" class="link_detail">Xem chi tiết</a>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="img_item">
                            <img src="images/hinh-anh-dep-co-giao-dung-lop-giang-bai_015649220.jpg" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="#">Hoá học 11</a></h4>
                        <div class="description">
                            Cung cấp những kiến thức từ vỡ lòng - là kiến thức học sinh muốn học Hóa cần phải biết (công thức tính mol, cân bằng phương trình phản ứng...) đến nền tảng cốt lõi (muốn ôn thi phải biết) (cấu tạo nguyên tử, liên kết hóa học...), là bước đệm để ôn thi.
                        </div>
                        <a href="#" class="link_detail">Xem chi tiết</a>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="img_item">
                            <img src="images/ta-co-giao-lop-6-nhung-bai-van-mau-hay.jpg" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="#">Sinh học 11</a></h4>
                        <div class="description">
                            Cung cấp những kiến thức từ vỡ lòng - là kiến thức học sinh muốn học Hóa cần phải biết (công thức tính mol, cân bằng phương trình phản ứng...) đến nền tảng cốt lõi (muốn ôn thi phải biết) (cấu tạo nguyên tử, liên kết hóa học...), là bước đệm để ôn thi.
                        </div>
                        <a href="#" class="link_detail">Xem chi tiết</a>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="img_item">
                            <img src="images/14523271-1400266116653532-1943337704040564012-n-1475230770840.jpg" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="#">Tiếng anh 11</a></h4>
                        <div class="description">
                            Cung cấp những kiến thức từ vỡ lòng - là kiến thức học sinh muốn học Hóa cần phải biết (công thức tính mol, cân bằng phương trình phản ứng...) đến nền tảng cốt lõi (muốn ôn thi phải biết) (cấu tạo nguyên tử, liên kết hóa học...), là bước đệm để ôn thi.
                        </div>
                        <a href="#" class="link_detail">Xem chi tiết</a>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="img_item">
                            <img src="images/20-11-tri-an-thay-co-2.jpg" alt="">
                        </div>
                    </a>
                    <div class="box_infor">
                        <h4><a href="#">Văn học 11</a></h4>
                        <div class="description">
                            Cung cấp những kiến thức từ vỡ lòng - là kiến thức học sinh muốn học Hóa cần phải biết (công thức tính mol, cân bằng phương trình phản ứng...) đến nền tảng cốt lõi (muốn ôn thi phải biết) (cấu tạo nguyên tử, liên kết hóa học...), là bước đệm để ôn thi.
                        </div>
                        <a href="#" class="link_detail">Xem chi tiết</a>
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


