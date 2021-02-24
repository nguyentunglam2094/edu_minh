@extends('layouts.app')
@section('title', 'Đăng ký tài khoản')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
@endsection
@section('content')


<section class="dn-subject">
    <div class="container">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <h4 class="modal-title" id="exampleModalLongTitle">Đăng ký tài khoản</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('signup') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-login">

                    <div class="form-group">
                        <label>Họ và Tên<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="name" placeholder="Nhập họ và tên" value="{{ old('name') }}">
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại (Nếu có)</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại liên lạc" value="{{ old('phone') }}">
                        </div>
                        @if ($errors->has('phone'))
                            <span class="invalid">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Ngày sinh <span class="text-danger">*</span></label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" name="dob" value="{{ old('dob') }}">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        @if ($errors->has('dob'))
                            <span class="invalid">{{ $errors->first('dob') }}</span>
                        @endif
                    </div>





                    <div class="form-group">
                        <label>Email đăng nhập <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control" type="email" placeholder="Email đăng nhập" name="email" value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu <span class="text-danger">*</span></label>
                        <div class="input-group form-password" id="show_hide_password">
                            <input class="form-control" placeholder="Mật khẩu" type="password" name="password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Xác nhận mật khẩu <span class="text-danger">*</span></label>
                        <div class="input-group form-password" id="show_hide_password">
                            <input class="form-control" placeholder="Xác nhận mật khẩu" type="password" name="password_confirmation">
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary form-control">Đăng ký</button>
              </div>
            </form>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>

</script>
@endpush


