@extends('master')
@section('content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách đại lý
            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <a href="{{route('agency.create')}}"><button class="btn btn-primary">Thêm đại lý</button></a>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <form method="post" action="{{route('agency.search')}}" class="form-group">
                            @csrf
                            <input type="text" class="input-sm form-control " placeholder="Search" name="keyWord" value="{{old('keyWord')}}">
                            <span class="input-group-btn">
                             <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
                        </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Mã số đại lý</th>
                        <th>Tên đại lý</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Đại chỉ</th>
                        <th>Tên người quản lý</th>
                        <th>Trạng thái</th>
                        <th style="width:30px;">Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($agencies) === 0)
                        <tr>
                            <td colspan="4">Không có dữ liệu</td>
                        </tr>
                    @else
                        @foreach($agencies as $key => $agency)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$agency->name}}</td>
                                <td>{{$agency->phone}}</td>
                                <td>{{$agency->email}}</td>
                                <td>{{$agency->address}}</td>
                                <td>{{$agency->owner_name}}</td>
                                <td>
                                    @if ($agency->status === 1)
                                        <p>Hoạt động</p>
                                    @else
                                        <p>Ngừng hoạt động</p>
                                    @endif
                                </td>
                                <td>
                                    <a class="fa fa-pencil-square-o text-success text-active"
                                       href="{{route('agency.edit', $agency->id)}}">Sửa</a>
                                    <a href="{{route('agency.destroy', $agency->id)}}"
                                       class="fa fa-trash text-danger text" onclick="return confirm('Are you sure to delete?')">Xóa</a>
                                </td>
                            </tr>
                        @endforeach

                    @endif
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                </div>
            </footer>
        </div>
    </div>

@endsection
