@extends('app')
@section('page-header','เพิ่มสินค้า')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">สินค้า</li>
    <li class="breadcrumb-item active">เพิ่มสินค้า</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-b-0">
                <h4 class="card-title">เลือกประเภทสินค้า</h4>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">โทรศัพท์มือถือ</span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">อุปกรณ์เสริมและอื่นๆ</span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home2" role="tabpanel">
                    <div class="p-20">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-outline-inverse">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">รายละเอียดสินค้า</h4></div>
                                    <div class="card-body">
                                        <form class="form p-t-20">
                                            <div class="form-group">
                                                <label for="exampleInputuname">ยี่ห้อ</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="mdi mdi-cellphone"></i></div>
                                                    <select class="form-control custom-select">
                                                        <option value="">Male</option>
                                                        <option value="">Female</option>
                                                    </select>
                                                    <span class="input-group-btn">
                                                    <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><i class="mdi mdi-library-plus"></i> เพิ่ม</button>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">รุ่น</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="mdi mdi-dns"></i></div>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="รุ่น">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">รายละเอียด</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="mdi mdi-format-list-bulleted"></i></div>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="รายละเอียด">
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">รูปภาพสินค้า</h4>
                                        <input type="file" id="input-file-now-custom-2" class="dropify" data-height="300" />

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">บันทึก</button>
                            <button type="submit" class="btn btn-inverse waves-effect waves-light">ยกเลิก</button>
                        </div>


                    </div>
                </div>
                <div class="tab-pane  p-20" id="profile2" role="tabpanel">2</div>
                <div class="tab-pane p-20" id="messages2" role="tabpanel">3</div>
            </div>
        </div>
    </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection

@section('js-bottom')
    <!--Wave Effects -->
        <script src="js/waves.js"></script>
    <!--stickey kit -->
        <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery file upload -->
        <script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script>
        <script>
            $(document).ready(function() {
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove: 'Supprimer',
                        error: 'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element) {
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element) {
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element) {
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e) {
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>

        <!-- ============================================================== -->
        <!-- Style switcher -->
        <!-- ============================================================== -->
        <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
@endsection

@section('css-head')
        <link rel="stylesheet" href="../assets/plugins/dropify/dist/css/dropify.min.css">
@endsection