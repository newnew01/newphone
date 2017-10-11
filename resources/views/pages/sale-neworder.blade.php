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
<div class="row">
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
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="บาร์โค้ด" style="">

                                <input type="email" class="form-control col-2" id="exampleInputEmail1" placeholder="จำนวน">
                                <span class="input-group-btn">
                                    <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success">ตกลง</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2    ">
                        <span class="input-group-btn">
                            <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-info"><i class="mdi mdi-magnify"></i> ค้นหา</button>
                        </span>
                    </div>

                    <div class="col-md-2    ">
                        <span class="input-group-btn">
                            <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-primary"><i class="mdi mdi-gift"></i> เพิ่มของแถม</button>
                        </span>
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
                            <th>ราคา/หน่วย</th>
                            <th>ราคารวม</th>
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

</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection