
<div class="card card-info col-md-12">
    <div class="card-header">
        <h3 class="card-title">{{$action_name}} order</h3>
    </div>
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
    <form role="form" method="post" action="{{route($form_action, ['order_id' => $order_id])}}"
          enctype="multipart/form-data">
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
                                   name="order_name" placeholder="Masukkan Nama Pemesan" value="{{old('order_name', $order_name)}}"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="price-input">Total Harga</label>
                            <input type="text" class="form-control"
                                   id="total-price-input"
                                   name="order_ttotal_price" placeholder="Masukkan total harga" value="{{old('order_total_price', $order_total_price)}}"
                                   autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /. Post Content -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">{{$action_name}} order</button>
        </div>
    </form>
</div>
