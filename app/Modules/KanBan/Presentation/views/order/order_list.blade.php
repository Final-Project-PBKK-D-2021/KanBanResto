@extends('base')

@section('title')
    Order List
@endsection

@section('header_title')
    Order List
@endsection

@section('header_right')
    <a href="{{route('staff.order.create')}}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>
@endsection

@section('content')
    <div class="card" id="orderList">
        <div class="card-body">
            <table id="orderTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>
                            <ul>
                            @foreach($order->products as $product)
                                <li>{{$product->name}} ({{$product->pivot->jumlah}})</li>
                            @endforeach
                            </ul>
                        </td>
                        <td>{{$order->total_price}}</td>
                        <td>
                            <a data-id="{{$order->id}}" data-toggle="modal" data-animation="effect-scale" data-target="#modal-hapus{{$order->id}}">
                                <div class="btn btn-outline-danger">Delete</div>
                            </a>
                            <a href="{{route('linkQRCode', ['order_id' => $order->id])}}">
                                <div class="btn btn-outline-primary">Show</div>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-hapus{{$order->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-white">
                            <div class="modal-header">
                                <div>
                                    <h5 class="tx-montserrat tx-semibold">Delete Staff</h5>
                                    <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal"
                                    aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p>Are you sure to delete this order</b>?</p>
                                </div>
                                <div>
                                    <form id="form-hapus" method="post" action="{{route('staff.order.delete', ['order_id' => $order->id])}}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                        <button class="btn btn-danger btn-block tx-montserrat tx-semibold form-submit-button"
                                            type="submit" form="form-hapus">Delete
                                        </button>
                                    </form>
                                </div>
                            </div><!-- modal-body -->
                        </div><!-- modal-content -->
                    </div>
         
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
        var table = $('#orderTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            "order": [[1, "asc"]],
            lengthChange: false
        });
    </script>
@endsection
