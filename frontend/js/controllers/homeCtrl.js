(function() {

	angular.module('eudoxusApp')
	.controller('homeCtrl', function($rootScope, $scope, studentService) {

		/* ================= On start ================= */

		console.log("home");

		studentService.getAllStudents().then(function(response) {
			console.log(response.data);
		});

		studentService.getStudent(3).then(function(response) {
			console.log(response.data);
		});

		// var student = {
		// 	departmentId: 2,
		// 	name: "eirini",
		// 	surname: "arapkoule",
		// 	code: "bbbbbb",
		// 	password: "cccccccc"
		// };

		// studentService.createStudent(student).then(function(response) {
		// 	console.log(response.data);
		// });


	});

})();