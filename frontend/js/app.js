(function() {

	angular.module("eudoxusApp", ['ngRoute'])
	.config(function($routeProvider) {

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
		.when("/", {
			redirectTo: '/home'
		})
		.otherwise({
			redirectTo: '/home'
		});

	})
	.run(function ($rootScope, generalUtility) {

		generalUtility.initApp();

	});

})();