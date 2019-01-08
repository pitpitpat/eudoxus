(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclarationLogCtrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.declarations = [];

		/* ================= On start ================= */

		if ($rootScope.isLoggedIn) {
			studentService.getDeclarationsByStudentId($rootScope.user.id).then(function(response) {
				$scope.declarations = response.data;
				$scope.declarations.sort(function(a, b) {
					return b.declaration.semester - a.declaration.semester;
				});
				console.log(response.data);
			});
		}

	});

})();