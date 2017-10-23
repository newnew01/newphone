@extends('app')
@section('page-header','รายการสินค้า')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">สินค้า</li>
    <li class="breadcrumb-item active">รายการสินค้า</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right"><i class="mdi mdi-library-plus"></i> เพิ่มสินค้า</button>
                <h4 class="m-b-0 text-white">รายการสินค้า</h4>
            </div>
            <div class="card-body">
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">ชื่อสินค้า</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">ยี่ห้อ</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">รุ่น</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">ราคา</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="title"><a class="link" href="javascript:void(0)">{{$product->product_name}}</a></td>
                            <td>{{$product->brand_id}}</td>
                            <td>{{$product->model}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-primary">ภาพสินค้า</button>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-info">แก้ไข</button>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-danger">ลบ</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
@endsection

@section('css-head')
    <!-- Bootstrap responsive table CSS -->
    <link href="../assets/plugins/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
@endsection