(function() {

	angular.module('eudoxusApp')
	.controller('studentDeclaration2Ctrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.declarationStep = 2;
		$scope.courses = [];

		$scope.goToDeclaration3 = function() {
			window.location.href = "#!/student/declaration/3";
		}

		$scope.removeBook = function(courseId) {
			delete $rootScope.user.declaration.books[courseId];
		}

		/* ================= On start ================= */

		console.log("student-2");
		console.log($rootScope.user.declaration);

		studentService.getCoursesByDepartmentId($rootScope.user.declaration.departmentId).then(function(responseCourses) {
			$scope.courses = responseCourses.data.courses;
			for (index in $scope.courses) {
				var course = $scope.courses[index];
				course.books = [];
				studentService.getBooksByCourseId(course.id).then(function(responseBooks) {
					console.log(responseBooks.data);
					for (bookIndex in responseBooks.data.books) {
						var book = responseBooks.data.books[bookIndex];
						matchingCourse = $scope.courses.find(function(tmpCourse) {
							return tmpCourse.id === book.course_id;
						});
						matchingCourse.books.push(book)
					}
				});
			}
			console.log($scope.courses);
		});

	});

})();