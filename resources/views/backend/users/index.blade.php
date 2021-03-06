@extends('backend.layouts.master')
@section ('title')
  Danh sách user
@endsection
@section ('css')

@endsection

@section ('content-header')
  <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Danh sách người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Danh sách người dùng</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
@endsection

@section ('content')
  <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
          {{-- Filter --}}
          <form style="margin: 20px 0" method="GET" action="{{ route('backend.users.index')}}" class="form-inline"  >
                        <div class="col-3">
                          <input value="{{ request()->get('name')}}" name="name" type="text" class="form-control" placeholder="Nhập tên cần tìm..">
                        </div>
                        <div class="col-3">
                          <input value="{{ request()->get('email')}}" name="email" type="text" class="form-control" placeholder="Nhập email cần tìm">
                        </div>

                        <div style="margin-right: 5px">
                            <button type="submit" class="btn btn-info">Lọc</button>
                          </div>
                        {{-- <div >
                            <a href="{{ route('backend.users.index')}}" class="btn btn-default"> Quay lại</a>
                        </div> --}}
                    </form>
            <div class="card">
              <div class="card-header">
                <a href="{{ route('backend.users.create') }}" class="btn btn-success"><i style="margin-right:10px" class="fas fa-plus"></i>Tạo người dùng</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Thời gian tạo</th>
                      <th>Hoạt động</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $key=>$user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td> <a href="">{{ $user->name }}</a> </td>
                      <td><img src="{{ $user->avatar }}" alt=""></td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->userInfo->address ?? 'address' }}</td>
                      <td>{{ $user->userInfo->phone ?? 'phone' }}</td>
                      <td>{!! date('d/m/Y', strtotime($user->created_at)) !!}</td>
                      <td style="display:flex;">
                          <a style="margin-right:10px;" href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                          <form method="POST" action="{{ route('backend.users.destroy', $user->id) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="mt-3 float-right mr-5">
                    {!! $users->appends(request()->input())->links() !!}
                    {{-- ->appends(request()->input()) --}}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection

@section ('script')

@endsection
