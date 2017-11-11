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
<div class="row" ng-app="newphoneApp" ng-controller="StockInController">
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

                            <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-warning">จำนวนมาก</button>
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

                        <tr ng-repeat="product in products">
                            <td><% $index+1 %></td>
                            <td ><span data-toggle="tooltip" title="<% product.description %>"><% product.product_name %></span></td>
                            <td><% product.brand %></td>
                            <td><% product.model %></td>
                            <td><% product.sn %></td>
                            <td><% product.count %></td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-primary">ภาพสินค้า</button>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-danger" ng-click="removeFromList($index)">ลบ</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="mdi mdi-content-save"></i> บันทึก</button>
                    <button class="btn btn-inverse waves-effect waves-light" ng-click="clearList()"><i class="mdi mdi-delete-empty"></i> เคลียร์รายการ</button>
            </div>
        </div>
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
    <script src="/js/angular/controller/stock-in.js"></script>
@endsection

@section('js-bottom')
    <script>
        $(document).ready(function () {
            $('#barcode_input').focus();
        });
    </script>
@endsection