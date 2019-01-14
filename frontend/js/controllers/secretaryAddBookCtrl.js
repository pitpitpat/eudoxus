(function() {

	angular.module('eudoxusApp')
	.controller('secretaryAddBookCtrl', function($rootScope, $scope, secretaryService) {
 
		$scope.courses = $rootScope.secretaryUser.department.courses;

		$scope.isHidden = true;
		$scope.searchHidden = function(){
			$scope.isHidden = !$scope.isHidden;
		}

		console.log($scope.inputValue);
		$scope.getBookByCode = function(){
			secretaryService.getBookByCode(Number($scope.inputValue)).then(function(response){
				console.log(Number($scope.inputValue));
				$scope.books = response.data.books;
				console.log(response.data);
			});
		}
		/* ================= On start ================= */
		

	});

})();