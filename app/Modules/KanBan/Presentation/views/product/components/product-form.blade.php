<form id="form_product" action="{{route($form_action, ['business_id' => request()->route('business_id'), 'product_id' => $product_id])}}" method="POST" data-parsley-validate="" novalidate="">
    @csrf
    <div class="row row-xs">
        <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
            <div>
            <p class="tx-medium tx-15">Product Information</p>       
            </div>
        </div>                 
    </div>
    <fieldset>  
    <input type="hidden" name="business_id" id="business_id" value="{{ request()->route('business_id') }}">
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="name">Product Name</label> 
                    <input type="text" id="name" name="product_name" class="form-control" value="{{ old('product_name', $product_name) }}" autocomplete="off" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="description">Description</label> 
                    <input type="text" id="description" name="product_description" class="form-control" value="{{old('product_description', $product_description)}}" autocomplete="off" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="badge">Badge</label> 
                    <input type="text" id="badge" name="product_badge" class="form-control" value="{{ old('product_badge', $product_badge) }}" autocomplete="off" required="">
                </div>
                <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="price">Price</label> 
                    <input type="text" id="price" name="product_price" class="form-control" value="{{old('product_price', $product_price)}}" autocomplete="off" required="">
                </div>
            </div>
        </div>
    </fieldset>

    <button type="submit" form="form_product" class="btn btn-primary tx-montserrat tx-semibold float-right">Simpan</button>
</form>
