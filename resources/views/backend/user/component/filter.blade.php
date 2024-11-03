<form action="{{route('user.index')}}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
                @php
                    $perpage = request('perpage') ? : old('perpage');
                @endphp   
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <select name="perpage" class="form-control input-sm perpage filter mr10" id="">
                        @for($i=10;$i<=200;$i+=10)
                        <option value="{{$i}}">{{$i}} bản ghi</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    <select name="user_catalogue_id" class="form-control mr10 setupSelect2" id="">
                        <option value="" selected="selected">Chọn nhóm thành viên</option>
                        <option value="1">Quản trị viên</option>
                    </select>
    
                    <div class="uk-search uk-flex uk-flex-middle mr10 ml10">
                        <div class="input-group ">
                            <input 
                                type="text"
                                name="keyword"
                                value="{{request('keyword') ? : old('keyword')}}"
                                placeholder="Nhập từ khoá tìm kiếm"
                                class="form-control"
                                >
                                <span class="input-group-btn">
                                    <button type="submit" name="search" value="search"
                                    class="btn btn-primary mb0 btn-sm">Tìm kiếm
                                </button>
                                </span>
                        </div>
                    </div>
                    {{-- Thêm mới Thành viên --}}
                    <a href="{{route('user.create')}}" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm mới thành viên</a>
                </div>
            </div>
        </div>
    </div>
</form>