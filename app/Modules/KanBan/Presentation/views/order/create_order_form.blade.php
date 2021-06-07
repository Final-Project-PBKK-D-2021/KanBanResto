@extends('base')

@section('header_right')

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
                <form id="form_Order" action="{{route('staff.order.create')}}" method="POST" data-parsley-validate="" novalidate="">
                    @csrf
                    <div class="card card-info col-md-10 offset-md-1 mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Order Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <!--card-body-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name-input">Nama Pemesan</label>
                                        <input type="text" class="form-control"
                                            id="name-input"
                                            name="name" placeholder="Masukkan Nama Pemesan" value="{{old('name')}}"
                                            autocomplete="off">
                                    </div>
                                    <table class="mt-2 table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td class="price">{{$product->price}}</td>
                                                <td>
                                                <!-- <input type="hidden" name="keterangan" value="proses"> -->
                                                    <input type="hidden" name="id_product[]" value="{{$product->id}}">
                                                    <input class="qty" type="number" name="qty[]" value="" min="0" max="100" step="1"/>
                                                    <!-- <input type="hidden" name="total" value="0"> -->
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                        <input type="hidden" class="form-control total"
                                            id="total-price-input"
                                            name="total_price" placeholder="Masukkan total harga" value="0"
                                            autocomplete="off">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    
                    <button type="submit" form="form_Order" class="btn btn-primary tx-montserrat tx-semibold float-right">Lanjutkan Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <script>
    $(document).on("change", ".qty", function() {
        var sum = 0;
        $(".qty").each(function(){
            sum += +$(this).val();
        });
        $(".total").val(sum);
    });
</script> -->
@endsection
