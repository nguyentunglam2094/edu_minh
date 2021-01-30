@extends('layouts.app')
@section('title', 'Đổi mật khẩu')
@section('css')

@endsection
@section('content')

<section class="dn-subject">
    <div class="container">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <h4 class="modal-title" id="exampleModalLongTitle">Đổi mật khẩu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('change.password') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-login">
                        <div class="form-group">
                            <label>Mật khẩu cũ<span class="text-danger">*</span></label>
                            <div class="input-group form-password" id="show_hide_password">
                                <input class="form-control" placeholder="Mật khẩu cũ" type="password" name="old_password">
                            </div>
                            @if ($errors->has('old_password'))
                                <span class="invalid">{{ $errors->first('old_password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu mới<span class="text-danger">*</span></label>
                            <div class="input-group form-password" id="show_hide_password">
                                <input class="form-control" placeholder="Mật khẩu mới" type="password" name="password">
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
                    <button type="submit" class="btn btn-primary form-control">Đổi mật khẩu</button>
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


