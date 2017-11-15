app.controller('ProductBarcodeSearchController', function($scope,$sce,$http) {
    $scope.product_ = {"image":"/assets/images/no-image.png"};
    $scope.input_barcode_check = '';


    $scope.getProductInfo = function () {
        $scope.product_ = '';
        if($scope.input_barcode_check == ''){
            alert('กรุณากรอกบาร์โค้ด')
            document.getElementById('input_barcode_check').focus();
        }else {
            $http.get("/service-product/find-by-barcode/"+$scope.input_barcode_check)
                .then(function(response) {
                    if(response.data == 'null'){
                        alert("ไม่พบสินค้าในระบบ!!");
                    }else{

                        if(response.data.image == null)
                            response.data.image = '/assets/images/no-image.png';

                        $scope.product_ = response.data;
                    }

                });
        }
        $scope.input_barcode_check = '';
        $scope.product_ = {"image":"/assets/images/no-image.png"};
        document.getElementById('input_barcode_check').focus();
        //document.getElementById('input_barcode_check').reset();
    }

    $scope.openBarcodeSearch = function () {
        $scope.input_barcode_check = '';
        $scope.product_ = {"image":"/assets/images/no-image.png"};
        setTimeout(function () {
            document.getElementById('input_barcode_check').focus();
        },100);

    }

});

