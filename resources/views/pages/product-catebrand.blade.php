@extends('app')
@section('page-header','หมวดหมู่และยี่ห้อ')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">สินค้า</li>
    <li class="breadcrumb-item active">หมวดหมู่และยี่ห้อ</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-6">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right" data-toggle="modal" data-target="#addCategory" data-whatever="@mdo"><i class="mdi mdi-library-plus"></i> เพิ่มหมวดหมู่</button>
                <h4 class="m-b-0 text-white">หมวดหมู่</h4>
            </div>
            <div class="card-body">
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">รายการหมวดหมู่</th>
                        <th width="100px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="title">{{$category->cate_name}}</td>
                            <td>
                                <a href="/product-catebrand/delete-category/{{$category->id}}" class="btn waves-effect waves-light btn-xs btn-info">แก้ไข</a>
                                <a href="/product-catebrand/delete-category/{{$category->id}}" class="btn waves-effect waves-light btn-xs btn-danger">ลบ</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right" data-toggle="modal" data-target="#addBrand" data-whatever="@mdo"><i class="mdi mdi-library-plus"></i> เพิ่มยี่ห้อ</button>
                <h4 class="m-b-0 text-white">ยี่ห้อ</h4>
            </div>
            <div class="card-body">
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">รายการยี่ห้อ</th>
                        <th width="100px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td class="title">{{$brand->brand_name}}</td>
                            <td>
                                <a href="/product-catebrand/edit-brand/{{$brand->id}}" class="btn waves-effect waves-light btn-xs btn-info">แก้ไข</a>
                                <a href="/product-catebrand/delete-brand/{{$brand->id}}" class="btn waves-effect waves-light btn-xs btn-danger">ลบ</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">เพิ่มหมวดหมู่</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form class="form" method="post" action="{{url('product-catebrand')}}">
                    {{csrf_field()}}
                    <div class="modal-body">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="กรุณากรอกหมวดหมู่" name="category_name">
                                <input type="hidden" name="form_type" value="category_name">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">เพิ่ม</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">เพิ่มยี่ห้อ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form class="form" method="post" action="{{url('product-catebrand')}}">
                    {{csrf_field()}}
                    <div class="modal-body">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="กรุณากรอกยี่ห้อ" name="brand_name">
                                <input type="hidden" name="form_type" value="brand_name">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">เพิ่ม</button>
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

@section('js-bottom')
    <!-- jQuery peity -->
    <script src="../assets/plugins/tablesaw-master/dist/tablesaw.js"></script>
    <script src="../assets/plugins/tablesaw-master/dist/tablesaw-init.js"></script>

    <script src="../assets/plugins/toast-master/js/jquery.toast.js"></script>
    @include('template.flash-msg');

@endsection

@section('css-head')
    <!-- Bootstrap responsive table CSS -->
    <link href="../assets/plugins/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
@endsection