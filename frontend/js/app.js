(function() {

	angular.module("eudoxusApp", ['ngRoute'])
	.config(function($httpProvider, $routeProvider) {

		/* ================= Routing ================= */
		$routeProvider
		.when("/home", {
			templateUrl: 'html/home.html',
			controller: 'homeCtrl'
		})
		.when("/student/home", {
			templateUrl: 'html/student-home.html',
			controller: 'studentHomeCtrl'
		})
		.when("/student/declaration/1", {
			templateUrl: 'html/student-declaration-1.html',
			controller: 'studentDeclaration1Ctrl'
		})
		.when("/student/declaration/2", {
			templateUrl: 'html/student-declaration-2.html',
			controller: 'studentDeclaration2Ctrl'
		})
		.when("/student/declaration/3", {
			templateUrl: 'html/student-declaration-3.html',
			controller: 'studentDeclaration3Ctrl'
		})
		.when("/student/book/offer", {
			templateUrl: 'html/student-book-offer.html',
			controller: 'studentBookOfferCtrl'
		})
		.when("/student/declaration/log", {
			templateUrl: 'html/student-declaration-log.html',
			controller: 'studentDeclarationLogCtrl'
		})
		.when("/secretary/home", {
			templateUrl: 'html/secretary-home.html',
			controller: 'secretaryHomeCtrl'
		})
		.when("/secretary/addbook", {
			templateUrl: 'html/secretary-addbook.html',
			controller: 'secretaryAddBookCtrl'
		})
		.when("/login", {
			templateUrl: 'html/login.html',
			controller: 'loginCtrl'
		})
		.when("/register", {
			templateUrl: 'html/register.html',
			controller: 'registerCtrl'
		})
		.when("/", {
			redirectTo: '/home'
		})
		.when("/announcements", {
			templateUrl: 'html/announcements.html'
		})
		.when("/contact", {
			templateUrl: 'html/contact.html'
		})
		.otherwise({
			redirectTo: '/home'
		});

	})
	.run(function ($rootScope, generalUtility, generalService, studentService) {

		generalUtility.initApp();

		$rootScope.logout = generalService.logout;
		$rootScope.goToLogin = generalUtility.goToLogin;

		if (localStorage.eudoxusJWT) {
			generalUtility.setJWT(localStorage.eudoxusJWT);
			generalUtility.getUser(false);
		}

	});

})();