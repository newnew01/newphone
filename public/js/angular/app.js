var app = angular.module('newphoneApp', ['ngSanitize'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});



app.controller('TestController', function($scope,$http) {

});