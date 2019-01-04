(function() {

	angular.module('eudoxusApp')
	.factory('generalUtility', function($rootScope) {

		var generalUtilityFactory = {};

		generalUtilityFactory.initApp = function(){
			var xamppDirectory = "/eudoxus";							// Name of directory in xampp/htdocs/
			$rootScope.eudoxusAPI = "http://localhost" + xamppDirectory + "/backend/api/endpoints";
		};

		return generalUtilityFactory;

	});

})();
