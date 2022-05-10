@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tạo mới danh mục sản phẩm</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Tạo mới danh mục sản phẩm</li>
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
                @endif
                 --}}
                <form role="form" method="post" action="{{route('backend.categoryproducts.store')}}">
                  @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm </label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Danh mục sản phẩm">

                            @error('name')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px; margin-top:10px; "> {{ $message }} </span>
                            @enderror
                        </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('backend.categoryproducts.index') }}" type="reset" class="btn btn-default">Huỷ bỏ</a>
                        <button type="submit" class="btn btn-success mt-3 float-right mr-6">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection
