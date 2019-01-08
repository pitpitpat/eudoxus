(function() {

	angular.module('eudoxusApp')
	.factory('generalUtility', function($rootScope, $location, $http, studentService) {

		var generalUtilityFactory = {};

		generalUtilityFactory.initUser = function() {
			$rootScope.isLoggedIn = false;
			$rootScope.user = {
				id: null,
				name: null,
				surname: null,
				departmentId: null,
				code: null,
				email: null,
				phone: null,
				semester: null,
				declaration: {
					universityId: null,
					departmentId: null,
					books: {}
				},
				university: null,
				department: null
			};
		}

		generalUtilityFactory.initApp = function(){
			var xamppDirectory = "/eudoxus";							// Name of directory in xampp/htdocs/
			$rootScope.eudoxusAPI = "http://localhost" + xamppDirectory + "/backend/api/endpoints";

			$rootScope.isLoggedIn = false;
			$rootScope.user = {
				id: null,
				name: null,
				surname: null,
				departmentId: null,
				code: null,
				email: null,
				phone: null,
				semester: null,
				declaration: {
					universityId: null,
					departmentId: null,
					books: {}
				},
				university: null,
				department: null
			};
		};

		generalUtilityFactory.getUser = function(redirect){
			return studentService.getMe().then(function(response) {
				$rootScope.isLoggedIn = true;
				$rootScope.user.id = response.data.id
				$rootScope.user.name = response.data.name
				$rootScope.user.surname = response.data.surname
				$rootScope.user.departmentId = response.data.department_id
				$rootScope.user.code = response.data.code
				$rootScope.user.email = response.data.email
				$rootScope.user.phone = response.data.phone
				$rootScope.user.semester = response.data.semester

				return studentService.getUniversityByStudentId($rootScope.user.id).then(function(response) {
					$rootScope.user.university = response.data;
					$rootScope.user.declaration.universityId = $rootScope.user.university.id;

					return studentService.getDepartmentById($rootScope.user.departmentId).then(function(response) {
						$rootScope.user.department = response.data;
						delete $rootScope.user.departmentId;
						$rootScope.user.declaration.departmentId = $rootScope.user.department.id;

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

		generalUtilityFactory.keyLength = function(obj) {
			if (!obj) { return 0; }
			return Object.keys(obj).length;
		}

		generalUtilityFactory.redirectToPreviousStep = function(step) {
			if (step === 2) {
				if (!$rootScope.user.declaration.universityId || !$rootScope.user.declaration.departmentId) {
					window.location.href = "#!/student/declaration/1";
				}
			}
			else if (step === 3) {
				if ($rootScope.keyLength($rootScope.user.declaration.books) === 0) {
					window.location.href = "#!/student/declaration/2";
				}
			}
			else if (step === 4) {
				if ($rootScope.keyLength($rootScope.user.declaration.books) === 0) {
					window.location.href = "#!/student/declaration/2";
				}
			}
		}

		generalUtilityFactory.redirectToStudentHome = function() {
			window.location.href = "#!/student/home";
		}

		generalUtilityFactory.logout = function() {
			delete localStorage.eudoxusJWT;
			generalUtilityFactory.initUser();
			location.reload();
		};

		return generalUtilityFactory;

	});

})();
