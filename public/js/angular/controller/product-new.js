app.controller('ProductNewController', function($scope,$sce,$http) {
    $scope.product = {"image":"/assets/images/no-image.png"};
    $scope.barcode_ = '';


    $scope.checkDuplicatedBarcode = function () {
        $http.get("/service-product/find-by-barcode/"+$scope.barcode_)
            .then(function(response) {
                if(response.data != 'null'){
                    $scope.barcode_ = '';
                    alert('ผิดพลาด!! บาร์โค้ดซ้ำในระบบหรือมีสินค้านี้อยู่แล้ว')
                }
            });
    }

    $scope.getGenBarcode = function () {
        $http.get("/service-product/gen-barcode/")
            .then(function(response) {
                $scope.barcode_ = response.data;

            });
    }

    $scope.startWebcam = function(){
        //alert();
        $scope.image_input = "";
        document.getElementById('webcam_input').innerHTML =
            '<div id="webcam"></div>' +
            '<button type="button" class="btn btn-block btn-lg btn-success" onclick="captureWebcam()" ><i class="mdi mdi-camera-iris"> จับภาพ</button>';
        //$scope.webcam_input = $sce.trustAsHtml('<div id="webcam"></div>' +
        //    '<button type="button" class="btn  waves-effect waves-light btn-rounded btn-info pull-right m-t-20" onclick="captureWebcam()" >จับภาพ</button>');
        $('#image_input').html('');

        setTimeout(function(){
            Webcam.set({
                width: 640,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach( '#webcam' );
        }, 1000)




    }



});

