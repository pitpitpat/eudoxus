(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclarationShowCtrl', function($rootScope, $scope, $routeParams, generalUtility, studentService) {

		$scope.declaration = null;

		/* ================= On start ================= */

		studentService.getDeclarationById($routeParams.ID).then(function(response) {
			console.log(response.data);
			$scope.declaration = response.data;
			$rootScope.declarationCode = $scope.declaration.code;
			studentService.getBooksByDeclarationId($scope.declaration.id).then(function(response) {
				console.log(response.data);
				$scope.declaration.books = response.data.books;
			});
		});

	});

})();