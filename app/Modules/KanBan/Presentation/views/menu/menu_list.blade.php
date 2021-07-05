@extends('base-out-alternatif')

@section('title')
    Menu List
@endsection

@section('header_title')
    Menu List
@endsection

@section('content')
<div class="card mg-t-40 mg-lg-t-60 mg-md-t-40 mg-sm-t-40" id="menuList">
        <div class="card-header">
            <div class="row row-xs">
                <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
                    <div>
                    <h5 class="tx-medium tx-montserrat mg-b-5">Menu List</h5>
                    <p class="card-text">Choose the menu that you want to order</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="menuTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->description}}</td>
                        <td>
                            <a href="{{route('show', ['menu_id' => $menu->id])}}">
                                <div class="btn btn-outline-primary">Show</div>
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
            "order": [[0, "asc"]],
            lengthChange: false
        });
    </script>
@endsection
