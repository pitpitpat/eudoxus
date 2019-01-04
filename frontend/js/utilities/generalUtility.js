(function() {

	angular.module('eudoxusApp')
	.factory('generalUtility', function($rootScope, $location, $http, studentService) {

		var generalUtilityFactory = {};

		generalUtilityFactory.initApp = function(){
			var xamppDirectory = "/eudoxus";							// Name of directory in xampp/htdocs/
			$rootScope.eudoxusAPI = "http://localhost" + xamppDirectory + "/backend/api/endpoints";

			$rootScope.user = null;
		};

		generalUtilityFactory.getUser = function(redirect){
			studentService.getMe().then(function(response) {
				$rootScope.user = {
					id: response.data.student.id,
					name: response.data.student.name,
					surname: response.data.student.surname,
					departmentId: response.data.student.department_id,
					code: response.data.student.code,
					email: response.data.student.email,
					phone: response.data.student.phone
				};
				studentService.getUniversityByStudentId($rootScope.user.id).then(function(response) {
					$rootScope.user.university = response.data.university;
					studentService.getDepartmentById($rootScope.user.departmentId).then(function(response) {
						$rootScope.user.department = response.data.department;
						delete $rootScope.user.departmentId;

						console.log($rootScope.user);

						if (redirect) {
							if ($rootScope.previousUrl) {
								window.location.href = "#!" + $rootScope.previousUrl;
							} else {
								window.location.href = "#!/home";
							}
						}
					});
				});
			});
		};

		generalUtilityFactory.setJWT = function(token) {
			localStorage.eudoxusJWT = token;
			$http.defaults.headers.common.Authorization = localStorage.eudoxusJWT;
		}

		generalUtilityFactory.goToLogin = function() {
			$rootScope.previousUrl = $location.path();
			console.log($rootScope.previousUrl);
			window.location.href = "#!/login";
		}

		return generalUtilityFactory;

	});

})();
