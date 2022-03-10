@extends('backend.layouts.master')
@section ('title')
Thêm mới danh mục
@endsection
@section('css')
<style>
h1 {
  color:brown;

}
</style>
@endsection
@section('title')
Thêm mới danh mục
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm mới danh mục</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm mới danh mục</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')
{{-- <div class="container">
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
</div> --}}
<div class="container">
    <form action="{{ route('backend.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" class="form-control" id="" placeholder="" name="name">
        </div>
        {{-- <div class="form-group">
            <label for="">Danh mục cha</label>
            <select class="form-control" name="parent_id">
                <option value=""></option>
            </select>
        </div> --}}
        <a href="{{ route('backend.categories.index') }}" class="btn btn-danger">Hủy</a>
        <button style="margin-left:85%" type="submit" class="btn btn-primary">Tạo mới</button>
    </form>
</div>
@endsection
@section ('script')
  <script>
CKEDITOR.replace('editor1');
</script>
@endsection
