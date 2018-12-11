(function() {

	angular.module("eudoxusApp", [])
	.run(function ($rootScope, generalUtility, studentService) {

		generalUtility.initApp();

		$rootScope.changePage = generalUtility.changePage;

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