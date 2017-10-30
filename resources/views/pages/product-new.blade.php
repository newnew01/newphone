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
                <form class="form" method="post" action="/product-new">

                <div class="row">

                        {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="card card-outline-inverse">
                                <div class="card-header">
                                    <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-success pull-right" data-toggle="modal" data-target="#checkProduct" data-whatever="@mdo" ><i class="mdi mdi-library-plus"></i> ตรวจสอบสินค้า</button>
                                    <h4 class="m-b-0 text-white">รายละเอียดสินค้า</h4>
                                </div>
                                <div class="card-body">

                                        <div class="switch">
                                            <label>เปิดใช้ SN / IMEI ?
                                                <input type="checkbox" name="type_sn"><span class="lever switch-col-red"></span>
                                            </label>
                                        </div>

                                        <div class="form-group p-t-20">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-cube-send"></i></div>
                                                <select class="form-control custom-select" name="category_id">
                                                    <option value="-1">[หมวดหมู่]</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->cate_name}}</option>
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
                                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                                                <input type="text" class="form-control" name="barcode" placeholder="บาร์โค้ด">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-tag-text-outline"></i></div>
                                                <input type="text" class="form-control" name="product_name" placeholder="ชื่อสินค้า">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-dns"></i></div>
                                                <input type="text" class="form-control" name="model" placeholder="รุ่น">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-currency-btc"></i></div>
                                                <input type="text" class="form-control" name="price" placeholder="ราคา">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-format-list-bulleted"></i></div>
                                                <input type="text" class="form-control" name="description" placeholder="รายละเอียด">
                                            </div>
                                        </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">รูปภาพสินค้า</h4>
                                    <input type="file" name="image" class="dropify" data-height="300" />

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 p-b-20">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">บันทึก</button>
                            <button class="btn btn-inverse waves-effect waves-light">ยกเลิก</button>
                        </div>

                </div>
                </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="checkProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">ตรวจสอบสินค้า</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                    <div class="modal-body" ng-app="newphoneApp" ng-controller="findProductByBarcode">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="mdi mdi-barcode"></i></div>
                            <input type="text" class="form-control" name="barcode_check" id="input_barcode_check" placeholder="บาร์โค้ด" ng-model="barcode">
                            <span class="input-group-btn">
                                <button ng-click="getProductInfo()"   class="btn waves-effect waves-light btn-success">ตรวจสอบ</button>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table m-t-10">
                                    <tbody>
                                    <tr>
                                        <td width="100px" bgcolor="#d3d3d3"><b>ชื่อสินค้า</b></td>
                                        <td><% product.product_name %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">หมวดหมู่</td>
                                        <td><% product.cate_name %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">ยี่ห้อ</td>
                                        <td><% product.brand_name %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">รุ่น</td>
                                        <td><% product.model %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">ราคา</td>
                                        <td><% product.price %></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#d3d3d3">รายละเอียด</td>
                                        <td><% product.description %></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="p-t-20 p-l-20">
                                    <img src="../assets/images/users/1.jpg" width="80%">
                                </div>
                            </div>


                        </div>

                    </div>
                <script>
                    app.controller('findProductByBarcode', function($scope,$http) {
                        $scope.product = '';

                        $scope.getProductInfo = function () {
                            $http.get("/service-product/find-by-barcode/"+$scope.barcode)
                                .then(function(response) {
                                    $scope.product = response.data;
                                });
                        }
                    });
                </script>
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
    <!--script src="js/waves.js"></script-->
<!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery file upload -->
    <script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>


        $('#checkProduct').on('shown.bs.modal', function (e) {
            document.getElementById('input_barcode_check').focus();
        })

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

    <script src="../assets/plugins/toast-master/js/jquery.toast.js"></script>

    @include('template.flash-msg');

@endsection

@section('css-head')
    <link rel="stylesheet" href="../assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

@endsection