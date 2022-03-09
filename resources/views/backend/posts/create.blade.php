
@extends('backend.layouts.master')
@section('css')
<style>
h1 {
  color:brown;

}
</style>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
@endsection
@section('title')
Tạo mới bài viết
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tạo mới bài viết</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tạo mới bài viết</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 md-2">
            <div class="card-body">
                <form method=”POST” action="">
                    @csrf
                    <div>
                        <textarea name="editor1"></textarea>
                    </div>
                    <button type=”submit” class="btn btn-success btn-sm mt-2">Lưu</button>
                    <button type=”submit” class="btn btn-danger btn-sm mt-2">Hủy</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
CKEDITOR.replace('editor1');
</script>
@endsection
