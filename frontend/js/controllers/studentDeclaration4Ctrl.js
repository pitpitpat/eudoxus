(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclaration4Ctrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.declarationStep = 4;

		$scope.createDeclaration = function() {
			studentService.createDeclaration().then(function(response) {
				console.log(response.data);
			});
		}

		/* ================= On start ================= */

		console.log("student-final");

	});

})();