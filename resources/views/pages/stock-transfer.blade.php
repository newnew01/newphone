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
<div class="row" ng-controller="StockTransferController">
    <div class="col-md-12">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <h4 class="m-b-0 text-white">ข้อมูลสินค้า</h4>
            </div>
            <div class="card-body">
                <div class="row p-t-20">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                                <input type="text" class="form-control" id="barcode_input" placeholder="บาร์โค้ด" style="" ng-model="barcode_input" ng-keyup="$event.keyCode == 13 && addProductToList()">

                                <span class="input-group-btn">
                                    <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success" ng-click="addProductToList()">ตกลง</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-warning" data-toggle="modal" data-target="#modal_amount_barcode">จำนวนมาก</button>
                        <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-info"><i class="mdi mdi-magnify"></i> ค้นหา</button>

                    </div>


                </div>

            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-outline-inverse">
            <div class="card-body">
                <div class="row">
                    <table class="table color-table danger-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อสินค้า</th>
                            <th>ยี่ห้อ</th>
                            <th>รุ่น</th>
                            <th>SN/IMEI</th>
                            <th>จำนวน</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td ><span data-toggle="tooltip" title="โทรศัพท์มือถือยี่ห้อ VIVO รุ่น Y53 สีทอง">Nigam</span></td>
                            <td>Eichmann</td>
                            <td>@Sonu</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-primary">ภาพสินค้า</button>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-danger">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><span data-toggle="tooltip" title="โทรศัพท์มือถือยี่ห้อ VIVO รุ่น Y53 สีทอง">Deshmukh</span></td>
                            <td>Prohaska</td>
                            <td>@Genelia</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-primary">ภาพสินค้า</button>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-danger">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><span data-toggle="tooltip" title="โทรศัพท์มือถือยี่ห้อ VIVO รุ่น Y53 สีทอง">Roshan</span></td>
                            <td>Rogahn</td>
                            <td>@Hritik</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-primary">ภาพสินค้า</button>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-danger">ลบ</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <h4 class="m-b-0 text-white">รายละเอียดการโอน</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="mdi mdi-cellphone"></i> ต้นทาง</div>
                                <input type="text" placeholder="" class="form-control" value="นิวโฟนแม่ทา" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="mdi mdi-cellphone"></i> ปลายทาง</div>
                                <select class="form-control custom-select" name="branch_id">
                                    <option value="-1">[สาขา]</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="mdi mdi-content-save"></i> บันทึก</button>
                <button type="submit" class="btn btn-inverse waves-effect waves-light" ><i class="mdi mdi-delete-empty"></i> เคลียร์รายการ</button>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal_amount_barcode" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">โอนจำนวนมาก</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="mdi mdi-numeric"></i></div>
                        <input type="text" class="form-control col-md-2" name="amount" id="amount" ng-model="amount" placeholder="จำนวน" ng-keyup="$event.keyCode == 13 && checkAmount()">
                        <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                        <input type="text" class="form-control" name="amount_barcode" id="amount_barcode" ng-model="amount_barcode" placeholder="บาร์โค้ด" ng-keyup="$event.keyCode == 13 && addProductToListAmount()">
                        <span class="input-group-btn">
                                <button ng-click="addProductToListAmount()"   class="btn waves-effect waves-light btn-success">ตกลง</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" tabindex="-1" id="modal_sn" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">กรอก IMEI/SN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                        <input type="text" class="form-control" name="imei_sn_input" id="imei_sn_input" placeholder="กรุณากรอก IMEI/SN" ng-model="imei_sn_input" ng-keyup="$event.keyCode == 13 && addProductToListSN()">
                        <span class="input-group-btn">
                                <button ng-click="addProductToListSN()"   class="btn waves-effect waves-light btn-success">ตกลง</button>
                            </span>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection

@section('js-head')
    <script src="/js/angular/controller/stock-transfer.js"></script>
@endsection