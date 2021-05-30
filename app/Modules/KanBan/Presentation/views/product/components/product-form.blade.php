
<div class="card card-info col-md-12">
    <div class="card-header">
        <h3 class="card-title">{{$action_name}} Product</h3>
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
    <form role="form" method="post" action="{{route($form_action, ['business_id' => request()->route('business_id'), 'product_id' => $product_id])}}"
          enctype="multipart/form-data">
        @csrf
        <div class="card card-info col-md-10 offset-md-1 mt-3">
            <div class="card-header">
                <h3 class="card-title">Product Information</h3>
            </div>
            <!-- /.card-header -->
            <!--card-body-->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name-input">Nama Produk</label>
                            <input type="hidden" name="business_id" id="business_id" value="{{request()->route('business_id')}}">
                            <input type="text" class="form-control"
                                   id="name-input"
                                   name="product_name" placeholder="Masukkan Nama Buku product" value="{{old('product_name', $product_name)}}"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="price-input">Harga Produk</label>
                            <input type="text" class="form-control"
                                   id="price-input"
                                   name="product_price" placeholder="Masukkan Harga Produkt" value="{{old('product_price', $product_price)}}"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description-input">Deskripsi Produk</label>
                            <input type="text" class="form-control"
                                   id="description-input"
                                   name="product_description" placeholder="Masukkan Deskripsi produk" value="{{old('product_description', $product_description)}}"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="badge-input">Badge Produk</label>
                            <input type="text" class="form-control"
                                   id="badge-input"
                                   name="product_badge" placeholder="Masukkan badge produk" value="{{old('product_badge', $product_badge)}}"
                                   autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /. Post Content -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">{{$action_name}} product</button>
        </div>
    </form>
</div>
