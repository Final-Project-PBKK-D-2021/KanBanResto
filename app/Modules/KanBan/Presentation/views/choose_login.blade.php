@extends('base-out-alternatif')

@section('title')
    KanbanResto
@endsection

@section('header_title')
    KanbanResto
@endsection

@section('content')
    <div class="content content-fixed bd-b">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h4 class="mg-b-5">Siapakah Anda?</h4>
            <p class="mg-b-0 tx-color-03">Pilih salah satu role KanbanResto di bawah ini.</p>
          </div>
        </div>

        <hr class="mg-t-30 mg-b-30">

        <div class="row">
          <div class="col-sm-6 col-lg-6">
            <div class="card card-help">
                <div class="card-body tx-13">
                <div class="tx-60 lh-0 mg-b-25"><ion-icon name="storefront-outline"></ion-icon></div>
                <h5><a href="" class="link-01">Owner</a></h5>
                <p class="tx-color-03 mg-b-0">Masuk sebagai pemilik atau owner bisnis...</p>
                </div><!-- card-body -->
                <div class="card-footer tx-13">
                <span></span>
                <a href="{{route('login')}}" class="tx-18 lh-0 float-right"><i class="icon ion-md-arrow-forward"></i></a>
                </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-sm-6 col-lg-6 mg-t-20 mg-sm-t-0">
            <div class="card card-help">
                <div class="card-body tx-13">
                <div class="tx-60 lh-0 mg-b-25"><ion-icon name="people-outline"></ion-icon></div>
                <h5><a href="" class="link-01">Staff</a></h5>
                <p class="tx-color-03 mg-b-0">Masuk sebagai karyawan bagi Anda yang merupakan seorang kasir atau koki...</p>
                </div><!-- card-body -->
                <div class="card-footer tx-13">
                <span></span>
                <a href="{{route('staff_login')}}" class="tx-18 lh-0 float-right"><i class="icon ion-md-arrow-forward"></i></a>
                </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col -->
    </div><!-- row -->
      </div><!-- container -->
    </div><!-- content -->

@endsection

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
