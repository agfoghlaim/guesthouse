
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
               <div class="container">

		            <div class="row">
		                <div class="col-lg-12 text-center">
							<h2 class="section-heading">Check Availabity</h2>
		                    <h3 class="section-subheading text-muted">Line about something.</h3>
		                </div>
		            </div>

	            	<div class="row">
	                	<div class="col-lg-12">

	                  		<div class="col-md-3">
	                   			 <div class="form-group">
	                        		<input type="date" name= "arrivaldate" id="arrivaldate" class="form-control" placeholder="Arrival Date"  required data-validation-required-message="Please enter your arrival date." value="<?php if (isset($_POST['arrivaldate'])) echo $_POST['arrivaldate']; ?>">
	                        		<p class="help-block text-danger"></p>
	                  			</div>
	                 		 </div>

	                		<div class="col-md-3">
	                     		<input type="date" class="form-control" placeholder="Departure Date" name="departuredate" id="departuredate" required data-validation-required-message="Please enter your departure date." value="<?php if (isset($_POST['departuredate'])) echo $_POST['departuredate']; ?>">
	                        	<p class="help-block text-danger"></p>
	                		</div>

	                 		<div class="col-md-3">
	                    		<div class="form-group">
	                       		 	<select class="form-control">
	                        		<option>Double</option>
	                        		<option>Single</option>
	                        		</select>
	                        		<p class="help-block text-danger"></p>
	                    		</div>
	                		</div>

	                		<div class="col-md-3">
	                   			<div id="success"></div>
	                 				<a href="#portfolio"><input id="marie" class="btn btn-md" value="check it!"></a>
								</div>
	                		</div>
	                    </div>
	       			</div>
	       			<div class="row">
	                	<div class="col-lg-12">
	       				
	       				</div>
	       			</div>		


            </div>
        </div>
    </header>