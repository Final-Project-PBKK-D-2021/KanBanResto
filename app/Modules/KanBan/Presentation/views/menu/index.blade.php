@extends('base')

@section('title')
    Menu List
@endsection

@section('header_title')
    Menu List
@endsection

@section('header_right')
    <a href="{{ route('owner.withBusiness.menu.create', ['business_id' => request()->route('business_id')]) }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>
@endsection

@section('content')
    <div class="card" id="menuList">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="menuTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->description}}</td>
                        <td>
                            @foreach($menu->products as $product)
                                Nama : {{$product->name}} |  Harga : {{$product->price}} | Deskripsi : {{$product->description}} | Tag : {{$product->badge}}<br><br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('owner.withBusiness.menu.edit', ['business_id' => request()->route('business_id'), 'menu_id' => $menu->id])}}">
                                <div class="btn btn-outline-primary">Edit</div>
                            </a>
                            <a href="{{route('owner.withBusiness.menu.qrcode', ['business_id' => request()->route('business_id'), 'menu_id' => $menu->id])}}">
                                <div class="btn btn-outline-info">QR Code</div>
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
        var table = $('#menuTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            "lengthChange": false,
            "order": [[0, "asc"]]
        });
    </script>
@endsection
