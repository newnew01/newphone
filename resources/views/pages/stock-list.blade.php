@extends('app')
@section('page-header','รายการสต๊อค')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">สต๊อคสินค้า</li>
    <li class="breadcrumb-item active">รายการสต๊อค</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right m-l-5"><i class="mdi mdi-library-plus"></i> รับสินค้าเข้า</button>
                <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-info pull-right"><i class="mdi mdi-library-plus"></i> โอนสินค้า</button>
                <h4 class="m-b-0 text-white">รายการสินค้า</h4>
            </div>
            <div class="card-body">
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead>
                    <tr>
                        <th>เลขที่อ้างอิง</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">รายการ</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">จากสาขา</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">ไปยังสาขา</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">สถานะ</th>
                        <th>วันที่</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stock_reference as $s)
                        <tr>
                            <td class="title">{{sprintf('%06d', $s->id)}}</td>
                            <td>{{$s->ref_type}}</td>
                            <td>{{$s->source_branch}}</td>
                            <td>{{$s->destination_branch}}</td>
                            <td>{{$s->status}}</td>
                            <td>{{Carbon\Carbon::parse($s->created_at)->format('d-m-Y')}}</td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-primary">ภาพสินค้า</button>
                                <button type="button" class="btn waves-effect waves-light btn-xs btn-info">ดู SN/IMEI</button>
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
    <script src="/assets/plugins/tablesaw-master/dist/tablesaw.js"></script>
    <script src="/assets/plugins/tablesaw-master/dist/tablesaw-init.js"></script>
@endsection

@section('css-head')
    <!-- Bootstrap responsive table CSS -->
    <link href="/assets/plugins/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
@endsection