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
              <form action="{{ route('confirm.email') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if(empty(Session::get('status')) && empty($status))
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
                    </div>
                    @else
                    <span class="text-success"><strong> Truy cập email để lấy lại mật khẩu</strong></span>
                    @endif
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary form-control">Quên mật khẩu</button>
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


