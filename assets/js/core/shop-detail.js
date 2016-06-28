var myApp = angular.module('myApp', []);

myApp.controller('MyController', MyController);
console.log("ready");

function MyController ($scope) {   
 

	$scope.initDetails = function(){

		var bicycleID = GetURLParameter('bicycleID');

		 $.ajax({
          type: 'GET',
          url: 'php/test.php?function=getproductdetail&bicycleID='+bicycleID,   
          cache: false,
          async: false,
          dataType: 'json',
          success: function(result){ 
            console.log(result);   
            $scope.data = result.data;  
            $scope.datacolumns = result.supplier_data_columns;
            console.log($scope.datacolumns[27]);   
				console.log($scope.data);  

          } 
        }); 

   } 
}

function GetURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}