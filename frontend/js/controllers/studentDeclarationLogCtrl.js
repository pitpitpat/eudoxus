(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclarationLogCtrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.declarations = [];

		/* ================= On start ================= */

		studentService.getDeclarationsByStudentId($rootScope.user.id).then(function(response) {
			$scope.declarations = response.data;
			$scope.declarations.reverse();
			console.log(response.data);
		});

	});

})();