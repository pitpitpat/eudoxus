(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclaration3Ctrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.declarationStep = 3;

		/* ================= On start ================= */

		console.log("student-3");

		console.log($rootScope.user.declaration);


	});

})();