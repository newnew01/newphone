@extends('app')
@section('page-header','รายการผู้ใช้งาน')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">ผู้ใช้งาน</li>
    <li class="breadcrumb-item active">รายการผู้ใช้งาน</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card card-outline-inverse" ng-controller="ProductListController">
            <div class="card-header">
                <a  href="/user/new" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right"><i class="mdi mdi-account-plus"></i> เพิ่มผู้ใช้งาน</a>
                <h4 class="m-b-0 text-white">รายการผู้ใช้งาน</h4>
            </div>
            <div class="card-body">
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">#</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">รูป</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">ชื่อ</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">รหัสพนักงาน</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">เบอร์โทร</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">อีเมล์</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td class="title"><a class="link" href="javascript:void(0)">{{++$index}}</a></td>
                            <td>{{$user->avatar == null ? 'NULL':'OK'}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->mobile_no}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a  href="/user/{{$user->id}}" class="btn waves-effect waves-light btn-xs btn-warning">รายละเอียด</a>
                                <a  href="/user/edit/{{$user->id}}" class="btn waves-effect waves-light btn-xs btn-info">แก้ไข</a>
                                <a href="/user/delete/{{$user->id}}" class="btn waves-effect waves-light btn-xs btn-danger" onclick="return confirm('ต้องการลบใช่หรือไม่?');">ลบ</a>
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