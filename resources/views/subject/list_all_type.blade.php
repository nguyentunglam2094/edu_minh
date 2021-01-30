@extends('layouts.app')
@section('title', 'Tất cả dạng bài tập')
@section('css')

@endsection
@section('content')

<section class="dn-subject">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Các dạng bài tập</h2>
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

@endpush


