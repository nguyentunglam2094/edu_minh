@extends('layouts.app')
@section('title', 'Chỉnh sửa thông tin cá nhân')
@section('css')

@endsection
@section('content')

<section class="dn-subject">
    <div class="container">
        <div class="modal-header justify-content-center">
            <h4 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin cá nhân</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-3">
                <div class="avatar-wrapper">
                    <img class="profile-pic" src="{{ !empty($user->avatar) ? asset($user->avatar) : asset('images/no-avatar-7.png') }}" />
                    <div class="upload-button">
                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                    </div>
                    <input class="file-upload" type="file" name="image" accept="image/*"/>
                </div>
                <span class="text-danger" id="error-image" style="display:none;"></span>
                    @if ($errors->has('image'))
                        <span class="invalid error-image">{{ $errors->first('image') }}</span>
                    @endif
            </div>
            <div class="col-9">
                    <div class="modal-body">
                        <div class="form-login">

                        <div class="form-group">
                            <label>Họ và Tên<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="name" placeholder="Nhập họ và tên" value="{{ $user->name }}">
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại liên lạc" value="{{ $user->phone }}">
                            </div>
                            @if ($errors->has('phone'))
                                <span class="invalid">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ" value="{{ $user->address }}">
                            </div>
                            @if ($errors->has('address'))
                                <span class="invalid">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <p class="mb-0">Bạn muốn thay đổi mật khẩu? <a href="{{ route('change.pass.view') }}" class="text-danger">Đổi mật khẩu</a></p>

                    </div>
                    </div>
                    <div class="justify-content-center">
                        <button type="submit" class="btn btn-primary form-control" style="width: 50%;">Cập nhập</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
@push('scripts')
<script>
    function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
			  	$('.profile-pic').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
    $(document).ready(function() {

        $('.file-upload').on('change', function() {
    		var a = 1;
			var ext = $(this).val().split('.').pop().toLowerCase();
			var picsize = (this.files[0].size);
			if (picsize > 0) {
				if ($.inArray(ext, ['gif','png','jpg','jpeg','svg']) == -1){
					$('#error-image').html('The image is not in the correct format');
				 	$('#error-image').slideDown("slow");
				 	$('.error-image').hide();
				 	$("#image").val("");
				 	a=0;
				}
				if (picsize > 50000000){
			 		$('#error-image').html('Photos cannot be larger than 5Mb');
			 		$('#error-image').slideDown("slow");
			 		$('.error-image').hide();
			 		$("#image").val("");
			 		a=0;
			 	}
			 	if (a==1){
                    $('.error-image').hide();
			 		$('#error-image').slideUp("slow");
					readURL(this);
					$('.preview-image').show();
			 	}
			}
		});

        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });
</script>
@endpush


