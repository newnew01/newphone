@extends('app')
@section('page-header','โอนสินค้า')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">สต๊อคสินค้า</li>
    <li class="breadcrumb-item active">โอนสินค้า</li>
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <img src="/assets/images/logo_sm_text_right.png" width="200px" class="m-b-20">
                <h3><b>ใบเสร็จรับเงิน</b> [สาขาอิอิอิ]<span class="pull-right">เลขที่อ้างอิง: {{sprintf('%06d', 1234)}}</span></h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <p class="text-muted m-l-5">วันที่ :<i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($invoice->created_at)->format('d-m-Y') }}</p>
                                <p class="text-muted m-l-5">ชื่อลูกค้า : {{$invoice->customer_fname}} {{$invoice->customer_lname}} </p>
                                <p class="text-muted m-l-5">ที่อยู่ : {{$invoice->customer_address}} {{$invoice->customer_tumbol == null ? '':'ต.'.$invoice->customer_tumbol}} {{$invoice->customer_ampher == null ? '':'อ.'.$invoice->customer_ampher}} {{$invoice->customer_province == null ? '':'จ.'.$invoice->customer_province}} {{$invoice->customer_zipcode}}</p>

                            </address>
                        </div>
                        <div class="pull-right text-right">
                            <address>
                                <img src="data:image/png;base64,{{$ref_id_barcode}}" alt="barcode">
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="30px">#</th>
                                    <th>สินค้า</th>
                                    <th width="70px" class="text-center">จำนวน</th>
                                    <th width="120px" class="text-center">ราคา/หน่วย</th>
                                    <th width="120px" class="text-center">ราคาสุทธิ</th>

                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">

                            <hr>
                            <h3><b>ผู้รับเข้า :</b> {{}}</h3>
                        </div>
                        <div class="clearfix"></div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-12t">
                        <a href="/stock/list" class="btn btn-info"> ย้อนกลับ </a>
                        <button id="print" class="btn btn-default" type="button"> <span><i class="fa fa-print"></i> พิมพ์</span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection

@section('js-bottom')
    <script src="/js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
        $(document).ready(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
    </script>
@endsection