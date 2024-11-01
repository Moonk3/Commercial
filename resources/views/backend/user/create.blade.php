@include('backend.dashboard.component.breakcrumb',['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('user.store')}}" method="POST" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của người dùng</p>
                        <p>Lưu ý: Những hợp đáng dầu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="email"
                                            value="{{old('email')}}"
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ tên
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="name"
                                            value="{{old('name')}}"
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                        </div>
                        @php
                            $userCatalouge = [
                                '[Chọn nhóm thành viên]',
                                'Quản trị viên',
                                'Cộng tác viên'
                    ];
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhóm thành viên
                                    <span class="text-danger">(*)</span>
                                    </label>
                                  <select name="user_catalogue_id" class="form-control setupSelect2" id="">
                                    @foreach($userCatalouge as $key=> $item)
                                    <option @if(old('user_catalogue_id') == $key) selected
                                        @endif  value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="date"
                                            name="birthday"
                                            value="{{old('birthday')}}"
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Mật khẩu
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password"
                                            name="password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhập lại mật khẩu
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password"
                                            name="re_password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Avatar
                                    </label>
                                    <input type="text"
                                            name="image"
                                            value="{{old('image')}}"
                                            class="form-control input-image"
                                            placeholder=""
                                            outocomplete="off"
                                            data-upload="Images"
                                            >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ của người dùng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Thành phố
                                    </label>
                                    <select name="provice_id" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="0">[Chọn thành phố]</option>
                                        @if(@isset($provinces))
                                            @foreach($provinces as $province)                              
                                            <option @if(old('province_id') == $province->code) selected
                                            @endif value="{{$province->code}}">{{
                                            $province->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Quận/Huyện
                                    </label>
                                    <select name="district_id" class="form-control setupSelect2 districts location" data-target="wards">
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Phường/Xã
                                    </label>
                                    <select name="ward_id" class="form-control setupSelect2 wards" >
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ
                                    </label>
                                    <input type="text"
                                            name="address"
                                            value="{{old('address')}}"
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Số điện thoại
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="phone"
                                            value="{{old('phone')}}"
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi chú
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="description"
                                            value="{{old('description')}}"
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu</button>
        </div>
    </div>
</form>

<script>
    var province_id = '{{old('province_id')}}'
    var district_id = '{{old('district_id')}}'
    var ward_id = '{{old('ward_id')}}'
</script>