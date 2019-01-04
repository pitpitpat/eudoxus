(function() {

	angular.module('eudoxusApp')
	.factory('generalService', function($rootScope, $http) {

		var generalServiceFactory = {};

		generalServiceFactory.logout = function() {
			delete localStorage.eudoxusJWT;
			$rootScope.user = null;
			location.reload();
			console.log("logged out");
		};

		return generalServiceFactory;

	});

})();
