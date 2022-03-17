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
        <form action="{{ route('backend.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" class="form-control" id="" placeholder="" name="title">

            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" id="image_url" name="image_url">
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
            <a href="{{ route('backend.posts.index') }}" class="btn btn-danger">Hủy</a>
            <button style="margin-left:85%" type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>
@endsection
