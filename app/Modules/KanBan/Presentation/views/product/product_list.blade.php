@extends('base')
@section('title', 'List product')
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
{{--@section('header_title', 'Create product')--}}
@section('content')
    <div class="card" id="productList">
        <div class="card-header">
            <h3 class="card-title d-inline">Product List</h3>
            <div class="d-inline float-right">
                <a class="btn btn-success" href="{{route('owner.withBusiness.product.create', ['business_id' => request()->route('business_id')]) }}">Tambah produk!</a>
            </div>
        </div>
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
                            <a onclick="document.getElementById('{{$product->id}}confirm').style.display='block';
                                document.getElementById('productList').style.display='none'">
                                <div class="btn btn-outline-danger">Delete</div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach($products as $product)
        <div id="{{$product->id}}confirm" class="delete-confirmation">
            <form class="content" action="{{route('owner.withBusiness.product.delete',['business_id' => request()->route('business_id'), 'product_id' =>$product->id])}}"
                  method="post">
                @csrf
                <div class="container">
                    <h1>Delete Post</h1>
                    <p>Are you sure you want to delete this post?</p>
                    <div class="clearfix">
                        <button type="button"
                                onclick="document.getElementById('{{$product->id}}confirm').style.display='none';
                                    document.getElementById('productList').style.display='block'"
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
    <script src="{{asset('plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap5.min.js')}}"></script>
    <script>
        var table = $('#productTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            "order": [[1, "asc"]]
        });
    </script>
@endsection
