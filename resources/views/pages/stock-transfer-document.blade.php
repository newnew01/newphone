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
                <h3><b>ใบโอนสินค้า</b> [นิวโฟนแม่ทา] <span class="pull-right">เลขที่อ้างอิง: {{sprintf('%06d', $stock_reference->id)}}</span></h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <p class="text-muted m-l-5"><b>วันที่ :</b> <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($stock_reference->created_at)->format('d-m-Y') }}</p>
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
                                    <th class="text-center"><b>#</b></th>
                                    <th class="text-right" width="15%"><b>รหัสสินค้า</b></th>
                                    <th><b>สินค้า</b></th>
                                    <th class="text-right"><b>จำนวน</b></th>
                                    <th class="text-right"><b>SN/IMEI</b></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stock_reference->detail as $index => $s )
                                <tr>
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-right">{{sprintf('%04d', $s->productInfo->id)}}</td>
                                    <td>{{$s->productInfo->product_name}}
                                        @if($s->productInfo->type_sn == 1)
                                            {{$s->productInfo->brand->brand_name}}
                                        @endif
                                        {{$s->productInfo->model}}
                                        @if($s->ais_deal == 1)
                                            (AIS Deal)
                                        @endif
                                    </td>
                                    <td class="text-right">{{$s->amount}} </td>
                                    <td class="text-right">{{$s->sn}}</td>
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