
$(document).ready(function(){


var arrivaldate = $('#arrivaldate').val();
var departuredate = $('#departuredate').val();

$('input#marie').on('click', function(){
console.log(3);
console.log('arrive is ' + arrivaldate);
console.log('depart is ' + departuredate);

	$.post('what.php', {arrivaldate:arrivaldate, departuredate:departuredate}, function(data){
		console.log('data is ' + data);
		$('#availresults').html(data);
	});
});
});