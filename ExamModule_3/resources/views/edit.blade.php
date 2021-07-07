@extends('master')
@section('content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa đại lý
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" method="post" action="{{route('agency.update', $agency->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name-product">Tên đại lý</label>
                            <input type="text" id="name-product" name="name" class="form-control"
                                   placeholder="Tên đại lý" value="{{$agency->name}}">
                            @error('name')
                            <small class="text-danger">{{$message}}*</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="number" name="phone" required placeholder="Phone" class="form-control" value="{{$agency->phone}}">
                            @error('phone')
                            <small class="text-danger">{{$message}}*</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required placeholder="Email" class="form-control" value="{{$agency->email}}">
                            @error('email')
                            <small class="text-danger">{{$message}}*</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" id="" name="address" class="form-control"
                                   placeholder="Địa chỉ" value="{{$agency->address}}" >
                            @error('address')
                            <small class="text-danger">{{$message}}*</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tên người quản lý</label>
                            <input type="text" id="" name="owner_name" class="form-control"
                                   placeholder="Tên người quản lý" value="{{$agency->owner_name}}" >
                            @error('owner_name')
                            <small class="text-danger">{{$message}}*</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control input-sm m-bot15" name="status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Ngừng hoạt động</option>
                            </select>
                            @error('status')
                            <small class="text-danger">{{$message}}*</small>
                            @enderror
                        </div>

                        <button type="submit" name="add-product" class="btn btn-info">Sửa</button>
                        <a href="{{route('agency.index')}}"><button type="button" name="update-product" class="btn btn-danger">Hủy</button></a>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
