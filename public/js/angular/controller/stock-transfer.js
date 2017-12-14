app.controller('StockTransferController', function($scope,$sce,$http) {
   $scope.barcode_input = '';
   $scope.products = [];
   $scope.product_tmp = null;
   $scope.imei_sn_input = '';
   $scope.amount_barcode = '';
   $scope.amount = '';
   $scope.source_branch = source_branch;


   $scope.addProductToList = function () {
       if($scope.barcode_input == '') {
           alert('กรุณากรอกบาร์โค้ด');
       }else{
           $http.get("/service-product/find-by-barcode/"+$scope.barcode_input).then(function (response) {
               result = response.data;
               if(result == 'null'){
                   alert('ไม่พบสินค้านี้หรือไม่มีบาร์โค้ดนี้ในระบบ!!!');
               }else{
                   if(result.type_sn == 1){
                       $scope.product_tmp = result;
                       $('#modal_sn').modal('show');
                   }else{



                       $http.get("/service-product/find-product-amount-in-branch/"+result.id+','+$scope.source_branch).then(function (response) {
                           result2 =  response.data;
                           if(result2 == 'null'){
                               alert('ไม่มีสินค้านี้ในสาขาของคุณ');
                           }else{

                               isInList =false;
                               for (i = 0; i < $scope.products.length; ++i) {
                                   //alert(result.id+' '+$scope.products[i].id);
                                   if(result.id == $scope.products[i].id){
                                       if($scope.products[i].count >= result2.amount){
                                           alert('สินค้าคงเหลือในสาขาไม่เพียงพอ (คงเหลือ: '+result2.amount+')');
                                       }else{
                                           $scope.products[i].count++;
                                       }
                                       isInList = true;
                                       break;
                                   }
                               }
                               if(!isInList){
                                   if(result2.amount >= 1){
                                       $scope.products.push({'id':result.id,'product_name':result.product_name,'description':result.description,'brand':result.brand.brand_name,'model':result.model,'type_sn':result.type_sn,'sn':'','count':1});
                                   }else{
                                       alert('สินค้าคงเหลือในสาขาไม่เพียงพอ (คงเหลือ: '+result2.amount+')');
                                   }
                               }

                           }
                       });




                   }
                   $scope.barcode_input = '';

               }
           });
       }

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
           $http.get("/service-product/find-productsn-by-id-sn/"+$scope.product_tmp.id+','+$scope.imei_sn_input).then(function (response) {
               if(response.data != 'null' && response.data.branch_id == $scope.source_branch){
                   $scope.product_tmp.sn = $scope.imei_sn_input;
                   $scope.product_tmp.ais_deal = response.data.ais_deal;
                   isInList =false;

                   for (i = 0; i < $scope.products.length; i++) {
                       //alert(result.id+' '+$scope.products[i].id);
                       if($scope.product_tmp.id == $scope.products[i].id && $scope.product_tmp.sn == $scope.products[i].sn){
                           isInList = true;
                           break;
                       }
                   }

                   if(!isInList){
                       $scope.products.push({'id':$scope.product_tmp.id,'product_name':$scope.product_tmp.product_name,'description':$scope.product_tmp.description,'brand':$scope.product_tmp.brand.brand_name,'model':$scope.product_tmp.model,'type_sn':$scope.product_tmp.type_sn,'sn':$scope.product_tmp.sn,'count':1,'ais_deal':$scope.product_tmp.ais_deal});
                       $scope.imei_sn_input = '';
                       $('#modal_sn').modal('hide');
                       //$scope.$apply();
                   } else {
                       alert('มี IMEI/SN นี้อยู่ในรายการแล้ว');
                       $scope.imei_sn_input = '';
                       document.getElementById('imei_sn_input').focus();

                   }
               }
               else{
                   alert('ไม่มี SN/IMEI ในระบบ หรือในสาขาของคุณ');
                   $scope.imei_sn_input = '';
                   document.getElementById('imei_sn_input').focus();
               }
           });




           //alert($scope.imei_sn_input);

       }

   }

   $scope.addProductToListAmount = function () {
       if($scope.amount == ''){
            alert('กรุณาใส่จำนวน!!');
           document.getElementById('amount').value = '';
           document.getElementById('amount').focus();
       }else{
           if($scope.amount_barcode == ''){
               alert('กรุณากรอกบาร์โค้ด');
               document.getElementById('amount_barcode').value = '';
               document.getElementById('amount_barcode').focus();
           }else{
               $http.get("/service-product/find-by-barcode/"+$scope.amount_barcode).then(function (response) {
                   result = response.data;
                   if(result == 'null'){
                       alert('ไม่พบสินค้านี้หรือไม่มีบาร์โค้ดนี้ในระบบ!!!');
                       document.getElementById('amount_barcode').value = '';
                       document.getElementById('amount_barcode').focus();
                   }else{
                       if(result.type_sn == 1){
                           alert('ไม่สามารถเพิ่มจำนวนได้เนื่องจากเป็นสินค้ามี IMEI/SN')
                           document.getElementById('amount_barcode').value = '';
                           document.getElementById('amount_barcode').focus();
                       }else{

                           $http.get("/service-product/find-product-amount-in-branch/"+result.id+','+$scope.source_branch).then(function (response) {
                               result2 =  response.data;
                               if(result2 == 'null'){
                                   alert('ไม่มีสินค้านี้ในสาขาของคุณ');
                               }else{

                                   isInList =false;
                                   for (i = 0; i < $scope.products.length; ++i) {
                                       //alert(result.id+' '+$scope.products[i].id);
                                       if(result.id == $scope.products[i].id){
                                           if(result2.amount >= (parseInt($scope.products[i].count)+parseInt($scope.amount))){
                                               $scope.products[i].count = parseInt($scope.products[i].count) + parseInt($scope.amount);
                                           }else{
                                               alert('สินค้าคงเหลือในสาขาไม่เพียงพอ (คงเหลือ: '+result2.amount+')');
                                               //alert($scope.products[i].count+' '+$scope.amount);
                                           }
                                           isInList = true;
                                           break;
                                       }
                                   }
                                   if(!isInList){
                                       if(result2.amount >= $scope.amount){
                                           $scope.products.push({'id':result.id,'product_name':result.product_name,'description':result.description,'brand':result.brand.brand_name,'model':result.model,'sn':'','count':$scope.amount});
                                       }else{
                                           alert('สินค้าคงเหลือในสาขาไม่เพียงพอ (คงเหลือ: '+result2.amount+')');
                                       }
                                   }

                               }
                           });

                           $('#modal_amount_barcode').modal('hide');


                       }

                   }
               });
           }
       }
   }

   $scope.checkAmount = function () {
       if($scope.amount == '') {
           alert('กรุณากรอกจำนวน');
       }else {
           document.getElementById('amount_barcode').focus();
       }
   }

   $scope.setSourceBranch = function (branch_id) {
       //$scope.source_branch = branch_id;
       alert(branch_id);
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

    $('#modal_amount_barcode').on('shown.bs.modal', function (e) {
        document.getElementById('amount').focus();
        $scope.$apply();

    });

    $('#modal_amount_barcode').on('hidden.bs.modal', function (e) {
        document.getElementById('amount').value = '';
        document.getElementById('amount_barcode').value = '';
        setTimeout(function(){ document.getElementById('barcode_input').focus(); }, 100);
        //document.getElementById('barcode_input').focus();
        $scope.$apply();
    });

});
