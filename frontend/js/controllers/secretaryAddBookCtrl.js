(function() {

	angular.module('eudoxusApp')
	.controller('secretaryAddBookCtrl', function($rootScope, $scope, secretaryService) {

		secretaryService.getBookbyId().then(function(response) {
			console.log(response.data);
		});

	});

})();