@extends('app')
@section('page-header','บาร์โค้ดกำหนดเอง')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">บาร์โค้ด</li>
    <li class="breadcrumb-item active">กำหนดเอง</li>
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <form class="form">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="mdi mdi-tag-text-outline"></i></div>
                            <input type="text" class="form-control" name="product_name" placeholder="ชื่อสินค้า">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-b-0">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-b-0">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-b-0">

                    </div>
                </div>
            </div>
        </div>
    </form>



    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection
