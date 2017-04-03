
$(document).ready(function(){
//console.log('marie ' + $('#marie').val());
// $('#payment-form').on('submit', function(){
//  alert("anything");	
// });

// $('#payment-form').on('submit', generateToken);
//  alert("anything");
// function generateToken(e) {
// 	console.log("generaring");
// 	alert("generating");
//     var form = $(this);
//  alert(form);
//     // No pressing the buy now button more than once
//     form.find('button').prop('disabled', true);
 
//     // Create the token, based on the form object
//     Stripe.create(form, stripeResponseHandler());
 
//     // Prevent the form from submitting
//     e.preventDefault();
// };
// function stripeResponseHandler(status, response){ 

// 	alert("srh");
// 	alert(status);
// 	alert(response);
// 	console.log("this is status" + status);
// 	console.log("this is response" + response);
//     var form = $('#payment-form');
 
//     // Any validation errors?
//     if (response.error) {
//         // Show the user what they did wrong
//         form.find('.payment-errors').text(response.error.message);
//  	alert(error);
//         // Make the submit clickable again
//         form.find('button').prop('disabled', false);
//     } else {
//         // Otherwise, we're good to go! Submit the form.

//         // Insert the unique token into the form
//         console.log("inserting unique token...")
//         $('<input>', {
//             'type': 'hidden',
//             'name': 'stripeToken',
//             'value': response.id
//         }).appendTo(form);
 
//         // Call the native submit method on the form
//         // to keep the submission from being canceled
//         //form.get(0).submit();
//     }
// };

// Create a Stripe client
var stripe = Stripe('pk_test_QWhnySvFJ4slGRxjGXdyCUYq');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '24px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});


 //to check availabity and bring user to select room
$('input#marie').on('click', function(){
var arrivaldate = $('#arrivaldate').val();
var departuredate = $('#departuredate').val();
var roomtype = $('#roomtype').val();
console.log(3);
console.log('arrive is ' + arrivaldate);
console.log('depart is ' + departuredate);
console.log('roomtype is ' + roomtype);

	$.post('what.php', {arrivaldate:arrivaldate, departuredate:departuredate, roomtype:roomtype}, function(data){
		console.log('data is ' + data);
		$('#availresults').html(data);
	});
});

//booking page
//roomtype, dates set in session
$('button#guestinfo').on('click', function(){
	alert(1);
	var fname = $('#fname').val();
	console.log(fname);
	var lname = $('#lname').val();
	var address = $('#address').val();
	var email = $('#email').val();
	var phone = $('#phone').val();
	var country = $('#country').val();
	var postcode = $('#postcode').val();
	var no_adults = $('#no_adults').val();
	var no_children = $('#no_children').val(); 
	var arrival = $('#arrival').val();
	console.log(fname, lname, address, email)

	$.post('booking.php', 
				{fname:fname, 
				lname:lname, 
				address:address, 
				email:email, 
				phone:phone, 
				country:country,
				postcode:postcode, 
				no_children:no_children, 
				no_adults:no_adults, 
				arrival:arrival},
				function(response){
				//alert(response);
				$('#booking-process').append(response);
				});
});






});