@extends('backend.layouts.master')
@section('css')
    <style>
        h1 {
            color: brown;

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
        @if ($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
        <form action="{{ route('backend.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" class="form-control" id="" value="{{ old('title') }}"
                class="@error('title') is-invalid @enderror" placeholder="" name="title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="category_id">
                    <option value="0">
                        Chọn danh mục
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <select multiple="" name="tags[]" class="form-control">
                    <option value="0">
                        Chọn Tags
                    </option>
                    @foreach ($tags as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="content" class="form-control" id="editor1" cols="40" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Tải lên ảnh</label>
                <div class="input-group">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id='anh'>
                <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                </div>
                <div class="input-group-append">
                <span class="input-group-text">Tải lên</span>
                </div>
                </div>
              </div>
            <a href="{{ route('backend.posts.index') }}" class="btn btn-danger">Hủy</a>
            <button style="margin-left:85%" type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>
@endsection
@section ('script')
  <script>
CKEDITOR.replace('editor1');
</script>
@endsection

