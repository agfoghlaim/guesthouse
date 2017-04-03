<?php 
session_start();

include'includes/head.php';
include'includes/header.php';
echo "<h3> You are booking a " . $_SESSION['roomtype'] . " from ".$_SESSION['arrivaldate']. " until ". $_SESSION['departuredate']. "</h3>";
echo $_SESSION['roomtype'];
echo $_SESSION['departuredate'];
echo $_SESSION['arrivaldate'];
?>

<!-- Contact Section -->
<style>
	 /*stripe css*/
 
.StripeElement {
  background-color: white;
  padding: 8px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

 /*end stripe css*/
</style>
    <section id="booking-process" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Booking</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                  <!--   <form name="bookingForm" id="bookingForm"> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your First Name *" id="fname" required data-validation-required-message="Please enter your first name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Last Name *" id="lname" required data-validation-required-message="Please enter your last address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Address *" id="address" required data-validation-required-message="Please enter your address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Country *" id="country" required data-validation-required-message="Please enter your country.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Eir/Postcode *" id="postcode" required data-validation-required-message="Please enter your postcode.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="No of Adults *" id="no_adults" required data-validation-required-message="Please enter no. of adults.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="No of Children *" id="no_children" required data-validation-required-message="Please enter no. of children.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Arrival time *" id="arrival" required data-validation-required-message="Please enter your estimated arrival time.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button  id="guestinfo" class="btn btn-xl">Proceed to Payment</button>
                            </div>
                        </div>
                 <!--    </form> -->
                </div>
            </div>
        </div>
    </section>

    <!-- stripe -->
		
<!--   <form action="" method="POST" id="payment-form">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_QWhnySvFJ4slGRxjGXdyCUYq"
    data-amount="999"
    data-name="Demo Site"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true"
    data-currency="eur">
  </script>
</form> -->

<!-- <form action="" method="POST" id="payment-form">
  <span class="payment-errors"></span>
 
  <div class="row">
    <label>
      <span>Card Number</span>
      <input type="text" data-stripe="number">
    </label>
  </div>
 
  <div class="row">
    <label>
      <span>CVC</span>
      <input type="text" data-stripe="cvc">
    </label>
  </div>
 
  <div class="row">
    <label>
      <span>Expiration (MM/YYYY)</span>
      <input type="text" data-stripe="exp-month">
    </label>
    <input type="text" data-stripe="exp-year">
  </div>
 
  <button type="submit">Buy Now</button>
</form>

<script src="https://js.stripe.com/v2/"></script>
 -->
<script>
    // (function() {
    //     Stripe.setPublishableKey('pk_test_QWhnySvFJ4slGRxjGXdyCUYq');
    // })();

    // Event Listeners


</script>
<script src="https://js.stripe.com/v3/"></script>
<div id="payment-div">
<form action="charge.php" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- a Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors -->
    <div id="card-errors"></div>
  </div>

  <button>Submit Payment</button>
</form>
</div>



    <!-- stripe -->


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>
     <script src="js/js.js"></script>
<?php 
include'includes/footer.php';
?>