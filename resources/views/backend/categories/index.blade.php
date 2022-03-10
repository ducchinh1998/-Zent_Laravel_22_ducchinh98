@extends('backend.layouts.master')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách danh mục</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách danh mục</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
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
                  <th>Tên</th>
                  {{-- <th>Danh mục cha</th> --}}
                  <th>Thời gian tạo</th>
                  <th>Hoạt động</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $key=>$category)
              <tr>
                    <td>{{ $key+1 }}</td>
                    <td><a href="">{{ $category->name }}</a> </td>
                    <td>{!! date('d/m/Y', strtotime($category->created_at)) !!}</td>
                    <td style="display:flex;">
                        <a style="margin-right:10px;" href="{{ route('backend.categories.edit', $category->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('backend.categories.destroy', $category->id) }}">
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
