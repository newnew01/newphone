app.directive('tooltip', function(){
    return {
        restrict: 'A',
        link: function(scope, element, attrs){
            $(element).hover(function(){
                // on mouseenter
                $(element).tooltip('show');
            }, function(){
                // on mouseleave
                $(element).tooltip('hide');
            });
        }
    };
});

app.controller('SaleNewOrderController', function($scope,$sce,$http) {
    $scope.barcode_input = '';
    $scope.products = [];
    $scope.product_tmp = null;
    $scope.imei_sn_input = '';
    $scope.amount_barcode = '';
    $scope.amount = '';
    $scope.source_branch = source_branch;
    $scope.discount = [];
    $scope.free_gift = [];

    $scope.getTotal = function(){
        var total = 0;
        for(var i = 0; i < $scope.products.length; i++){
            var product = $scope.products[i];
            //alert($scope.discount[i]);
            if($scope.discount[i] == null)
                $scope.discount[i] = 0;
            //alert($scope.free_gift[i]);
            if(!$scope.free_gift[i])
                total += (product.price * product.count)-$scope.discount[i];

        }
        return total;
    }

    $scope.getTotalDiscount = function(){
        var total = 0;

        var length= 0;
        for(var key in $scope.discount) {
            if($scope.discount.hasOwnProperty(key)){
                length++;
            }
        }

        //alert($scope.discount[0]);
        for(var i=0;i < length;i++){
            //alert($scope.discount);
            var discount = $scope.discount[i];
            if(discount == null)
                discount = 0;
            //alert($scope.free_gift[i]);
            total += parseInt(discount);

        }
        return parseInt(total);
    }


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
                        isInList =false;
                        for (i = 0; i < $scope.products.length; ++i) {
                            //alert(result.id+' '+$scope.products[i].id);
                            if(result.id == $scope.products[i].id){
                                $scope.products[i].count++;
                                isInList = true;
                                break;
                            }
                        }
                        if(!isInList){
                            $scope.products.push({'id':result.id,'product_name':result.product_name,'description':result.description,'brand':result.brand.brand_name,'model':result.model,'type_sn':result.type_sn,'sn':'','count':1,'price':result.price});

                        }


                    }
                    $scope.barcode_input = '';


                }
            });
        }

        document.getElementById('barcode_input').value = '';
        document.getElementById('barcode_input').focus();

    }

    $scope.removeFromList = function (index) {
        $scope.products.splice(index, 1 );
        $scope.discount.splice(index,1);
        $scope.free_gift.splice(index,1);
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
            $http.get("/service-product/find-productsn-in-branch/"+$scope.product_tmp.id+','+$scope.imei_sn_input+','+$scope.source_branch).then(function (response) {
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
                        $scope.products.push({'id':$scope.product_tmp.id,'product_name':$scope.product_tmp.product_name,'description':$scope.product_tmp.description,'brand':$scope.product_tmp.brand.brand_name,'model':$scope.product_tmp.model,'type_sn':$scope.product_tmp.type_sn,'sn':$scope.product_tmp.sn,'count':1,'ais_deal':$scope.product_tmp.ais_deal,'price':$scope.product_tmp.price});
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
                            isInList =false;
                            for (i = 0; i < $scope.products.length; ++i) {
                                //alert(result.id+' '+$scope.products[i].id);
                                if(result.id == $scope.products[i].id){
                                    $scope.products[i].count = parseInt($scope.products[i].count) + parseInt($scope.amount);
                                    isInList = true;
                                    break;
                                }
                            }
                            if(!isInList){
                                $scope.products.push({'id':result.id,'product_name':result.product_name,'description':result.description,'brand':result.brand.brand_name,'model':result.model,'sn':'','count':$scope.amount});

                            }

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
        //$('.tooltip_description').tooltip();
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
