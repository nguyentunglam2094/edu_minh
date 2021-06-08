@extends('layouts.app')
@section('title', 'Danh sách bài thi đã làm')
@section('css')

@endsection
@section('content')

<section class="dn-subject">
    <div class="container">

        <div class="row mb-2">
            <div class="col-lg-10 col-md-10">
                <h2>Danh sách bài thi đã làm</h2>
            </div>
            <!-- <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-end">
                <a href="#" class="review_all">Xem tất cả <i class="fas fa-angle-right"></i></a>
            </div> -->
        </div>
        <div class="list_subject">
            <div class="row">
                @foreach ($list as $test)
                  @if (!empty( $test->test ))
                    <div class="col-lg-3 col-md-3 mb-4">
                      <div class="item_subject">
                          <a href="{{ route('result.test', $test->id) }}" title="Click để xem chi tiết">
                            <div class="img_subject">
                                <img src="{{ asset('images/22qc7r28-1400667334.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="infor_subject">
                                <h4>{{ $test->test->title }}</h4>
                                <p>Số câu trả lời đúng: {{ $test->answer_corredt . '/' .$test->test->question_number }}</p>
                                <p>Thời gian: {{ date('d-m-Y H:i', strtotime($test->date)) }}</p>
                                {{-- <a href="{{ route('result.test', $test->test_id) }}" class="test-again"></a> --}}
                            </div>
                          </a>
                      </div>
                  </div>
                @endif
                @endforeach
            </div>
            {{-- <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    @if ($tests->currentPage() == 1)
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    @else
                    <a class="page-link" href="{{ $tests->path() . '?page='. ($tests->currentPage() - 1) }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    @endif
                  </li>
                  @for ($i = 1; $i <= $tests->lastPage(); $i++)
                    <li class="page-item"><a class="page-link" href="{{ $tests->path() . '?page='.$i }}">{{ $i }}</a></li>
                  @endfor
                  <li class="page-item">
                      @if ($tests->currentPage() == $tests->lastPage())
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                      @else
                      <a class="page-link" href="{{ $tests->path() . '?page='. ($tests->currentPage() + 1) }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                      @endif

                  </li>
                </ul>
              </nav> --}}
        </div>

    </div>
</section>


@endsection
@push('scripts')

@endpush


