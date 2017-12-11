@extends('app')
@section('page-header','ขายใหม่')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">การขาย</li>
    <li class="breadcrumb-item active">ขายใหม่</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row" ng-controller="SaleNewOrderController">
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

    <form method="post" action="/stock/transfer" style="width: 100%">
        {{ csrf_field() }}


        <div class="col-md-12">

            <div class="card card-outline-inverse">
                <div class="card-body">
                    <div class="row">
                        <table class="table color-table warning-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อสินค้า</th>
                                <th>ยี่ห้อ</th>
                                <th>รุ่น</th>
                                <th>SN/IMEI</th>
                                <th>จำนวน</th>
                                <th>AIS deal</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr ng-if="products.length == 0">
                                <td colspan="8" class="text-center">ไม่มีข้อมูล</td>
                            </tr>

                            <tr ng-repeat="product in products">
                                <td><% $index+1 %></td>
                                <td ><span data-toggle="tooltip" title="<% product.description %>"><% product.product_name %></span></td>
                                <td><% product.brand %></td>
                                <td><% product.model %></td>
                                <td><% product.sn %></td>
                                <td><% product.count %></td>
                                <td><i class="mdi mdi-check text-danger" ng-if="product.ais_deal == 1"></i> </td>
                                <td>
                                    <button type="button" class="btn waves-effect waves-light btn-xs btn-primary">รายละเอียดสินค้า</button>
                                    <button type="button" class="btn waves-effect waves-light btn-xs btn-danger" ng-click="removeFromList($index)">ลบ</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <div style="display: none" ng-repeat="product in products">
                        <input type="hidden" name="product_id[]" value="<% product.id %>">
                        <input type="hidden" name="type_sn[]" value="<% product.type_sn %>">
                        <input type="hidden" name="sn[]" value="<% product.sn %>">
                        <input type="hidden" name="count[]" value="<% product.count %>">
                    </div>
                </div>
            </div>
        </div>



    </form>

    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">ข้อมูลลูกค้า</h4>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">ชื่อ</label>
                                    <input type="text" id="firstName" class="form-control" placeholder="John doe">
                                    <small class="form-control-feedback"> This is inline help </small> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="control-label">นามสกุล</label>
                                    <input type="text" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                    <small class="form-control-feedback"> This field has error. </small> </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">เพศ</label>
                                    <select class="form-control custom-select">
                                        <option value="">ชาย</option>
                                        <option value="">หญิง</option>
                                    </select>
                                    <small class="form-control-feedback"> Select your gender </small> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">วันเดือนปีเกิด</label>
                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <h3 class="box-title m-t-40">ที่อยู่</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>รายละเอียดที่อยู่</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ตำบล</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>อำเภอ</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>จังหวัด</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึกใบเสร็จ</button>
                        <button type="button" class="btn btn-inverse">เคลียร์ข้อมูล</button>
                    </div>
                </form>
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
    <script src="/js/angular/controller/sale-neworder.js"></script>
@endsection

@section('js-bottom')
    <script>
        source_branch = 1;

        $(document).ready(function () {
            $('#barcode_input').focus();
        });

    </script>
@endsection