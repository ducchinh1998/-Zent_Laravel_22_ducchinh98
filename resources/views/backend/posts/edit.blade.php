@extends('backend.layouts.master')
@section('title')
    Chỉnh sửa Users
@endsection
@section('css')
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Chỉnh sửa bài viết</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('backend.posts.update', $post->id) }}" method="POST" role="form"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="">Title</label>
                <input type="hidden" name="id" value="">
                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select class="form-control" name="status">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control select2" name="category_id">
                        <option value="0">
                            Chọn danh mục
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                @if (!empty($post->image))
                    <img id="suaanh" src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image) }}"
                        width="100px" height="100px" style="margin-top:20px">
                @else
                    <img id="suaanh" src="/frontend/images/shop/product8.jpg" width="100px" height="100px" style="margin-top:20px">
                @endif
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
                    <label for="">Tác giả</label>
                    <select class="form-control" name="user_id">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="content" class="form-control" id="editor1" cols="40" rows="10"
                        value="{{ $post->content }}"></textarea>
                </div>
                <div>
                    <a href="{{ route('backend.users.index') }}" class="btn btn-danger">Hủy</a>
                    <button style="margin-left:85%" type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
