@extends('app')
@section('page-header','แก้ไขสินค้า')
@section('page-header-right')
    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
    <li class="breadcrumb-item">สินค้า</li>
    <li class="breadcrumb-item active">แก้ไขสินค้า</li>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row" ng-app="newphoneApp">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-b-0">
                <form class="form" method="post" action="/product/edit/{{$product->id}}" id="editProductForm">

                <div class="row">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="card card-outline-inverse">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">รายละเอียดสินค้า</h4>
                                </div>
                                <div class="card-body">

                                        <div class="switch">
                                            <label>เปิดใช้ SN / IMEI ?
                                                <input type="checkbox" name="type_sn" {{$product->type_sn == 1 ? "checked":""}}><span class="lever switch-col-red"></span>
                                            </label>
                                        </div>

                                        <div class="form-group p-t-20">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-cube-send"></i></div>
                                                <select class="form-control custom-select" name="category_id">
                                                    <option value="-1">[หมวดหมู่]</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? "selected":""}}>{{$category->cate_name}}</option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-btn">
                                                <a  href="/product-catebrand"   class="btn waves-effect waves-light btn-success"><i class="mdi mdi-library-plus"></i> เพิ่ม</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-cellphone"></i></div>
                                                <select class="form-control custom-select" name="brand_id">
                                                    <option value="-1">[ยี่ห้อ]</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? "selected":""}}>{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="input-group-btn">
                                                    <a  href="/product-catebrand"   class="btn waves-effect waves-light btn-success"><i class="mdi mdi-library-plus"></i> เพิ่ม</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                                                <input type="text" class="form-control" name="barcode" placeholder="บาร์โค้ด"  value="{{$product->barcode}}" disabled>
                                                <span class="input-group-btn">
                                                    <span class="btn waves-effect waves-light btn-danger">แก้ไขบาร์โค้ด</span>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-tag-text-outline"></i></div>
                                                <input type="text" class="form-control" name="product_name" placeholder="ชื่อสินค้า" value="{{$product->product_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-dns"></i></div>
                                                <input type="text" class="form-control" name="model" placeholder="รุ่น" value="{{$product->model}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-currency-btc"></i></div>
                                                <input type="text" class="form-control" name="price" placeholder="ราคา" value="{{$product->price}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-format-list-bulleted"></i></div>
                                                <input type="text" class="form-control" name="description" placeholder="รายละเอียด" value="{{$product->description}}">
                                            </div>
                                        </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card" ng-controller="ProductListController">
                                <div class="card-body">
                                    <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right" ng-click="startWebcam()" ><i class="mdi mdi-camera"></i> ถ่ายจากกล้อง</button>
                                    <h4 class="card-title" >รูปภาพสินค้า</h4>


                                    <div id="image_input">
                                        <input type="file" name="image" class="dropify" data-height="300" />
                                    </div>
                                    <div id="webcam_input" ng-bind-html="webcam_input">

                                    </div>
                                    <div id="results"></div>




                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 p-b-20">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">บันทึก</button>
                            <a href="/product/list" class="btn btn-inverse waves-effect waves-light">ย้อนกลับ</a>
                        </div>

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

@section('js-head')
    <script type="text/javascript" src="/js/webcam/webcam.min.js"></script>
    <script src="/js/angular/controller/product-new.js"></script>
@endsection

@section('js-bottom')
    <!--Wave Effects -->
    <!--script src="js/waves.js"></script-->
<!--stickey kit -->
    <script src="/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery file upload -->
    <script src="/assets/plugins/dropify/dist/js/dropify.min.js"></script>
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

            /******************************/
            document.getElementById('editProductForm').addEventListener('keypress', function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                }
            });



        });
    </script>

    <script>
        function captureWebcam() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                document.getElementById('webcam_input').innerHTML =
                    '<img src="'+data_uri+'"/>';
            } );
        }

    </script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="/assets/plugins/toast-master/js/jquery.toast.js"></script>

    @include('template.flash-msg');

@endsection

@section('css-head')
    <link rel="stylesheet" href="/assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="/assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/css/colors/blue.css" id="theme" rel="stylesheet">

@endsection