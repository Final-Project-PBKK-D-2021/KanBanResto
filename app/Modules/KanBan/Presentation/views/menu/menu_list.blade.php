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
@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <style>
        .delete-confirmation {
            display: none;
            z-index: 0;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            padding-top: 50px;
        }

        .delete-confirmation button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .delete-confirmation button:hover {
            opacity: 1;
        }

        .delete-confirmation .cancelbtn,
        .delete-confirmation .deletebtn {
            float: left;
            width: 50%;
        }

        .delete-confirmation .cancelbtn {
            background-color: #ccc;
            color: black;
        }

        .delete-confirmation .deletebtn {
            background-color: #f44336;
        }

        .delete-confirmation .container {
            padding: 16px;
            text-align: center;
        }

        .delete-confirmation .content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
            width: 80%;
        }

        .delete-confirmation hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .delete-confirmation .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
        }

        .delete-confirmation .close:hover,
        .delete-confirmation .close:focus {
            color: #f44336;
            cursor: pointer;
        }

        .delete-confirmation .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
@endsection
{{--@section('header_title', 'Create Menu')--}}
@section('content')
    <div class="card" id="menuList">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="menuTable" class="table">
                <thead>
                <tr>
                    <th>Menu Name</th>
                    <th>Menu Description</th>
                    <th>Actions</th>
                    <th>Product 1</th>
                    <th>Product 2</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->description}}</td>
                        <td>
                            <a href="{{route('owner.withBusiness.menu.edit', ['business_id' => request()->route('business_id'), 'menu_id' => $menu->id])}}">
                                <div class="btn btn-outline-primary">Edit</div>
                            </a>
                            <a onclick="document.getElementById('{{$menu->id}}confirm').style.display='block';
                                document.getElementById('menuList').style.display='none'">
                                <div class="btn btn-outline-danger">Delete</div>
                            </a>
                            <a href="{{route('owner.withBusiness.menu.qrcode', ['business_id' => request()->route('business_id'), 'menu_id' => $menu->id])}}">
                                <div class="btn btn-outline-info">Show QR Code</div>
                            </a>
                        </td>
                        @foreach($menu->products as $product)
                        <td>{{$product}}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{$menus->previousPageUrl()}}">
                <div class="btn btn-outline-primary">Previous</div>
            </a>
            <a href="{{$menus->nextPageUrl()}}">
                <div class="btn btn-outline-primary">Next</div>
            </a>
        </div>
    </div>
    @foreach($menus as $menu)
        <div id="{{$menu->id}}confirm" class="delete-confirmation">
            <form class="content" action="{{route('owner.withBusiness.menu.delete',['business_id' => request()->route('business_id'), 'menu_id' =>$menu->id])}}"
                  method="post">
                @csrf
                <div class="container">
                    <h1>Delete Post</h1>
                    <p>Are you sure you want to delete this post?</p>
                    <div class="clearfix">
                        <button type="button"
                                onclick="document.getElementById('{{$menu->id}}confirm').style.display='none';
                                    document.getElementById('menuList').style.display='block'"
                                class="cancelbtn">
                            Cancel
                        </button>
                        <button type="submit" class="deletebtn">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        var table = $('#menuTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            "order": [[1, "asc"]],
            "paging": false
        });
    </script>
@endsection
