@extends('backend.layouts.master')
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="row">
      <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <button class="btn btn-primary">Tạo bài viết</button>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên bài viết</th>
                      <th>Danh mục</th>
                      <th>Người tạo</th>
                      <th>Ngày tạo</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>Iphone 13 Pro</td>
                      <td>Điện thoại</td>
                      <td>Đức Chính</td>
                      <td>28/02/2022</td>
                      <td class="project-actions text-left">
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                    </tr>
                  </tbody>
</table>
                   
    </div>
    </div>
@endsection