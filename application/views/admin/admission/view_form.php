<div class="report_body" id="">

	<table class="table table-no-border">

		<tr>
			<td>
				<div class="pull-right">
					<img class="report_school_logo" src="<?php echo school_logo; ?>" readonly />
				</div>
			</td>

			<td>
				<div class="report_header">
					<h3 class="text-bold"><?php echo strtoupper(school_name); ?></h3>
					<div class="text-bold">
						<i class="fa fa-map-marker"></i> <?php echo strtoupper(school_address); ?>. <br> <i class="fa fa-phone"></i> <?php echo school_phone_number; ?>, <?php echo school_phone_number2; ?>
					</div>
					<div class="text-bold">
						Motto: <em><?php echo sub_tagline; ?></em>
					</div>
				</div><!--/.report_header-->
			</td>
			
			<td>
				<div class="">
					<img class="report_passport_square" src="<?php echo user_avatar; ?>" readonly />
				</div>
			</td>
		</tr>

	</table>

	<div class="form_header text-center">
		<h3> REGISTRATION FORM FOR <?php echo strtoupper($y->class); ?> </h3>
	</div>
	 <div class="form col-lg-12 col-md-12">
	 	<div class="inner_form">

	               <div class="col-lg-12 col-md-12">

	                  <div class="col-lg-4 col-md-4 form_mar">
	                     <label>Surname:</label>
	                     <input type="text" value="<?php echo strtoupper($y->surname); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-4 col-md-4 form_mar">
	                     <label>First name:</label>
	                     <input type="text" value="<?php echo strtoupper($y->first_name); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-4 col-md-4 form_mar">
	                     <label>Other name:</label>
	                     <input type="text" value="<?php echo strtoupper($y->other_name); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Date of Birth:</label>
	                     <input type="date" value="<?php echo strtoupper($y->dob); ?>" class="form-control input-field"  readonly />
	                  </div> 
	                  
	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Place of Birth:</label>
	                     <input type="text" value="<?php echo strtoupper($y->pob); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-4 col-md-4 form_mar">
	                     <label>Age:</label>
	                     <input type="number" value="<?php echo strtoupper($y->age); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-4 col-md-4 form_mar">
	                     <label>Gender:</label>
						 <input type="text" value="<?php echo strtoupper($y->gender); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-4 col-md-4 form_mar">
	                     <label>State of Origin:</label>
						 <input type="text" value="<?php echo strtoupper($y->state); ?>" class="form-control input-field"  readonly /> 
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Nationality:</label>
						 <input type="text" value="<?php echo strtoupper($y->country); ?>" class="form-control input-field"  readonly /> 
	                  </div>


	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Class seaking admission:</label>
						 <input type="text" value="<?php echo strtoupper($y->class); ?>" class="form-control input-field"  readonly />
	                  </div>

	               </div>

	               <div class="col-lg-12 col-md-12">

	                  <div class="col-lg-7 col-md-7 form_mar">
	                     <label>Parents name:</label>
	                     <input type="text" value="<?php echo strtoupper($y->parents_name); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Parents Number:</label>
	                     <input type="number" value="<?php echo strtoupper($y->phone_number); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Alternate Number:</label>
	                     <input type="number" value="<?php echo strtoupper($y->other_number); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-12 col-md-12 form_mar">
	                     <label>Address:</label>
	                     <input type="text" value="<?php echo strtoupper($y->address); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Email:</label>
	                     <input type="email" value="<?php echo strtoupper($y->email); ?>" class="form-control input-field"  readonly />
	                  </div>

	               </div>

	               <div class="col-lg-12 col-md-12 form_mar">

	                  <p><b><i> EMERGENCY CONTACT, IF YOU CANNOT BE REACHED </i></b></p>
	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Name:</label>
	                     <input type="text" value="<?php echo strtoupper($y->c_name); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Phone:</label>
	                     <input type="number" value="<?php echo strtoupper($y->c_number); ?>" class="form-control input-field"  readonly />
	                  </div>

	               </div>

	                <div class="col-lg-12 col-md-12 form_mar">

	                  <p><b><i> OTHER PEOPLE AUTHORIZED TO PICKUP YOUR CHILD </i></b></p>
	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Name:</label>
	                     <input type="text" value="<?php echo strtoupper($y->aut_name); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Phone:</label>
	                     <input type="number" value="<?php echo strtoupper($y->aut_number); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-12 col-md-12 form_mar">
	                     <label>Full Address:</label>
	                     <input type="text" value="<?php echo strtoupper($y->aut_address); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Name:</label>
	                     <input type="text" value="<?php echo strtoupper($y->aut_name2); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-6 col-md-6 form_mar">
	                     <label>Phone:</label>
	                     <input type="number" value="<?php echo strtoupper($y->aut_number2); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-12 col-md-12 form_mar">
	                     <label>Full Address:</label>
	                     <input type="text" value="<?php echo strtoupper($y->aut_address2); ?>" class="form-control input-field"  readonly />
	                  </div>

	                  <div class="col-lg-12 col-md-12 form_mar">
	                     <label>Any health conditions?:</label>
	                     <input type="text" value="<?php echo strtoupper($y->health); ?>" class="form-control input-field" height="500" readonly />
	                  </div>

	               </div>       
	               
	            </div>
	        <div class="col-lg-7 col-md-7 col-lg-offset-3">
				<table class="table table-no-border">
					<tr>
						<td>
							<div class="text-bold m-t-20">
								<span class="report_data"> I certify that the above information given is true to the best of my knowledge. </span>
							</div>
						</td>
					</tr>
				</table>

				<table class="table table-no-border table_margin">
					<tr>
						<td>
							<div class="col-lg-6 col-md-6">
		                     	<label>Signature:</label>
		                     	<input type="text" class="form-control input-field" height="500" readonly />
		                  	</div>
						</td>
						<td>
							<div class="col-lg-6 col-md-6">
		                     	<label>Date:</label>
		                     	<input type="text" class="form-control input-field" height="500" readonly />
		                  	</div>
						</td>
					</tr>
				</table>
			</div>

		</div>
	</div>

</div>


<button class="btn-print" onclick="window.print() ;"><i class="fa fa-print"></i>Print</button>


