@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('css')

@endsection
@section('content')


<section class="dn-subject">
    <div class="container">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <h4 class="modal-title" id="exampleModalLongTitle">Đăng nhập</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('post.login') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-login">
                    <div class="form-group">
                        <label>Tài khoản <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control" type="email" name="email" placeholder="Nhập email đăng nhập" value="{{ old('email') }}">

                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <div class="input-group form-password" id="show_hide_password">
                        <input class="form-control" type="password" placeholder="Nhập mật khẩu" name="password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary form-control">Đăng nhập</button>
                <p class="mb-0">Bạn chưa có tài khoản? <a href="{{ route('signup.view') }}" class="text-danger">Đăng ký</a></p>
              </div>
            </form>
            </div>
          </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
</script>
@endpush


