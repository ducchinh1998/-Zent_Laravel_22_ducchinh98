@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chỉnh sửa danh mục sản phẩm</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Chỉnh sửa danh mục sản phẩm</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Content Header -->

<!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">

                <!-- /.card-header -->
                <!-- form start -->

                {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif --}}

                <form role="form" method="post" action="{{route('backend.categoryproducts.update',$categoryproduct->id)}}">
                  @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Danh mục sản phẩm" value="{{ $categoryproduct->name }}">

                            @error('name')
                              <div style="margin-top:20px;" class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="reset" class="btn btn-default">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-success mt-3 float-right mr-6">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection
