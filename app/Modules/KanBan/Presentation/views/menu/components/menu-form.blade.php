<form id="form_menu" action="{{route($form_action, ['business_id' => request()->route('business_id'), 'menu_id' => $menu_id])}}" method="POST" data-parsley-validate="" novalidate="">
    @csrf
    <div class="row row-xs">
        <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
            <div>
            <p class="tx-medium tx-15">{{$action_name}} Menu Information</p>       
            </div>
        </div>                 
    </div>
    <fieldset>
        <input type="hidden" name="menu_id" id="menu_id" value="{{ old('menu_id', $menu_id) }}">
        <input type="hidden" name="business_id" value="{{ request()->route('business_id') }}">
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="name">Menu Name</label> 
                    <input type="text" id="name" name="menu_name" class="form-control" value="{{ old('menu_name', $menu_name) }}" autocomplete="off" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="description">Descripton</label> 
                    <input type="text" id="description" name="menu_description" class="form-control" value="{{ old('menu_description', $menu_description) }}" autocomplete="off" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Product 1</label> 
                    <select class="form-control custom-select" name="list_products[]" required="">
                        @foreach ($products as $product)
                            <option value="{{ $product }}">{{ $product->name }}</option>                                        
                        @endforeach
                    </select>
                </div>   
                <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Product 2</label> 
                    <select class="form-control custom-select" name="list_products[]" required="">
                        @foreach ($products as $product)
                            <option value="{{ $product }}">{{ $product->name }}</option>                                        
                        @endforeach
                    </select>
                </div>              
            </div>
        </div>
      
    </fieldset>

    <button type="submit" form="form_menu" class="btn btn-primary tx-montserrat tx-semibold float-right">Simpan</button>
</form>


