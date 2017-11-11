app.controller('StockInController', function($scope,$sce,$http) {
   $scope.barcode_input = '';
   $scope.products = [];
   $scope.product_tmp = null;
    $scope.imei_sn_input = '';

   $scope.addProductToList = function () {
       $http.get("/service-product/find-by-barcode/"+$scope.barcode_input).then(function (response) {
           result = response.data;
           if(result == 'null'){
               alert('ไม่พบสินค้านี้หรือไม่มีบาร์โค้ดนี้ในระบบ!!!');
           }else{
               if(result.type_sn == 1){
                   $scope.product_tmp = result;
                   $('#modal_sn').modal('show');
               }else{
                   isInList =false;
                   for (i = 0; i < $scope.products.length; ++i) {
                       //alert(result.id+' '+$scope.products[i].id);
                       if(result.id == $scope.products[i].id){
                           $scope.products[i].count++;
                           isInList = true;
                           break;
                       }
                   }
                   if(!isInList)
                       $scope.products.push({'id':result.id,'product_name':result.product_name,'description':result.description,'brand':result.brand.brand_name,'model':result.model,'sn':'','count':1});

               }

           }
       });
       document.getElementById('barcode_input').value = '';
       document.getElementById('barcode_input').focus();

   }

   $scope.removeFromList = function (index) {
       $scope.products.splice( index, 1 );
       document.getElementById('barcode_input').value = '';
       document.getElementById('barcode_input').focus();
   }

   $scope.clearList = function () {
       if(confirm('ต้องการเคลียร์รายการ?'))
           $scope.products = [];

       document.getElementById('barcode_input').value = '';
       document.getElementById('barcode_input').focus();
   }

   $scope.addProductToListSN = function () {
       if($scope.imei_sn_input == ''){
           alert('กรุณากรอก IMEI/SN');
           document.getElementById('imei_sn_input').focus();
       } else {
           $scope.product_tmp.sn = $scope.imei_sn_input;
           isInList =false;
           for (i = 0; i < $scope.products.length; ++i) {
               //alert(result.id+' '+$scope.products[i].id);
               if($scope.product_tmp.id == $scope.products[i].id && $scope.product_tmp.sn == $scope.products[i].sn){
                   isInList = true;
                   break;
               }
           }
           if(!isInList){
               $scope.products.push({'id':$scope.product_tmp.id,'product_name':$scope.product_tmp.product_name,'description':$scope.product_tmp.description,'brand':$scope.product_tmp.brand.brand_name,'model':$scope.product_tmp.model,'sn':$scope.product_tmp.sn,'count':1});
               $scope.product_tmp = null
               $('#modal_sn').modal('hide');
           } else {
               alert('มี IMEI/SN นี้อยู่ในรายการแล้ว');
               $scope.imei_sn_input = '';
               document.getElementById('imei_sn_input').focus();

           }

           //alert($scope.imei_sn_input);

       }

   }

    $('#modal_sn').on('shown.bs.modal', function (e) {
        document.getElementById('imei_sn_input').focus();
        $scope.$apply();

    });

    $('#modal_sn').on('hidden.bs.modal', function (e) {
        document.getElementById('imei_sn_input').value = '';
        document.getElementById('barcode_input').focus();
        $scope.$apply();
    });

});
