@extends('layouts.app')
@section('title', 'Quên mật khẩu')
@section('css')

@endsection
@section('content')


<section class="dn-subject">
    <div class="container">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <h4 class="modal-title" id="exampleModalLongTitle">Quên mật khẩu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('reset.password') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="modal-body">
                    <div class="form-login">
                        <div class="form-group">
                            <label>Tài khoản <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" type="email" name="email" placeholder="Nhập email đăng nhập" readonly value="{{ $email }}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" required type="password" name="password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Xác nhận mật khẩu <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" required type="password" name="password_confirmation">
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                    </div>

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary form-control">Xác nhận</button>
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


