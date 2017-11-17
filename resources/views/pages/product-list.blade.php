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
        <div class="card card-outline-inverse" ng-controller="ProductListController">
            <div class="card-header">
                <a  href="/product/new" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right"><i class="mdi mdi-library-plus"></i> เพิ่มสินค้า</a>
                <h4 class="m-b-0 text-white">รายการสินค้า</h4>
            </div>
            <div class="card-body">
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">ชื่อสินค้า</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">ยี่ห้อ</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">รุ่น</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">คงเหลือ</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">ราคา</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="title"><a class="link" href="javascript:void(0)">{{$product->product_name}}</a></td>
                            <td>{{$product->brand->brand_name}}</td>
                            <td>{{$product->model}}</td>
                            <td>{{$product->amount}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-primary" ng-click="viewImage({{$product->id}})">ภาพสินค้า</button>
                                <a  href="/product/edit/{{$product->id}}" class="btn waves-effect waves-light btn-xs btn-info">แก้ไข</a>
                                <a href="/product/delete/{{$product->id}}" class="btn waves-effect waves-light btn-xs btn-danger" onclick="return confirm('ต้องการลบใช่หรือไม่?');">ลบ</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div id="viewImageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><% product_modal.product_name %></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            Image: <% product_modal.image %>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>



</div>


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection

@section('js-head')
    <script src="/js/angular/controller/product-list.js"></script>
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