var xamppDirectory = "/eudoxus";											// XAMPP htdocs directory name
var api = "http://localhost" + xamppDirectory + "/backend/api/endpoints";	// Path to api endpoints

// GET request
var endpoint = "/student/read.php";
var url = api + endpoint;
$.ajax({
	type: "GET",
	url: url,
	dataType: "json",
	success: function(result, status, xhr) {
		console.log(result);
		console.log(status);
		console.log(xhr);
	},
	error: function(xhr, status, error) {
		console.log(xhr);
		console.log(status);
		console.log(error);
	}
});

// POST request
var endpoint = "/student/read.php";	// <== Change that
var url = api + endpoint;
var data = {
	name: "panagiotis",
	surname: "plytas",
	age: 21
};
$.ajax({
	type: "POST",
	url: url,
	data: data,
	dataType: "json", 
	success: function(result, status, xhr) {
		console.log(result);
		console.log(status);
		console.log(xhr);
	},
	error: function(xhr, status, error) {
		console.log(xhr);
		console.log(status);
		console.log(error);
	}
});