var app = angular.module('newphoneApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.directive('focusOn', function() {
    return function(scope, elem, attr) {
        scope.$on(attr.focusOn, function(e) {
            elem[0].focus();
        });
    };
});


app.controller('ProductNewController', function($scope,$http) {
    $scope.product = '';
    $scope.barcode = '';
    $scope.barcode_ = '';

    $scope.getProductInfo = function () {
        $scope.product = '';
        $http.get("/service-product/find-by-barcode/"+$scope.barcode)
            .then(function(response) {
                if(response.data == 'null'){
                    alert("ไม่พบสินค้าในระบบ!!");
                }else{
                    $scope.product = response.data;
                }

            });
        $scope.barcode = null;
        //document.getElementById('input_barcode_check').reset();
    }

    $scope.checkDuplicatedBarcode = function () {
        $http.get("/service-product/find-by-barcode/"+$scope.barcode_)
            .then(function(response) {
                if(response.data != 'null'){
                    $scope.barcode_ = '';
                    alert('ผิดพลาด!! บาร์โค้ดซ้ำในระบบหรือมีสินค้านี้อยู่แล้ว')
                }
            });
    }


    $('#checkProduct').on('shown.bs.modal', function (e) {
        document.getElementById('input_barcode_check').focus();
        $scope.$apply();

    });

    $('#checkProduct').on('hidden.bs.modal', function (e) {
        $scope.product = '';
        $scope.barcode = '';
        $scope.$apply();
    });



});
