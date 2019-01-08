(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclarationLogCtrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.declarations = [];

		/* ================= On start ================= */

		if ($rootScope.isLoggedIn) {
			studentService.getDeclarationsByStudentId($rootScope.user.id).then(function(response) {
				$scope.declarations = response.data;
				$scope.declarations.sort(function(a, b) {
					console.log("A", a);
					console.log("B", b);
					return b.declaration.semester - a.declaration.semester;
				});
				console.log(response.data);
			});
		}

	});

})();