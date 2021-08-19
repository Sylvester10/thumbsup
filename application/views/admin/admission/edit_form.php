<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="report_body" id="">

	 <div class="form col-lg-12 col-md-12">

		<?php 
		echo form_open('form/edit_form_ajax/'.$y->id); ?>

           <div class="col-lg-12 col-md-12">

              <div class="col-lg-4 col-md-4 form_mar">
                 <label>Surname:</label>
                 <input type="text" name="surname" value="<?php echo set_value('surname', $y->surname); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-4 col-md-4 form_mar">
                 <label>First name:</label>
                 <input type="text" name="first_name" value="<?php echo set_value('first_name', $y->first_name); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-4 col-md-4 form_mar">
                 <label>Other name:</label>
                 <input type="text" name="other_name" value="<?php echo set_value('other_name', $y->other_name); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
        				<label>Date of Birth:</label>
        				<div class="input-group date date_datepicker_no_future" data-date-format="yyyy-mm-dd">
        					<input type="text" class="form-control" name="dob" value="<?php echo set_value('dob', $y->dob); ?>" readonly required />
        					<div class="input-group-addon">
        						<i class="fa fa-calendar"></i>
        					</div>
        				</div>
      			  </div>
              
              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Place of Birth:</label>
                 <input type="text" name="pob" value="<?php echo set_value('pob', $y->pob); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-12">
	              <div class="col-lg-4 col-md-4 form_mar">
	                 <label>Age:</label>
	                 <input type="number" name="age" value="<?php echo set_value('age', $y->age); ?>" class="form-control input-field" />
	              </div>

	              <div class="col-lg-4 col-md-4 form_mar">
	                 <label>Gender:</label>
	                 <select class="form-control" name="gender" required >
						<option selected value="<?php echo $y->gender; ?>"><?php echo $y->gender; ?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					 </select>
	              </div>

	              <div class="col-lg-4 col-md-4 form_mar">
	                 <label>State of Origin:</label>
					          <select class="form-control" name="state" >
	                    <option selected value="<?php echo $y->state; ?>"><?php echo $y->state; ?></option>
	                    <?php 
	                    $states = nigerian_states();
	                       foreach ($states as $state ) { ?>
	                       <option value="<?php echo $state; ?>" > <?php echo $state; ?> </option>
	                    <?php }
	                    ?>
	                 </select>  
	              </div>
	          </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Nationality:</label>
                 <select class="form-control" name="country">
                    <option selected value="<?php echo $y->country; ?>"><?php echo $y->country; ?></option>
                    <?php 
                    $countries = countries();
                       foreach ($countries as $country ) { ?>
                       <option value="<?php echo $country; ?>" > <?php echo $country; ?> </option>
                    <?php }
                    ?>
                 </select>  
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Class seaking admission:</label>
                 <select class="form-control" name="class" required >
        					<option selected value="<?php echo $y->class; ?>"><?php echo $y->class; ?></option>
        					<option value="Creche 8months - 2yrs">Creche 8months - 2yrs</option>
        					<option value="Preschool 1 (2yrs - 3yrs)">Preschool 1 (2yrs - 3yrs)</option>
        					<option value="Preschool 2 (3yrs - 4yrs)">Preschool 2 (3yrs - 4yrs)</option>
        					<option value="Transition (4yrs - 5yrs)'">Transition (4yrs - 5yrs)'</option>
        				 </select>
              </div>

           </div>

           <div class="col-lg-12 col-md-12">

              <div class="col-lg-7 col-md-7 form_mar">
                 <label>Parents name:</label>
                 <input type="text" name="parents_name" value="<?php echo set_value('parents_name', $y->parents_name); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Parents Number:</label>
                 <input type="number" name="phone_number" value="<?php echo set_value('phone_number', $y->phone_number); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Alternate Number:</label>
                 <input type="number" name="other_number" value="<?php echo set_value('other_number', $y->other_number); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-12 col-md-12 form_mar">
                 <label>Address:</label>
                 <input type="text" name="address" value="<?php echo set_value('address', $y->address); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Email:</label>
                 <input type="email" name="email" value="<?php echo set_value('email', $y->email); ?>" class="form-control input-field" />
              </div>

           </div>

           <div class="col-lg-12 col-md-12 form_mar">

              <p><b><i> EMERGENCY CONTACT, IF YOU CANNOT BE REACHED </i></b></p>
              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Name:</label>
                 <input type="text" name="c_name" value="<?php echo set_value('c_name', $y->c_name); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Phone:</label>
                 <input type="number" name="c_number" value="<?php echo set_value('c_number', $y->c_number); ?>" class="form-control input-field" />
              </div>

           </div>

            <div class="col-lg-12 col-md-12 form_mar">

              <p><b><i> OTHER PEOPLE AUTHORIZED TO PICKUP YOUR CHILD </i></b></p>
              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Name:</label>
                 <input type="text" name="aut_name" value="<?php echo set_value('aut_name', $y->aut_name); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Phone:</label>
                 <input type="number" name="aut_number" value="<?php echo set_value('aut_number', $y->aut_number); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-12 col-md-12 form_mar">
                 <label>Full Address:</label>
                 <input type="text" name="aut_address" value="<?php echo set_value('aut_address', $y->aut_address); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Name:</label>
                 <input type="text" name="aut_name2" value="<?php echo set_value('aut_name2', $y->aut_name2); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-6 col-md-6 form_mar">
                 <label>Phone:</label>
                 <input type="number" name="aut_number2" value="<?php echo set_value('aut_number2', $y->aut_number2); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-12 col-md-12 form_mar">
                 <label>Full Address:</label>
                 <input type="text" name="aut_address2" value="<?php echo set_value('aut_address2', $y->aut_address2); ?>" class="form-control input-field" />
              </div>

              <div class="col-lg-12 col-md-12 form_mar">
                 <label>Any health conditions?:</label>
                 <input type="text" name="health" value="<?php echo set_value('health', $y->health); ?>" class="form-control input-field" height="500" />
              </div>

           </div>     

           <div id="status_msg"></div>
				
			<div class="col-lg-12 col-md-12 form_mar">
				<button class="btn btn-primary">Update </button>
			</div>  

        <?php echo form_close(); ?>

	</div>

</div>


