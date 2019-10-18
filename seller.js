$(document).ready(function(){
	$("#viewBooks").click(function(){
		console.log("My books button was pressed");
		$("#mainDiv1").hide();
		$("#mainDiv2").show();
	});
$("#bookInfo").click(function(){
	console.log("Add book button was pressed");
		$("#mainDiv1").show();
		$("#mainDiv2").hide();
	});
});
