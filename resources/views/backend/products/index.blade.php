@extends("backend.layouts.master")
@section('content-header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <form class="col-10" action="{{ route('backend.products.filter') }}" method="get" id="form_filter">
                        <span>Sắp xếp theo</span>
                        <select style="margin-left: 10px;" name="status" class="sortby" style="border:1px solid #ced4da;">
                            <option value="-1" >-Chọn trạng thái-</option>
                            @foreach (\App\Models\Product::$status_text as $key => $value)
                                <option  value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <select style="margin-left: 10px;" name="category" class="sortby" style="border:1px solid #ced4da;">
                            <option {{ Request::get('category') == -1 || !Request::get('category') ? "'selected = selected '" : "" }} value="-1">-Chọn danh mục-</option>
                            <option  value="0">Không có danh mục</option>
                            @foreach ($categories as $category)
                                <option {{ Request::get('category') ==  $category->id ? "selected = 'selected '" : "" }}  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <select style="margin-left: 10px;" name="brand" class="sortby" style="border:1px solid #ced4da;">
                            <option {{ Request::get('brand') == -1 || !Request::get('brand') ? "'selected = selected '" : "" }} value="-1">-Chọn thương hiệu-</option>
                            <option  value="0">Không có thương hiệu</option>
                            @foreach ($brands as $brand)
                                <option {{ Request::get('brand') ==  $brand->id ? "selected = 'selected '" : "" }}  value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <button style="margin-left: 10px;" class="btn btn-primary" type="submit">Lọc</button>
                    </form> --}}
                    {{-- <div class="card-tools" >

                        <div>

                        </div>
                        <div class="input-group input-group-sm" style="width: 250px;position:relative;margin-top:-33px;">
                            <form style="display: flex" autocomplete="off" action="" method="GET">
                                @csrf
                            <input  type="text" name="keyword" id="keywords" value="{{ Request()->get('keyword') }}" class="form-control float-right" placeholder="Tìm kiếm">
                            <div id="searchajax" style="position: absolute;top:40px;"></div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                        </div>
                    </div> --}}
                </div>
                <div class="card-header">
                        <a href="{{ route('backend.products.create')}}" class="btn btn-default"> Quay lại</a>
                    </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" >
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Người tạo</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $key=>$product )
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                @if(count($product->images) > 0)
                                    <img src="{{ $product->images[0]->image_url }}"
                                    width="80px" height="50px">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->sale_price).'đ' }}</td>
                            <td>{{ $product->user->name }}</td>
                            <td>{{ $product->status_text }}</td>
                            <td>{!! date('d/m/Y', strtotime($product->created_at)) !!}</td>
                            <td>
                                <a  style="margin-right:10px;" data-target="#exampleModalCenter" data-toggle="modal" data-id="{{ $product->id }}" class="btn btn-success detail"> <i class="fas fa-eye"></i>
                                </a>
                                <a style="margin-right:10px;" href="{{ route('backend.products.edit',$product->id) }}"
                                    class="btn btn-primary "> <i class="fas fa-edit"></i>
                                </a>

                                <form style="display: inline-block" method="POST" action="{{ route('backend.products.destroy',$product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button style="" class="btn btn-danger delete-confirm"
                                    data-name="{{ $product->name }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                          </tr>
                          @endforeach



                        </tbody>


                    </table>
                    <div class="mt-3 float-right mr-5">
                        {!! $products->appends(request()->input())->links() !!}
                        {{-- ->appends(request()->input()) --}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
     $('.delete-confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Bạn có muốn xóa ${name}?`,
                text: "Nếu bạn xóa nó, bạn sẽ không thể khôi phục lại được",
                icon: "error",
                buttons: ["Không", "Xóa"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>


@endsection
