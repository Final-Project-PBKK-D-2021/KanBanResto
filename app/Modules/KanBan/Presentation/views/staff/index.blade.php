@extends('base')

@section('title')
    Staff List
@endsection

@section('header_title')
    Staff List
@endsection

@section('header_right')
    @if(Auth::guard('owner')->check())
    <a href="{{ route('owner.withBusiness.withOutlet.staff.register', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet_id')]) }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>
    @endif
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="row row-xs">
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
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card bg-white" id="staffList">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="staffTable" class="table">
                    <thead>
                    <tr>
                                        </form>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Staff Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $staff)
                        <tr>
                            <td>{{$staff->getName()}}</td>
                            <td>{{$staff->getEmail()}}</td>
                            <td>{{$staff->getStaffRole()}}</td>
                            <td>
                                <a data-id="{{$staff->getId()}}" data-toggle="modal" data-animation="effect-scale" data-target="#modal-hapus{{$staff->getId()}}">
                                    <div class="btn btn-outline-danger">Delete</div>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-hapus{{$staff->getId()}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content bg-white">
                                <div class="modal-header">
                                    <div>
                                        <h5 class="tx-montserrat tx-semibold">Delete Staff</h5>
                                        <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal"
                                        aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>Are you sure to delete this staff</b>?</p>
                                    </div>
                                    <div>
                                        <form id="form-hapus" method="POST" action="{{route('owner.withBusiness.withOutlet.staff.delete', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet_id')])}}">
                                            @csrf
                                            <input type="hidden" name="staff_id" value="{{$staff->getId()}}">
                                            <button class="btn btn-danger btn-block tx-montserrat tx-semibold form-submit-button"
                                                type="submit" form="form-hapus">Delete
                                            </button>
                                    </div>
                                </div><!-- modal-body -->
                            </div><!-- modal-content -->
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap5.min.js')}}"></script>
    <script>
        var table = $('#staffTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            orderCellsTop: true,
            fixedHeader: true,
            "order": [[1, "asc"]],
            lengthChange: false
        });
    </script>
@endsection
