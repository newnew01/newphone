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
    <form class="form" action="/barcode/print" method="post" autocomplete="off">
        {{csrf_field()}}
        <div class="row">
            @for ($i = 1; $i <= 14; $i++)
                <div class="col-md-3">
                    <div class="card card-outline-inverse">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{$i}}-1</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-tag-text-outline"></i></div>
                                <input type="text" class="form-control" maxlength="16" name="product_name[]" placeholder="ชื่อสินค้า">
                            </div>
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                                <input type="text" class="form-control" name="barcode[]" placeholder="บาร์โค้ด">
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="mdi mdi-currency-btc"></i></div>
                                <input type="text" class="form-control" name="price[]" placeholder="ราคา">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-outline-inverse">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{$i}}-2</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-tag-text-outline"></i></div>
                                <input type="text" class="form-control" maxlength="16" name="product_name[]" placeholder="ชื่อสินค้า">
                            </div>
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                                <input type="text" class="form-control" name="barcode[]" placeholder="บาร์โค้ด">
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="mdi mdi-currency-btc"></i></div>
                                <input type="text" class="form-control" name="price[]" placeholder="ราคา">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-outline-inverse">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{$i}}-3</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-tag-text-outline"></i></div>
                                <input type="text" class="form-control" maxlength="16" name="product_name[]" placeholder="ชื่อสินค้า">
                            </div>
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                                <input type="text" class="form-control" name="barcode[]" placeholder="บาร์โค้ด">
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="mdi mdi-currency-btc"></i></div>
                                <input type="text" class="form-control" name="price[]" placeholder="ราคา">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-outline-inverse">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{$i}}-4</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-tag-text-outline"></i></div>
                                <input type="text" class="form-control" maxlength="16" name="product_name[]" placeholder="ชื่อสินค้า">
                            </div>
                            <div class="input-group m-b-10">
                                <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                                <input type="text" class="form-control" name="barcode[]" placeholder="บาร์โค้ด">
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="mdi mdi-currency-btc"></i></div>
                                <input type="text" class="form-control" name="price[]" placeholder="ราคา">
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
                <div class="col-md-12">
                    <div class="card card-outline-inverse">
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">สร้างบาร์โค้ด</button>
                        </div>
                    </div>
                </div>
        </div>
    </form>



    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection
