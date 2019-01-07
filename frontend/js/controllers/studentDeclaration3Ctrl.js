(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclaration3Ctrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.declarationStep = 3;

		$scope.goToDeclaration4 = function() {
			window.location.href = "#!/student/declaration/final";
		}

		/* ================= On start ================= */

		console.log("student-3");

		console.log($rootScope.user.declaration);

		for (courseId in $rootScope.user.declaration.books) {
			var book = $rootScope.user.declaration.books[courseId];
			book.takeMethod = "store";
		}


	});

})();