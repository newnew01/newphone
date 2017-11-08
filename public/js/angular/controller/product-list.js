app.controller('ProductListController', function($scope,$http) {
    $scope.product_modal = '';
    $scope.viewImage = function (id) {
        //alert(id);
        $http.get("/service-product/find-by-id/"+id)
            .then(function(response) {
                if(response.data == 'null'){
                    alert("ไม่พบสินค้าในระบบ!!");
                }else{
                    $scope.product_modal = response.data;


                    $('#viewImageModal').modal('show');
                    //$scope.$apply();

                }

            });
    }
});