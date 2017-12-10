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
                <a href="/stock/in" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right m-l-5"><i class="mdi mdi-library-plus"></i> รับสินค้าเข้า</a>
                <a href="/stock/transfer" class="btn btn-sm waves-effect waves-light btn-rounded btn-info pull-right"><i class="mdi mdi-library-plus"></i> โอนสินค้า</a>
                <h4 class="m-b-0 text-white">รายการสินค้า</h4>
            </div>
            <div class="card-body">
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead >
                    <tr>
                        <th>เลขที่อ้างอิง</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">รายการ</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">สาขา</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">สถานะ</th>
                        <th>วันที่</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stock_reference as $s)
                        <tr>
                            <td class="title">{{sprintf('%06d', $s->id)}}</td>
                            <td>

                                @if($s->ref_type == 1)
                                <i class="mdi mdi-subdirectory-arrow-right text-primary"></i>
                                @endif
                                @if($s->ref_type == 2)
                                    <i class="mdi mdi-swap-horizontal text-success"></i>
                                @endif
                                @if($s->ref_type == 3)
                                    <i class="mdi mdi-currency-usd text-warning"></i>
                                @endif
                                {{$s->type->type_name}}</td>
                            <td>
                                @if($s->ref_type == 2)
                                    {{$s->sourceBranch->branch_name}} ->
                                @endif
                                {{$s->destinationBranch->branch_name}}
                            </td>
                            <td>{{$s->status->status_name}}</td>
                            <td>{{Carbon\Carbon::parse($s->created_at)->format('d-m-Y')}}</td>
                            <td>
                                <a href="/stock/list/{{sprintf('%06d',$s->id)}}" class="btn waves-effect waves-light btn-xs btn-primary">รายละเอียด</a>
                            </td>
                        </tr>
                    @endforeach

                    @if(count($stock_reference) == 0)
                        <tr>
                            <td colspan="6" class="text-center">ไม่มีข้อมูล</td>
                        </tr>
                    @endif


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