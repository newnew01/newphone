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

                    <table class="table color-table warning-table">
                        <thead>
                        <tr>
                            <th width="30px">#</th>
                            <th>สินค้า</th>
                            <th width="70px" class="text-center">จำนวน</th>
                            <th width="120px" class="text-center">ราคา/หน่วย</th>
                            <th width="90px" class="text-center">ราคารวม</th>
                            <th width="120px" class="text-center">ราคาสุทธิ</th>
                            <th width="90px" class="text-center">ส่วนลด</th>
                            <th width="90px" class="text-center">แถม</th>
                            <th width="80px"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr ng-if="products.length == 0">
                            <td colspan="8" class="text-center">ไม่มีข้อมูล</td>
                        </tr>

                        <tr ng-repeat="product in products">
                            <td><% $index+1 %></td>
                            <td ><span class="tooltip_description" data-toggle="tooltip" title="<% product.description %>" tooltip><% product.product_name %> <% product.brand %> <% product.model %> <span ng-if="product.ais_deal == 1">(AIS deal)</span> <span ng-if="product.sn != ''">[<% product.sn %>]</span></span></td>
                            <td class="text-center"><% product.count %></td>
                            <td class="text-center"><% product.price %></td>
                            <td class="text-center"><span><% (product.price*product.count) %></span></td>
                            <td class="text-center font-bold"><span ng-if="!free_gift[$index]"><% (product.price*product.count)-discount[$index] %></span><span ng-if="free_gift[$index]">0</span></td>
                            <td class="text-center">
                                <input value='0' type="text" style="width: 100%" name="discount_<% $index %>" id="discount_<% $index %>" ng-model="discount[$index]" ng-if="!free_gift[$index]">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" id="free_gift_<% $index %>" class="filled-in chk-col-red" name="free_gift_<% $index %>" ng-model="free_gift[$index]" />
                                <label for="free_gift_<% $index %>"></label>
                            </td>

                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-danger" ng-click="removeFromList($index)">ลบ</button>
                            </td>
                        </tr>

                        <tr  ng-if="false">
                            <td></td>
                            <td ></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center font-bold"><% getTotal()+getTotalDiscount() %></td>
                            <td class="text-center font-bold"><% getTotal() %></td>
                            <td class="text-center font-bold"><% getTotalDiscount() %></td>
                            <td class="text-center"></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>

                    <div class="col-md-12 text-right">
                        <h3 class="p-r-20 font-bold">ราคาสุทธิ: <% getTotal() %></h3>
                    </div>


                </div>



            </div>
        </div>
    </div>

    <form method="post" action="/sale/neworder" style="width: 100%">
        {{ csrf_field() }}


        <div style="display: none" ng-repeat="product in products">
            <input type="hidden" name="product_id[]" value="<% product.id %>">
            <input type="hidden" name="type_sn[]" value="<% product.type_sn %>">
            <input type="hidden" name="sn[]" value="<% product.sn %>">
            <input type="hidden" name="count[]" value="<% product.count %>">
            <input type="hidden" name="discount[]" value="<% discount[$index] %>">
            <input type="hidden" name="free_gift[]" value="<% free_gift[$index] %>">

        </div>

        <div class="col-md-12">
            <div class="card card-outline-inverse">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">ข้อมูลลูกค้า</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">ชื่อ</label>
                                    <input type="text" id="firstName" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">นามสกุล</label>
                                    <input type="text" id="lastName" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">เพศ</label>
                                    <select class="form-control custom-select" name="gender">
                                        <option value="1">ชาย</option>
                                        <option value="2">หญิง</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">เบอร์โทร</label>
                                    <input type="text" id="telNo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="control-label">วันเดือนปีเกิด</label>
                                    <input type="text" class="form-control" placeholder="วว/ดด/ปปปป">
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


                    <div class="form-group">
                        <label>หมายเหตุ</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="card card-outline-inverse">
                <div class="card-body text-center">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึกใบเสร็จ</button>
                        <button type="button" class="btn btn-inverse">เคลียร์ข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <div class="modal fade" tabindex="-1" id="modal_amount_barcode" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">ขายจำนวนมาก</h4>
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
    <script src="/assets/plugins/toast-master/js/jquery.toast.js"></script>

    @include('template.flash-msg');

    <script>
        source_branch = {{Auth::user()->branch_id}};

        $(document).ready(function () {
            $('#barcode_input').focus();
        });

    </script>
@endsection

@section('css-head')
    <link rel="stylesheet" href="/assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="/assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/css/colors/blue.css" id="theme" rel="stylesheet">

@endsection