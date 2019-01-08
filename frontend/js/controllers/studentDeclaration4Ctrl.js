(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclaration4Ctrl', function($rootScope, $scope, $anchorScroll, generalUtility, studentService) {

		$anchorScroll();

		$scope.declarationStep = 4;

		$scope.createDeclaration = function() {
			studentService.createDeclaration().then(function(response) {
				console.log(response.data);
				$rootScope.declarationCode = "6542888895241";
			});
		}

		/* ================= On start ================= */

	});

})();