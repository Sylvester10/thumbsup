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
		<h3> APPLICATION FORM </h3>
	</div>
	<div class="form col-lg-12 col-md-12">
		<div class="inner_form">
			<div class="col-lg-12 col-md-12">

	           	<div class="col-lg-12 col-md-12 form_mar">
	               <label>Full Name:</label>
	               <input type="text" value="<?php echo strtoupper ($y->fullname); ?>" class="form-control input-field" readonly />
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Email:</label>
	               <input type="email" value="<?php echo strtoupper ($y->email); ?>" class="form-control input-field" readonly />
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Phone number:</label>
	               <input type="text" value="<?php echo strtoupper ($y->number); ?>" class="form-control input-field" readonly />
	            </div>

	            <div class="col-lg-12 col-md-12 form_mar">
	               <label>Current Address:</label>
	               <input type="text" value="<?php echo strtoupper ($y->c_address); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-12 col-md-12 form_mar">
	               <label>Permanent Address:</label>
	               <input type="text" value="<?php echo strtoupper ($y->p_address); ?>" class="form-control input-field" readonly/>
	            </div>
		          
	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Age:</label>
	               <input type="text" value="<?php echo strtoupper ($y->age); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Gender:</label>
	               <input type="text" value="<?php echo strtoupper ($y->gender); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Nationality:</label>
	               <input type="text" value="<?php echo strtoupper ($y->country); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>State of Origin:</label>
                   <input type="text" value="<?php echo strtoupper ($y->state); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Religion:</label>
	               <input type="text" value="<?php echo strtoupper ($y->religion); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Religious volunteer group:</label>
	               <input type="text" value="<?php echo strtoupper ($y->volunteer); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Position apllying for:</label>
	               <input type="text" value="<?php echo strtoupper ($y->job_title); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Marital Status:</label>
	               <input type="text" value="<?php echo strtoupper ($y->marriage); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>Qualification:</label>
	               <input type="text" value="<?php echo strtoupper ($y->qualification); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label>Experience:</label>
	              <input type="text" value="<?php echo strtoupper ($y->experience); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-12 col-md-12 mt-10">
	              <p style="margin-top: 30px !important; margin-bottom: 10px !important; font-size: 16px !important;"><b>Rate yourself</b></p>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label>I am a team player:</label>
	               <input type="text" value="<?php echo strtoupper ($y->team); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I work well under pressure:</label>
	               <input type="text" value="<?php echo strtoupper ($y->pressure); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I want to pursue a career in education:</label>
	               <input type="text" value="<?php echo strtoupper ($y->career); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I love to teach young children:</label>
	               <input type="text" value="<?php echo strtoupper ($y->teach); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I love to learn new things that help me improve in my job:</label>
	               <input type="text" value="<?php echo strtoupper ($y->learn); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I manage my time and energy effectively:</label>
	               <input type="text" value="<?php echo strtoupper ($y->manage); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I have good people skills and emotional intelligence:</label>
	               <input type="text" value="<?php echo strtoupper ($y->people_skill); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I treat everyone fairly and equally without favouritism:</label>
	               <input type="text" value="<?php echo strtoupper ($y->treat); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I have a neat and legible handwriting:</label>
	               <input type="text" value="<?php echo strtoupper ($y->handwriting); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I can look for information online that will help do my job better:</label>
	               <input type="text" value="<?php echo strtoupper ($y->information); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	               <label> I read books ( for education and for pleasure):</label>
	               <input type="text" value="<?php echo strtoupper ($y->books); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-8 col-md-8 form_mar">
	               <label> I am willing to invest my time and resources learn new skills that will help me in this career path:</label>
	               <input type="text" value="<?php echo strtoupper ($y->invest); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-12 col-md-12 form_mar">
	              <label>What other commitments do you have eg. church, mosque , clubs etc and when does it require your time:</label>
	              <input type="text" value="<?php echo strtoupper ($y->commitments); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-12 col-md-12 form_mar">
	              <label>Do you belong to any educational body or group even if it is on social media? Please provide the name?</label>
	              <input type="text" value="<?php echo strtoupper ($y->edu_body); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label>Who is your role model in education?</label>
	              <input type="text" value="<?php echo strtoupper ($y->role_model); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label>How many years are willing to put into this job if given the offer? </label>
	              <input type="text" value="<?php echo strtoupper ($y->years); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label>What is your personal dream for yourself in the next 5 years?</label>
	              <input type="text" value="<?php echo strtoupper ($y->dream); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label>What are your personal core values? </label>
	              <input type="text" value="<?php echo strtoupper ($y->core_value); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label>Other than teaching, what other skills do you have? </label>
	              <input type="text" value="<?php echo strtoupper ($y->skills); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label> If given this job, what subjects can you teach conveniently? </label>
	              <input type="text" value="<?php echo strtoupper ($y->teaching); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label> What age of children do you prefer to work with?</label>
	              <input type="text" value="<?php echo strtoupper ($y->preffered_age); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-6 col-md-6 form_mar">
	              <label> What is your salary expectation? </label>
	              <input type="text" value="<?php echo strtoupper ($y->salary); ?>" class="form-control input-field" readonly/>
	            </div>

	            <div class="col-lg-12 col-md-12 form_mar" style="margin-bottom: 50px !important;">
	              <label>  Include your Instagram, Facebook, Twitter or LinkedIn address if you are on any of these social media platforms</label>
	              <input type="text" value="<?php echo strtoupper ($y->socials); ?>" class="form-control input-field" readonly/>
	            </div>    
	               
            </div>
		</div>
	</div>

</div>



