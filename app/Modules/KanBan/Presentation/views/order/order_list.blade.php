@extends('base')
@section('title', 'List order')
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
{{--@section('header_title', 'Create order')--}}
@section('content')
    <div class="card" id="orderList">
        <div class="card-header">
            <h3 class="card-title d-inline">Order List</h3>
            <div class="d-inline float-right">
                <a class="btn btn-success" href="{{route('order.create')}}">Buat pesanan</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="orderTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->total_price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{$orders->previousPageUrl()}}">
                <div class="btn btn-outline-primary">Previous</div>
            </a>
            <a href="{{$orders->nextPageUrl()}}">
                <div class="btn btn-outline-primary">Next</div>
            </a>
        </div>
    </div>
   
@endsection

@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        var table = $('#orderTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            "order": [[1, "asc"]],
            "paging": false
        });
    </script>
@endsection
