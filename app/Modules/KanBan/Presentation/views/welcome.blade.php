@extends('base-landing')

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
            <h4 class="mg-b-5">Selamat Datang di KanbanResto</h4>
            <p class="mg-b-0 tx-color-03">
              Solusi All-In-One point of sales untuk bisnis restoran yang menyediakan   
              rangkaian lengkap manajemen outlet dan staff.
            </p>
          </div>
        </div>

        <hr class="mg-t-30 mg-b-30">

        <div class="row">
        <div class="col-sm-6 col-lg-3">
        <div class="card card-help">
            <div class="card-body tx-13">
            <div class="tx-60 lh-0 mg-b-25"><ion-icon name="business"></ion-icon></div>
            <h5><a href="" class="link-01">Bisnis & Outlet</a></h5>
            <p class="tx-color-03 mg-b-0">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molesti...</p>
            </div><!-- card-body -->
            <div class="card-footer tx-13">
            </div><!-- card-footer -->
        </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-6 col-lg-3 mg-t-20 mg-sm-t-0">
        <div class="card card-help">
            <div class="card-body tx-13">
            <div class="tx-60 lh-0 mg-b-25"><ion-icon name="people"></ion-icon></div>
            <h5><a href="" class="link-01">Staf</a></h5>
            <p class="tx-color-03 mg-b-0">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molesti...</p>
            </div><!-- card-body -->
            <div class="card-footer tx-13">
            </div><!-- card-footer -->
        </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-6 col-lg-3 mg-t-20 mg-sm-t-30 mg-lg-t-0">
        <div class="card card-help">
            <div class="card-body tx-13">
            <div class="tx-60 lh-0 mg-b-25"><i class="icon ion-ios-cart"></i></div>
            <h5><a href="" class="link-01">Produk</a></h5>
            <p class="tx-color-03 mg-b-0">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molesti...</p>
            </div><!-- card-body -->
            <div class="card-footer tx-13">
            </div><!-- card-footer -->
        </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-6 col-lg-3 mg-t-20 mg-sm-t-30 mg-lg-t-0">
        <div class="card card-help">
            <div class="card-body tx-13">
            <div class="tx-60 lh-0 mg-b-25"><i class="icon ion-ios-filing"></i></div>
            <h5><a href="" class="link-01">Transaksi</a></h5>
            <p class="tx-color-03 mg-b-0">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molesti...</p>
            </div><!-- card-body -->
            <div class="card-footer tx-13">
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
