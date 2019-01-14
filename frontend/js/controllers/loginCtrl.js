(function() {

	angular.module('eudoxusApp')
	.controller('loginCtrl', function($rootScope, $scope, generalUtility, studentService, secretaryService) {

		$rootScope.userType = 'student';
		$rootScope.changeUserType = function(userType){
			$rootScope.userType = userType;
		}

		$scope.loginFailed = false;
		$scope.credentials = {
			code: null,
			password: null
		};
		$scope.secretaryCredentials = {
			username: null,
			password: null
		};

		
		$scope.login = function() {
			$scope.loginFailed = false;
			if ($rootScope.userType == 'student'){
				studentService.login($scope.credentials).then(function(response) {
					generalUtility.setJWT(response.headers().authorization);
					generalUtility.getUser(true);
				})
				.catch(function(response) {
					$scope.loginFailed = true;
				});
			}else if($rootScope.userType == 'secretary'){
				secretaryService.login($scope.secretaryCredentials).then(function(response) {
					generalUtility.setJWT(response.headers().authorization);
					generalUtility.getSecretaryUser(true);
				})
				.catch(function(response) {
					$scope.loginFailed = true;
				});
			}
		}
		
		/* ================= On start ================= */

	});

})();