@extends('base')

@section('title')
    Staff List
@endsection

@section('header_title')
    Order List
@endsection

@section('header_right')
    @if(Auth::guard('owner')->check())
    <!-- <a href="{{ route('owner.withBusiness.withOutlet.staff.register', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet_id')]) }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a> -->
    @endif
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="row row-xs">
    @if ($errors->any())
        <div class="alert alert-danger mt-3" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card bg-white" id="staffList">
            <!-- /.card-header -->
            <div class="card-body">
                    <?php $total=0;
                        foreach($orders as $order){
                            $total = $total + $order->total_price;
                        }
                    ?>
                <h3>Total Pemasukan : {{$total}}</h3>
                <table id="staffTable" class="table">
                    <thead>
                    <tr>
                                        </form>
                        <th>Nama</th>
                        <th>Pesanan</th>
                        <th>Total</th>
                        <th>Tanggal</th>
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
                            <td>{{$order->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap5.min.js')}}"></script>
    <script>
        var table = $('#staffTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            "order": [[1, "asc"]],
            lengthChange: false
        });
    </script>
@endsection
