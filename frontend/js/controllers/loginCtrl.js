(function() {

	angular.module('eudoxusApp')
	.controller('loginCtrl', function($rootScope, $scope, generalUtility, studentService) {

		$rootScope.userType = 'student';
		$rootScope.changeUserType = function(userType){
			$rootScope.userType = userType;
		}
		$scope.loginFailed = false;
		$scope.studentCredentials = {
			code: null,
			password: null
		};
		$scope.secretaryCredentials = {
			username: null,
			password: null
		};

		if ($scope.role == "student"){
			$scope.login = function() {
				$scope.loginFailed = false;
				studentService.login($scope.studentCredentials).then(function(response) {
					generalUtility.setJWT(response.headers().authorization);
					generalUtility.getUser(true);
				})
				.catch(function(response) {
					$scope.loginFailed = true;
				});
			}
		}else if($scope.role == "secretary"){
			$scope.login = function() {
				$scope.loginFailed = false;
				studentService.login($scope.secretaryCredentials).then(function(response) {
					generalUtility.setJWT(response.headers().authorization);
					generalUtility.getUser(true);
				})
				.catch(function(response) {
					$scope.loginFailed = true;
				});
			}
		}
		/* ================= On start ================= */

	});

})();