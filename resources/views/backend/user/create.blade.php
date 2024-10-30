@include('backend.dashboard.component.breakcrumb',['title' => $config['seo']['create']['title']])

<form action="" method="" class="box">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Nhập thông tin chung của người dùng</div>
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
                                            value=""
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
                                            value=""
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
                                    <label for="" class="control-label text-right">Nhóm thành viên
                                    <span class="text-danger">(*)</span>
                                    </label>
                                  <select name="user_catalogue_id" class="form-control" id="">
                                    <option value="0">[Chọn nhóm thành viên]</option>
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">Cộng tác viên</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="birthday"
                                            value=""
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
                                            value=""
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
                                    <label for="" class="control-label text-right">Email
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="email"
                                            value=""
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
                                            value=""
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
                                    <label for="" class="control-label text-right">Nhóm thành viên
                                    <span class="text-danger">(*)</span>
                                    </label>
                                  <select name="user_catalogue_id" class="form-control" id="">
                                    <option value="0">[Chọn nhóm thành viên]</option>
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">Cộng tác viên</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="birthday"
                                            value=""
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
                                            value=""
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
    </div>
</form>