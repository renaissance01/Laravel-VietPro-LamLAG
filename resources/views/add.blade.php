@extends('master.master')

@section('title', 'Thêm thành viên')

@section('content')
    <article class="content dashboard-page">
            <div class="col-md-12">
                    <div class="card card-block sameheight-item" style="height: 750px;">
                        <div class="title-block">
                            <h3 class="title"> THÊM THÀNH VIÊN</h3>
                            <hr>
                        </div>
                        <form method="POST">
                            <!--Lỗi 419 bảo mật-->
                            <!--old(): giữ nguyên giá trị khi back, chỉ sử dụng với validate và form request-->
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Họ Và Tên</label>
                                <input name="full" type="text" class="form-control underlined" value="{{ old('full') }}"> </div>
                                {{ showError($errors, 'full') }}
                            <div class="form-group">
                                <label class="control-label">Số điện thoại</label>
                                <input name="phone" type="text" class="form-control underlined" value="{{ old('phone') }}"> </div>
                                {{ showError($errors, 'phone') }}
                            <div class="form-group">
                                <label class="control-label">Địa chỉ</label>
                                <input name="address" type="text" class="form-control underlined" value="{{ old('address') }}"> </div>
                                {{ showError($errors, 'address') }}
                            <div class="form-group">
                                <label class="control-label">Số CMT</label>
                                <input name="id_number" type="text" class="form-control underlined" value="{{ old('id_number') }}"> </div> 
                                {{ showError($errors, 'id_number') }}
                            <div align='right'>
                                    <button type="submit" class="btn btn-success">Thêm</button>
                                    <button class="btn btn-secondary" type="reset" >Nhập lại</button>
                            </div>
                        </form>
                    </div>
                </div>

    </article>
@endsection