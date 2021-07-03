@extends('base-out-alternatif')

@section('title')
    KanbanResto
@endsection

@section('header_title')
    KanbanResto
@endsection

@section('content')
<div class="row row-xs mg-t-40 mg-lg-t-60 mg-md-t-40 mg-sm-t-40">
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card bg-white">
            <div class="card-body">
                <h5 class="card-title">{{$menu->name}}</h5>
                <p class="card-text">{{ $menu->description }}</p>
                <table id="menuTable" class="table">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Badge</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($menu->products as $product)
                    <tr>
                        <td>
                            {{$product->name}}
                        </td>
                        <td>
                            {{$product->price}}
                        </td>
                        <td>
                            {{$product->description}}
                        </td>
                        <td>
                            {{$product->badge}}
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

