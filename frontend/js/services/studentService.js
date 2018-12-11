(function() {

	angular.module('eudoxusApp')
	.factory('studentService', function($rootScope, $http) {

		var studentServiceFactory = {};

		studentServiceFactory.getAllStudents = function() {
			var endpoint = "/student/read.php";
			var url = $rootScope.eudoxusAPI + endpoint;

			return $http({
				method: "GET",
				url: url
			});
		};

		studentServiceFactory.getStudent = function(id) {
			var endpoint = '/student/readOne.php';
			var url = $rootScope.eudoxusAPI + endpoint;

			var params = {
				id: id
			};

			console.log(params);

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		};

		studentServiceFactory.createStudent = function(student) {
			var endpoint = '/student/create.php';
			var url = $rootScope.eudoxusAPI + endpoint;

			var data = {
				department_id: student.departmentId,
				name: student.name,
				surname: student.surname,
				code: student.code,
				password: student.password
			};

			return $http({
				method: "POST",
				url: url,
				dataType: "json",	// Type of data expected from server
				data: data
			});
		};

		return studentServiceFactory;

	});

})();
