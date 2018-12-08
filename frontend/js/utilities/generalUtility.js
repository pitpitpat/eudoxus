(function() {

	angular.module('eudoxusApp')
	.factory('generalUtility', function($rootScope, $location) {

		var generalUtilityFactory = {};

		generalUtilityFactory.changePage = function(selectedPage){
			$rootScope.currentPage = "html/" + selectedPage + ".html";	// Load selected page
			$location.url(selectedPage);								// Change url according to selected page
		};

		generalUtilityFactory.initApp = function(){
			var xamppDirectory = "/eudoxus";							// Name of directory in xampp/htdocs/
			$rootScope.eudoxusAPI = "http://localhost" + xamppDirectory + "/backend/api/endpoints";


			var previousPath = $location.path();
			previousPath = previousPath.replace('/','');
			if (previousPath) {											// Check if url points to a specific page
				generalUtilityFactory.changePage(previousPath);			// Load page from url
			} else {
				generalUtilityFactory.changePage("home");				// Load home page
			}
		};

		return generalUtilityFactory;

	});

})();
