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
			controller: 'studentDeclaration1Ctrl',
			resolve: {
				user: function($rootScope){
					return $rootScope.userPromise;
				}
			}
		})
		.when("/student/declaration/2", {
			templateUrl: 'html/student-declaration-2.html',
			controller: 'studentDeclaration2Ctrl',
			resolve: {
				declaration: function(generalUtility) {
					generalUtility.redirectToPreviousStep(2);
					return true;
				}
			}
		})
		.when("/student/declaration/3", {
			templateUrl: 'html/student-declaration-3.html',
			controller: 'studentDeclaration3Ctrl',
			resolve: {
				declaration: function(generalUtility) {
					generalUtility.redirectToPreviousStep(3);
					return true;
				}
			}
		})
		.when("/student/declaration/final", {
			templateUrl: 'html/student-declaration-4.html',
			controller: 'studentDeclaration4Ctrl',
			resolve: {
				declaration: function(generalUtility) {
					generalUtility.redirectToPreviousStep(4);
					return true;
				}
			}
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
		.when("/faqs", {
			templateUrl: 'html/faqs.html'
		})
		.otherwise({
			redirectTo: '/home'
		});

	})
	.run(function ($rootScope, generalUtility, studentService) {

		generalUtility.initApp();

		$rootScope.keyLength = generalUtility.keyLength;
		$rootScope.logout = generalUtility.logout;
		$rootScope.goToLogin = generalUtility.goToLogin;
		$rootScope.redirectToStudentHome = generalUtility.redirectToStudentHome;

		if (localStorage.eudoxusJWT) {
			generalUtility.setJWT(localStorage.eudoxusJWT);
			$rootScope.userPromise = generalUtility.getUser(false);
		}

	});

})();