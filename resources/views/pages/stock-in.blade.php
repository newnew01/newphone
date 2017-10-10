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
        <div class="card card-outline-inverse">
            <div class="card-header">
                <h4 class="m-b-0 text-white">ข้อมูลสินค้า</h4>
            </div>
            <div class="card-body">
                <div class="row p-t-20">
                    <div class="col-md-10">
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

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="mdi mdi-content-save"></i> บันทึก</button>
                    <button type="submit" class="btn btn-inverse waves-effect waves-light" ><i class="mdi mdi-delete-empty"></i> เคลียร์รายการ</button>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection