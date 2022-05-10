@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chỉnh sửa sản phẩm</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
          <li class="breadcrumb-item active">chỉnh sửa sản phẩm</li>
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

                <form role="form" method="post" action="{{route('backend.products.update',$product->id)}}" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Tên sản phẩm" value="{{ $product->name }}">
                            @error('name')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input name="quantity" type="text" class="form-control" id="" placeholder="Số lượng" value="{{ $product->quantity }}" >
                            @error('quantity')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group  col-6">
                                <label for="exampleInputEmail1">Giá gốc</label>
                                <input name="origin_price" type="text" class="form-control" id="" placeholder="Giá gốc" value="{{ $product->origin_price }}">
                                @error('origin_price')
                                <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Giá bán</label>
                                <input name="sale_price" type="text" class="form-control" id="" placeholder="Giá bán" value="{{ $product->sale_price }}" >
                                @error('sale_price')
                                <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea  cols="30" rows="10" class="textarea" name="content" placeholder=""
                                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $product->content }}</textarea>

                              @error('content')
                                <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span>
                              @enderror
                        </div>

                        <div class="col-sm-12">
                          <!-- Select multiple-->
                          <div class="form-group">
                            <label>Thương hiệu sản phẩm</label>
                            <select data-live-search="true" id="brand"  class="form-control" name="brand_id" >
                                <option selected disabled hidden>--Chọn thương hiệu--</option>
                              @foreach ($brands as $brand )
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <!-- Select multiple-->
                          <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select data-live-search="true" id="category"  class="form-control" name="category_product">
                                <option selected disabled hidden>--Chọn danh mục--</option>
                              @foreach ($category_products as $category_product )
                                <option value="{{ $category_product->id }}">{{ $category_product->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- Select multiple-->
                            <div class="form-group">
                              <label>Trạng thái sản phẩm</label>
                              <select data-live-search="true" id="status"  class="form-control" name="status" >
                                @foreach ( App\Models\Product::$status_text as $key => $value )
                                  <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                      <div class="form-group">
                        <label for="exampleInputFile">Tải lên ảnh</label>
                        <div class="input-group">
                        <div class="custom-file">
                        <input multiple type="file" class="custom-file-input" name="image[]" id='anh'>
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                        </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputFile">Xóa hình ảnh sản phẩm</label>
                        <div style="display:flex;flex:wrap;flex-direction:row;">
                            @foreach ($product->images as $image)
                                <div>
                                <img style="width:150px;height:150px" src="{{ $image->image_url }}" alt="">
                                <div  class="d-flex justify-content-center mt-2">
                                    <input  type="checkbox" name="delimg[]" value="{{ $image->id }}" multiple>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                      <div class="gallery mt-5" style="display: flex; flex-wrap: wrap;"></div>
                      @error('image')
                          <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span>
                       @enderror


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('backend.products.index') }}" type="reset" class="btn btn-default">Huỷ bỏ</a>
                        <button type="submit" class="btn btn-success mt-3 float-right mr-6">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<script>
  function previewImages()
{
    var gallery = document.querySelector('.gallery');
    if(this.files)
    {
        [].forEach.call(this.files, readAndPreview);
    }
    function readAndPreview(file)
    {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name))
        {
            return alert(file.name + " is not an image");
        }
        var reader = new FileReader();
        reader.addEventListener("load", function() {
          var image = new Image();
          image.width = 150;
          image.height = 150;
          image.title  = file.name;
          image.src = this.result;
          gallery.appendChild(image);
        });
        reader.readAsDataURL(file);
    }

}

  document.querySelector('#anh').addEventListener("change", previewImages);
</script>

@endsection
