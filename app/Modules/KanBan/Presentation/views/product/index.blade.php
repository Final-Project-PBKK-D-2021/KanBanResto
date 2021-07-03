@extends('base')

@section('title')
    Product List
@endsection

@section('header_title')
    Product List
@endsection

@section('header_right')
    <a href="{{route('owner.withBusiness.product.create', ['business_id' => request()->route('business_id')]) }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>
@endsection

@section('content')
    <div class="card" id="productList">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="productTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Badge</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->badge}}</td>
                        <td>
                            <a href="{{route('owner.withBusiness.product.edit', ['business_id' => request()->route('business_id'), 'product_id' => $product->id])}}">
                                <div class="btn btn-outline-primary">Edit</div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap5.min.js')}}"></script>
    <script>
        var table = $('#productTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            lengthChange: false,
            "order": [[0, "asc"]]
        });
    </script>
@endsection
