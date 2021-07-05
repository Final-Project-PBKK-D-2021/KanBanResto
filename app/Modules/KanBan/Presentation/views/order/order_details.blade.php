@extends('base-in')

@section('title')
    Detail Order
@endsection

@section('header_title')
    Detail Order
@endsection

@section('header_right')
    <a href="{{url()->previous()}}" class="btn btn-white tx-montserrat tx-semibold d-none d-lg-block">
        <i data-feather="arrow-left" class="wd-10 mg-r-5"></i>Kembali
    </a>
@endsection

@section('prestyles')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
@endsection

@section('content')
<div class="row row-xs">
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card bg-white">
            <div class="card-body">
            <h5>Atas Nama : {{$order->name}} </h5>
            <p>Tanggal : {{$order->updated_at}}</p>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total=0;
                        $i=1;
                        foreach($order->products as $product){
                            $tot= $product->pivot->jumlah * $product->price;
                            echo
                            "<tr>
                                <th>{$i}</th>
                                <td>{$product->name}</td>
                                <td>{$product->price}</td>
                                <td>{$product->pivot->jumlah }</td>
                                <td>{$tot} </td>
                                
                            </tr>";
                            $i++;
                            $total = $total + $tot;
                        }
                    ?>
                    <tr>
                        <td colspan="4"  class="text-center"><strong>TOTAL</strong></td>
                        <td><strong>{{$total}}</strong></td>
                    </tr>
                    
                </tbody>
            </table>    
            </div>
        </div>
    </div>
</div>
<div class="container">
    
    
    
</div>

@endsection