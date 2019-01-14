(function() {

	angular.module('eudoxusApp')
	.controller('secretaryAddBookCtrl', function($rootScope, $scope, secretaryService) {
 
		$scope.courses = $rootScope.secretaryUser.department.courses;
		$scope.inputCode = '';


		$scope.isHidden = true;
		$scope.searchHidden = function(){
			$scope.isHidden = !$scope.isHidden;
		}
		$scope.bookAdded = false;
		$scope.addBook = function() {
			$scope.bookAdded = !$scope.bookAdded;
		}

		$scope.getBookByCode = function(){
			secretaryService.getBookByCode($scope.inputCode).then(function(response){
				$scope.books = response.data.books;
				console.log(response.data);
			});
		}

		/* ================= On start ================= */
		

	});

})();