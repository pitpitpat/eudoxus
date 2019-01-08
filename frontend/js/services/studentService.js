(function() {

	angular.module('eudoxusApp')
	.factory('studentService', function($rootScope, $http) {

		var studentServiceFactory = {};

		studentServiceFactory.login = function(credentials) {
			var endpoint = "/student/login";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			data = {
				code: credentials.code,
				password: credentials.password
			};

			return $http({
				method: "POST",
				url: url,
				data: data
			});
		};

		studentServiceFactory.getMe = function() {
			var endpoint = "/student/readMe";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			return $http({
				method: "POST",
				url: url
			});
		};

		studentServiceFactory.getAllStudents = function() {
			var endpoint = "/student/read";
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			return $http({
				method: "GET",
				url: url
			});
		};

		studentServiceFactory.getStudent = function(id) {
			var endpoint = '/student/readOne';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				id: id
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		};

		studentServiceFactory.createStudent = function(student) {
			var endpoint = '/student/create';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var data = {
				department_id: student.departmentId,
				name: student.name,
				surname: student.surname,
				code: student.code,
				password: student.password
			};

			return $http({
				method: "POST",
				url: url,
				data: data
			});
		};

		studentServiceFactory.getDepartmentById = function(departmentId) {
			var endpoint = '/department/readOne';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				id: departmentId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.getDepartmentsByUniversityId = function(universityId) {
			var endpoint = '/department/readByUni';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				universityId: universityId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.getUniversityByStudentId = function(studentId) {
			var endpoint = '/university/readByStudent';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				studentId: studentId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.getAllUniversities = function() {
			var endpoint = '/university/read';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			return $http({
				method: "GET",
				url: url
			});
		}

		studentServiceFactory.getCoursesByDepartmentId = function(departmentId) {
			var endpoint = '/course/readByDep';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				departmentId: departmentId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.getBooksByCourseId = function(courseId) {
			var endpoint = '/book/readByCourse';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				course_id: courseId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.createDeclaration = function() {
			var endpoint = '/studentDeclaration/create';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var booksList = [];
			for (courseId in $rootScope.user.declaration.books) {
				var book = $rootScope.user.declaration.books[courseId];
				booksList.push(book);
			}

			var data = {
				student_id: $rootScope.user.id,
				semester: $rootScope.user.semester,
				books: booksList
			};

			console.log(data);

			return $http({
				method: "POST",
				url: url,
				data: data
			});
		}

		studentServiceFactory.getDeclarationsByStudentId = function(studentId) {
			var endpoint = '/studentDeclaration/readByStudent';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				student_id: studentId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.getDeclarationById = function(declarationId) {
			var endpoint = '/studentDeclaration/readOne';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				id: declarationId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		studentServiceFactory.getBooksByDeclarationId = function(declarationId) {
			var endpoint = '/book/readByStDecl';
			var url = $rootScope.eudoxusAPI + endpoint + ".php";

			var params = {
				declarationId: declarationId
			};

			return $http({
				method: "GET",
				url: url,
				params: params
			});
		}

		return studentServiceFactory;

	});

})();
