<?php


?>
<html>
	<head>
	  <title>Checkout</title>
	  <script src="https://js.stripe.com/v3/"></script>
	</head>
	<body>
		<form id="payment-form">
		  <div id="card-element">
			<!-- Elements will create input elements here -->
		  </div>

		  <!-- We'll put the error messages in this element -->
		  <div id="card-errors" role="alert"></div>

		  <button id="submit">Pay</button>
		</form>
		<script>
			// Set your publishable key: remember to change this to your live publishable key in production
			// See your keys here: https://dashboard.stripe.com/account/apikeys
			var stripe = Stripe('pk_test_ecCWm2jxOiFyZRtCm4T7nwwn00oiauTJ95');
			var elements = stripe.elements();
			// Set up Stripe.js and Elements to use in checkout form
			var style = {
			  base: {
				color: "#32325d",
			  }
			};

			var card = elements.create("card", { style: style });
			card.mount("#card-element");
			card.addEventListener('change', function(event) {
			  var displayError = document.getElementById('card-errors');
			  if (event.error) {
				displayError.textContent = event.error.message;
			  } else {
				displayError.textContent = '';
			  }
			});
			
			var form = document.getElementById('payment-form');

			form.addEventListener('submit', function(ev) {
			  ev.preventDefault();
			  stripe.confirmCardPayment("{{ $client_secret }}", {
				payment_method: {
				  card: card,
				  billing_details: {
					name: 'Jenny Rosen'
				  }
				}
			  }).then(function(result) {
				if (result.error) {
				  // Show error to your customer (e.g., insufficient funds)
				  alert(result.error.message);
				} else {
				  // The payment has been processed!
				  if (result.paymentIntent.status === 'succeeded') {
					// Show a success message to your customer
					// There's a risk of the customer closing the window before callback
					// execution. Set up a webhook or plugin to listen for the
					// payment_intent.succeeded event that handles any business critical
					// post-payment actions.
					alert("thank you!");
					
				  }
				}
			  });
			});

		</script>
	</body>
</html>