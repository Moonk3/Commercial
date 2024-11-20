@include('backend.dashboard.component.breakcrumb',['title' => $config['seo']['create']['title']])

<form action="{{route('user.catalogue.destroy',$userCatalogue->id)}}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn đang muốn xoá nhóm có tên  là: {{$userCatalogue->name}}</p>
                        <p>Lưu ý: Không thể khôi phục tài khoản sau khi xoá</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên nhóm
                                    <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                            name="name"
                                            value="{{old('name', ($userCatalogue->name) ?? '' )}}"
                                            class="form-control"
                                            placeholder=""
                                            outocomplete="off"
                                            readonly
                                            >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-right mb15">
            <button class="btn btn-danger" type="submit" name="send" value="send">Xoá dữ liệu</button>
        </div>
    </div>
</form>