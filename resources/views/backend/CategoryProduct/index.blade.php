@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách danh mục sản phẩm</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh sách danh mục sản phẩm</li>
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
          <a href="{{ route('backend.categoryproducts.create') }}" class="btn btn-success"><i style="margin-right:10px" class="fas fa-plus"></i>Tạo danh mục sản phẩm</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">

          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>STT</th>
                <th>Danh mục sản phẩm</th>
                <th>Thời gian tạo</th>
                <th>Ngày cập nhật</th>
                <th class="text-center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $categoryproducts as $key=>$categoryproduct )
              <tr>
                <td>{{ $key+1 }}</td>
                <td> {{ $categoryproduct->name }}</td>
                <td>{!! date('d/m/Y', strtotime($categoryproduct->created_at)) !!}</td>
                <td>{!! date('d/m/Y', strtotime($categoryproduct->updated_at)) !!}</td>
                <td class="text-center">
                  <a  style="margin-right:10px;" href="{{route('backend.categoryproducts.edit', $categoryproduct->id)}}" class="btn btn-primary "><i class="fas fa-edit"></i> </a>
                  <form style="display: inline-block" method="POST" action="{{route('backend.categoryproducts.destroy',$categoryproduct->id)}}">
                    @csrf
                    @method('DELETE')
                    <button style="" class="btn btn-danger delete-confirm" data-name="{{ $categoryproduct->name }}">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>

                </td>


              </tr>
              @endforeach



            </tbody>
          </table>
          <div class="mt-3 float-right mr-5">
            {!! $categoryproducts->appends(request()->input())->links() !!}
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
    var showstatus = document.getElementsByClassName('showstatus');
            console.log(showstatus)
            var formshow = document.getElementsByClassName('formshow');

            //console.log(formshow)
            for(let i=0;i< showstatus.length;i++){
                showstatus[i].addEventListener('click',function(){
                    formshow[i].submit();
                })
            }
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
