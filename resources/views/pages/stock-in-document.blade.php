@extends('app')
@section('page-header','รับสินค้าเข้า')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">สต๊อคสินค้า</li>
    <li class="breadcrumb-item active">รับสินค้าเข้า</li>
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <h3><b>ใบรับสินค้าเข้า</b> [นิวโฟนแม่ทา] <span class="pull-right">#5669626</span></h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <p class="text-muted m-l-5"><b>วันที่ :</b> <i class="fa fa-calendar"></i> 25/11/2560</p>
                            </address>
                        </div>
                        <div class="pull-right text-right">
                            <address>

                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>สินค้า</th>
                                    <th class="text-right">จำนวน</th>
                                    <th class="text-right">SN/IMEI</th>
                                    <th class="text-right">หมายเหตุ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stockin_reference->detail as $s )
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>{{$s->productInfo->product_name}}</td>
                                    <td class="text-right">{{$s->amount}} </td>
                                    <td class="text-right"> {{$s->sn}} </td>
                                    <td class="text-right">  </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">

                            <hr>
                            <h3><b>ผู้รับเข้า :</b> ณัชพล</h3>
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
                        <button class="btn btn-danger" type="submit"> ย้อนกลับ </button>
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