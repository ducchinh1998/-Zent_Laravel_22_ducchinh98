@extends('backend.layouts.master')
@section ('title')
  Danh sách bài viết
@endsection
@section ('css')

@endsection

@section ('content-header')
  <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Danh sách bài viết</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Danh sách bài viết</li>
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
          <form style="margin: 20px 0" method="GET" action="{{ route('backend.posts.index')}}" class="form-inline"  >
            <div class="col-3">
              <input value="{{ request()->get('title')}}" name="title" type="text" class="form-control" placeholder="Nhập tiêu đề cần tìm..">
            </div>
            <div class="col-3">
              <input value="{{ request()->get('status')}}" name="status" type="text" class="form-control" placeholder="Trạng thái....">
            </div>

            <div style="margin-right: 5px">
                <button type="submit" class="btn btn-info">Lọc</button>
              </div>
            {{-- <div >
                <a href="{{ route('backend.posts.index')}}" class="btn btn-default"> Quay lại</a>
            </div> --}}
        </form>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách</h3>

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
                      <th>Tiêu đề</th>
                      <th>Ảnh</th>
                      <th>Danh mục</th>
                      <th>Tác giả</th>
                      <th>Trạng thái</th>
                      <th>Lượt xem</th>
                      <th>Thời gian tạo</th>
                      <th>Ngày cập nhật</th>
                      <th>Hoạt động</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $key=>$post)
                  <tr>
                        <td>{{ $post->id }}</td>
                        <td> <a href="">{{ $post->title }}</a> </td>
                        <td>
                            {{-- <img src="assets/backend/uploads/" width="100%" height="100px" style="border-radius: 5px; object-fit: cover;"> --}}
                        </td>
                        <td>{{ $post->category_id }}</td>
                        <td> {{ $post->user_created_id }} </td>
                        <td></td>
                        <td> {{ $post->status }} </td>
                        <td>{!! date('d/m/Y', strtotime($post->created_at)) !!}</td>
                        <td>{!! date('d/m/Y', strtotime($post->updated_at)) !!}</td>
                        <td></td>
                        <td style="display:flex;">
                            <a style="margin-right:10px;" href="{{ route('backend.posts.edit', $post->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('backend.posts.destroy', $post->id) }}">
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
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection
