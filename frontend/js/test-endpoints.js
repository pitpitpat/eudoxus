var xamppDirectory = "/eudoxus";
var api = "http://localhost" + xamppDirectory + "/backend/api/endpoints";


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