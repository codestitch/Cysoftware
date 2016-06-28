console.log("ready");

var myApp = angular.module('myApp', ['angularUtils.directives.dirPagination']);
myApp.controller('MyController', MyController);
myApp.controller('OtherController', OtherController);


function MyController ($scope) {   

    $scope.currentPage = 1;
    $scope.pageSize = 9;
    $scope.data = null;
    $scope.filter = {};
  

    $scope.onInit = function(){

        $.ajax({
          type: 'GET',
          url: 'php/test.php?function=getproducts', 
          cache: false,
          async: false,
          dataType: 'json',
          success: function(result){ 
            console.log(result);   
            $scope.data = result.data;  

          } 
        });
    } 

    $scope.getCategories = function () {
        return ($scope.data || []).map(function (w) {
            return w.brand;
        }).filter(function (w, idx, arr) {
            return arr.indexOf(w) === idx;
        });
    };
    
    $scope.filterByCategory = function (data) {
        return $scope.filter[data.brand] || noFilter($scope.filter);
    };
    
    function noFilter(filterObj) {
        for (var key in filterObj) {
            if (filterObj[key]) {
                return false;
            }
        }
        return true;
    }   

    $scope.pageChangeHandler = function(num) {
        console.log('meals page changed to ' + num);
    }; 


}

function OtherController($scope) {
    $scope.pageChangeHandler = function(num) {
      console.log('going to page ' + num);
    };
}


 
