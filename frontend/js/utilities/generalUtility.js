(function() {

	angular.module('eudoxusApp')
	.factory('generalUtility', function($rootScope, $location, $http, studentService, secretaryService) {

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

		generalUtilityFactory.initSecretaryUser = function() {
			$rootScope.secretLoggedIn = false;
			$rootScope.secretaryUser = {
				id: null,
				departmentId: null,
				name: null,
				surname: null,
				username: null,
				email: null,
				personalEmail: null,
				phone: null,
				personalPhone: null,
				declaration: {
					universityId: null,
					departmentId: null,
					books: {}
				},
				university: null,
				department: {
					name: null,
					city: null,
					postalcode: null,
					address: null,
					courses: {}
				}
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

			$rootScope.secretLoggedIn = false;
			$rootScope.secretaryUser = {
				id: null,
				departmentId: null,
				name: null,
				surname: null,
				username: null,
				email: null,
				personalEmail: null,
				phone: null,
				personalPhone: null,
				declaration: {
					universityId: null,
					departmentId: null,
					books: {}
				},
				university: null,
				department: {
					name: null,
					city: null,
					postalcode: null,
					address: null,
					courses: {}
				}
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

		generalUtilityFactory.getSecretaryUser = function(redirect){
			return secretaryService.getMe().then(function(response) {
				$rootScope.secretLoggedIn = true;
				$rootScope.secretaryUser.id = response.data.id
				$rootScope.secretaryUser.name = response.data.name
				$rootScope.secretaryUser.surname = response.data.surname
				$rootScope.secretaryUser.username = response.data.username
				$rootScope.secretaryUser.departmentId = response.data.department_id
				$rootScope.secretaryUser.email = response.data.email
				$rootScope.secretaryUser.phone = response.data.phone
				$rootScope.secretaryUser.personalEmail = response.data.personalEmail
				$rootScope.secretaryUser.personalPhone = response.data.personalPhone

				return secretaryService.getDepartmentById($rootScope.secretaryUser.departmentId).then(function(response) {
					$rootScope.secretaryUser.department.name = response.data.name;

					return secretaryService.getCoursesByDepartmentId($rootScope.secretaryUser.departmentId).then(function(response) {
						$rootScope.secretaryUser.department.courses = response.data.courses;
						//console.log(response);
						//console.log($rootScope.secretaryUser);
						if (redirect) {
							if ($rootScope.previousUrl) {
								window.location.href = "#!" + $rootScope.previousUrl;
							} else {
								window.location.href = "#!/home";
							}
						}
					});
					//console.log(response);
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

		generalUtilityFactory.redirectToSecretaryHome = function() {
			window.location.href = "#!/secretary/home";
		}

		generalUtilityFactory.logout = function() {
			delete localStorage.eudoxusJWT;
			generalUtilityFactory.initUser();
			generalUtilityFactory.initSecretaryUser();
			location.reload();
		};

		return generalUtilityFactory;

	});

})();
