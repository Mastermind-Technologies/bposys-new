$(document).ready(function(){
	$('#birthdate').datetimepicker({
		format: 'MM/DD/YYYY',
	});

	$('#gender-male').click(function(){
		$('#hidden-gender').val('Male');
	});

	$('#gender-female').click(function(){
		$('#hidden-gender').val('Female');
	});
});