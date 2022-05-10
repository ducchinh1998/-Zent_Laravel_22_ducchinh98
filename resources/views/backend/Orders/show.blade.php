@extends("backend.layouts.master")
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-3 text-dark">Chi tiết đơn hàng</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.orders.index') }}">Đơn hàng</a></li>
                <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@endsection
@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="container">
        <div class="main-body">

              <!-- Breadcrumb -->
              <!-- /Breadcrumb -->

              <div class="row gutters-sm">
                <div class="col-md-4">
                  <div class="card mb-3">
                    <div class="card-body">
                        <button href="#" class="btn btn-primary" style="margin-bottom: 20px" type="button"  >Thông tin khách hàng</button>
                      <div class="row">
                        <div class="col-sm-3">

                          <h6 class="mb-0">Họ và tên</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{ $orderstt->name }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                         {{ $orderstt->user->email }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{ $orderstt->phone }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Địa chỉ</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{ $orderstt->address }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <h6 class="mb-2">Ghi chú</h6>
                        </div>
                        <div class="form-outline mb-4">
                            <textarea disabled class="form-control" id="form4Example3" rows="4">{{ $orderstt->note }}</textarea>
                          </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><button  class="btn btn-primary">Chi tiết đơn hàng</button></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="product">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr class="bg-primary">
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderstt->products as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td><img style="width: 40px;" src="{{ $item->images[0]->image_url  }}" alt=""></td>
                                                    <td>{{ $item->pivot->quantity }}</td>
                                                    <td>{{ number_format($item->pivot->price) }} đ</td>
                                                    <td>
                                                        {{ number_format($item->pivot->price * $item->pivot->quantity) }}đ
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>

                                        <div class="row">
                                          <div class="col-6">
                                            @if ($orderstt->status == 0)
                                            <span style="background-color: rgb(247, 65, 65);padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                                Chưa xử lý<i class="fas fa-spinner" style="margin-left: 5px;"></i>
                                            </span>
                                        @elseif($orderstt->status ==1)
                                            <span style="background-color: rgb(28, 49, 243);padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                                Đã xác nhận<i class="fas fa-thumbs-up" style="margin-left: 5px;"></i>
                                            </span>
                                        @elseif($orderstt->status ==2)
                                            <span  style="background-color: yellow;padding: 5px 10px;color:rgb(19, 95, 209);font-weight: bold;border-radius: 10px">
                                                Đang giao hàng<i class="fas fa-motorcycle" style="margin-left: 5px;"></i>
                                            </span>
                                        @else
                                            <span style="background-color:green;padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                                Đã hoàn thành <i class="fas fa-check-circle" style="margin-left: 5px;"></i>
                                            </span>
                                        @endif
                                          </div>
                                            <div class="col-6" style="text-align: right">
                                                <p >
                                                    <b class="text-primary">Tổng tiền:</b> <b>{{ number_format($orderstt->total) }} đ<span style="color: red;font-weight: bold">(Thuế 10%)</span></b>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                    {{--                                    <div class="d-flex justify-content-center">{!! $products->appends(request()->input())->links() !!}</div>--}}
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>

            </div>
        </div>
        </div>
    </div>
</div>

</div>
@endsection
