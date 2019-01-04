(function() {

	angular.module('eudoxusApp')
	.factory('studentService', function($rootScope, $http) {

		var studentServiceFactory = {};

		studentServiceFactory.login = function(credentials) {
			var endpoint = "/student/login";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			data = {
				code: credentials.code,
				password: credentials.password
			};

			return $http({
				method: "POST",
				url: url,
				data: data
			});
		};

		studentServiceFactory.getMe = function() {
			var endpoint = "/student/readMe";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			return $http({
				method: "POST",
				url: url
			});
		};

		studentServiceFactory.getAllStudents = function() {
			var endpoint = "/student/read";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			return $http({
				method: "GET",
				url: url
			});
		};

		studentServiceFactory.getStudent = function(id) {
			var endpoint = '/student/readOne';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				id: id
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		};

		studentServiceFactory.createStudent = function(student) {
			var endpoint = '/student/create';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

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
				data: data
			});
		};

		studentServiceFactory.getDepartmentById = function(departmentId) {	// make by student
			var endpoint = '/department/readOne';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				id: departmentId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.getUniversityByStudentId = function(studentId) {
			var endpoint = '/university/readByStudent';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				studentId: studentId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		return studentServiceFactory;

	});

})();
