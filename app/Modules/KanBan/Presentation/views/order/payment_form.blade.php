@extends('base')

@section('header_right')

@endsection

@section('prestyles')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
@endsection

@section('content')
<div class="container">
    <h1>Lanjutkan Pembayaran : {{$order->name}}</h1>
    <table class="table col-md-8">
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

    <div class="row offset-md-6">
        <form action="{{route('staff.order.cancel', ['order_id' => $order->id])}}" method="post">    
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-secondary p-2">Batalkan Pesanan</button>
        </form>  
        <form action="{{route('staff.order.updatePrice', ['order_id' => $order->id])}}" method="post">    
                @csrf
                <input type="hidden" name="total" value="{{$total}}">
                <button type="submit" class="btn btn-primary p-2 ml-2">Selesai</button>
        </form> 
        
    </div>
    
    
    
</div>

@endsection