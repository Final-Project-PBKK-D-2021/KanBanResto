<form id="form_business" action="{{route($form_action)}}" method="POST" data-parsley-validate="" novalidate="">
    @csrf
    <div class="row row-xs">
        <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
            <div>
            <p class="tx-medium tx-15">Business Information</p>       
            </div>
        </div>                 
    </div>
    <fieldset>  
    <input type="hidden" name="business_id" id="business_id" value="{{ old('id', $id) }}">
    <input type="hidden" name="owner_id" id="owner_id" value="{{Auth::guard('owner')->user()->owner_id}}">
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="name">Business Name</label> 
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $name) }}" autocomplete="off" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="description">Descripton</label> 
                    <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $description) }}" autocomplete="off" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="since">Since</label> 
                    <input type="text" id="since" name="since" class="form-control" value="{{ old('since', $since) }}" autocomplete="off" required="">
                </div>
                <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="owner_name">Nama Owner</label> 
                    <input type="text" id="owner_name" name="owner_name" class="form-control" value="{{Auth::guard('owner')->user()->name}}" autocomplete="off" required="">
                </div>
            </div>
        </div>
    </fieldset>

    <button type="submit" form="form_business" class="btn btn-primary tx-montserrat tx-semibold float-right">Simpan</button>
</form>