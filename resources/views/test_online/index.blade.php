@extends('layouts.app')
@section('title', 'Làm bài thi online')
@section('css')


@endsection
@section('content')

<section class="dn-subject">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-lg-10 col-md-10">
                        <h2>Danh sách đề thi</h2>
                    </div>
                </div>
                <div class="list_subject">
                    <div class="row">
                        @foreach ($tests as $test)
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="item_subject">
                                <a href="{{ route('test.online', $test->id) }}">
                                    <div class="img_subject">
                                        <img src="" alt="" class="img-fluid">
                                    </div>
                                    <div class="infor_subject">
                                        <h4>{{ $test->title }}</h4>
                                        <div class="name_subject"><span>Số lượng câu hỏi</span>: {{ $test->question_number }}<span></span></div>
                                        <div class="name_subject"><span>Thời gian làm bài</span>: {{ $test->min }}<span></span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <nav aria-label="Page navigation example">
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
                      </nav>
                </div>
            </div>
        </div>


    </div>
</section>


@endsection
@push('scripts')

@endpush


