(function() {

	angular.module('eudoxusApp')
	.controller('secretaryAddBookCtrl', function($rootScope, $scope, secretaryService) {

		$scope.courses = $rootScope.secretaryUser.department.courses;
		$scope.inputCode = '';
		$scope.bookAdded = false;
		$scope.displayedSearchInput = null;

		$scope.searchShow = function(index){
			$scope.displayedSearchInput = index;
		}

		$scope.addBook = function() {
			$scope.bookAdded = !$scope.bookAdded;
		}

		$scope.getBookByCode = function(){
			secretaryService.getBookByCode($scope.inputCode).then(function(response){
				$scope.books = response.data.books;
			});
		}

		/* ================= On start ================= */

	});

})();