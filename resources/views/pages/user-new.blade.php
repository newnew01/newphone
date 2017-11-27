@extends('app')
@section('page-header','เพิ่มผู้ใช้งาน')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">ผู้ใช้งาน</li>
    <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            <h3 class="box-title m-b-0">เพิ่มข้อมูลผู้ใช้งานใหม่</h3>
            <p class="text-muted m-b-30 font-13"> กรุณากรอกข้อมูลผู้ใช้ให้ครบถ้วน </p>
            <form class="form-horizontal" method="post" action="/user/new">

                {{csrf_field()}}

                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">ชื่อพนักงาน*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">รหัสพนักงาน*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">รหัสผ่าน*</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">รหัสผ่าน*</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="re_password">
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">อีเมล์*</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">เบอร์โทร*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="mobile_no">
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">สาขา*</label>
                    <div class="col-sm-9">
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="branch_id">
                            <option selected="">Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-3 text-right control-label col-form-label">ตำแหน่ง*</label>
                    <div class="col-sm-9">
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="role_id">
                            <option selected="">Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>



                <div class="form-group m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">เพิ่มผู้ใช้งาน</button>
                        <a href="/user/list" class="btn btn-secondary  waves-effect waves-light m-t-10">ย้อนกลับ</a>
                    </div>
                </div>


            </form>
        </div>
    </div>



</div>


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection

@section('js-head')

@endsection

@section('js-bottom')
    <!-- jQuery peity -->
    <script src="/assets/plugins/tablesaw-master/dist/tablesaw.js"></script>
    <script src="/assets/plugins/tablesaw-master/dist/tablesaw-init.js"></script>

    <script src="/assets/plugins/toast-master/js/jquery.toast.js"></script>

    @include('template.flash-msg');
@endsection

@section('css-head')
    <!-- Bootstrap responsive table CSS -->
    <link href="/assets/plugins/tablesaw-master/dist/tablesaw.css" rel="stylesheet">

    <!-- toast CSS -->
    <link href="/assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/css/colors/blue.css" id="theme" rel="stylesheet">
@endsection