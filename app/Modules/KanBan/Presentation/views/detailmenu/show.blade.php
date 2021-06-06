@extends('base-in')

@section('title')
    KanbanResto
@endsection

@section('header_title')
    KanbanResto
@endsection

@section('content')
<div class="row row-xs">
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card bg-white">
            <div class="card-body">
                <h5 class="card-title">{{  $menu->getName()  }}</h5>
                <p class="card-text">{{ $menu->getDescription() }}</p>
                <table id="menuTable" class="table">
                <thead>
                <tr>
                    <th>Nama Product</th>
                    <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($menu->getListProducts() as $product)
                    <tr>
                        <td>
                            {{$product->name}}
                        </td>
                        <td>
                            {{$product->price}}
                        </td>
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
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection

