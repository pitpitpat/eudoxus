(function() {

	angular.module('eudoxusApp')
	.controller('loginCtrl', function($rootScope, $scope, generalUtility, studentService) {

		$scope.loginFailed = false;
		$scope.credentials = {
			code: null,
			password: null
		};

		$scope.login = function() {
			$scope.loginFailed = false;
			studentService.login($scope.credentials).then(function(response) {
				generalUtility.setJWT(response.headers().authorization);
				generalUtility.getUser(true);
			})
			.catch(function(response) {
				$scope.loginFailed = true;
			});
		}

		/* ================= On start ================= */

	});

})();