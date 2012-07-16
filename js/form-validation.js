$(document).ready(function () {
	
	var checkboxReqs = 0;
	
	$('#checkbox').on('keyup', function (ev) {
		var password = $(this).val();
		
		// We want to add the passwordReqs to each if statement
		checkboxReqs = 0;
		console.log(checkboxReqs);
		if (checkboxReqs.length > 1) {
			checkboxReqs++;
		}
		
	});
	// You want to prevent the user from clicking on submit before filling out all the requirements
	$('form').on('submit', function (ev) {
		if ( passwordReq = 7) {
			ev.preventDefault();
		}
	});
	
});










