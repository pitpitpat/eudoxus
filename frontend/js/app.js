(function() {

	angular.module("eudoxusApp", [])
	.run(function ($rootScope, generalUtility) {

		generalUtility.initApp();

		$rootScope.changePage = generalUtility.changePage;

	});

})();