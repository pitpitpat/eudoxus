(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclaration1Ctrl', function($rootScope, $scope, studentService) {

		$scope.declarationStep = 1;
		$scope.universities = [];

		$scope.getDepartmentsByUniversityId = function() {
			studentService.getDepartmentsByUniversityId($rootScope.user.declaration.universityId).then(function(response) {
				$scope.departments = response.data.departments;
			});
		}

		$scope.goToDeclaration2 = function() {
			window.location.href = "#!/student/declaration/2";
		}

		/* ================= On start ================= */

		console.log("student-1");

		studentService.getAllUniversities().then(function(response) {
			$scope.universities = response.data.universities;
		});

		if ($rootScope.user.declaration.universityId) {
			$scope.getDepartmentsByUniversityId();
		}

	});

})();