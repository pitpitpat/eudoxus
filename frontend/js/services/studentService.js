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

		studentServiceFactory.getStudent = function() {
			var endpoint = '/student/read.php';
			var url = $rootScope.eudoxusAPI + endpoint;

			var data = {
				name: "panagiotis",
				surname: "plytas",
				age: 21
			};

			return $http({
				method: "POST",
				url: url,
				dataType: "json",			// Type of data expected from server
				data: data
			});
		};

		return studentServiceFactory;

	});

})();
