(function() {

	angular.module('eudoxusApp')
	.factory('secretaryService', function($rootScope, $http) {

		var secretaryServiceFactory = {};

		secretaryServiceFactory.login = function(credentials) {
			var endpoint = "/secretary/login";
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

		secretaryServiceFactory.getMe = function() {
			var endpoint = "/secretary/readMe";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			return $http({
				method: "POST",
				url: url
			});
		};

		secretaryServiceFactory.getAllSecretaries = function() {
			var endpoint = "/secretary/read";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			return $http({
				method: "GET",
				url: url
			});
		};

		secretaryServiceFactory.getSecretary = function(id) {
			var endpoint = '/secretary/readOne';
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

		secretaryServiceFactory.createSecretary = function(secretary) {
			var endpoint = '/secretary/create';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var data = {
				department_id: secretary.departmentId,
				name: secretary.name,
				surname: secretary.surname,
				code: secretary.code,
				password: secretary.password
			};

			return $http({
				method: "POST",
				url: url,
				data: data
			});
		};

		secretaryServiceFactory.getDepartmentById = function(departmentId) {	// make by secretary
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

		secretaryServiceFactory.getUniversityBySecretaryId = function(secretaryId) {
			var endpoint = '/university/readBySecretary';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				secretaryId: secretaryId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		return secretaryServiceFactory;

	});

})();
