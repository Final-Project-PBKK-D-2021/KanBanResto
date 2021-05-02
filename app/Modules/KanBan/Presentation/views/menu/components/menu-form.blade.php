
<div class="card card-info col-md-12">
    <div class="card-header">
        <h3 class="card-title">{{$action_name}} Menu</h3>
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
    <form role="form" method="post" action="{{route($form_action, ['menu_id' => $menu_id])}}"
          enctype="multipart/form-data">
        @csrf
        <div class="card card-info col-md-10 offset-md-1 mt-3">
            <div class="card-header">
                <h3 class="card-title">Menu Information</h3>
            </div>
            <!-- /.card-header -->
            <!--card-body-->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name-input">Nama Buku Menu</label>
                            <input type="text" class="form-control"
                                   id="name-input"
                                   name="menu_name" placeholder="Masukkan Nama Buku Menu" value="{{old('menu_name', $menu_name)}}"
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description-input">Deskripsi Buku Menu</label>
                            <input type="text" class="form-control"
                                   id="description-input"
                                   name="menu_description" placeholder="Masukkan Deskripsi Buku Menu" value="{{old('menu_description', $menu_description)}}"
                                   autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /. Post Content -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">{{$action_name}} Menu</button>
        </div>
    </form>
</div>
