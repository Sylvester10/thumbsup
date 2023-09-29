
	<!-- Breadcroumb Area -->

	<div class="breadcroumb-area bread-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcroumb-title text-center">
						<h1>Volunteers</h1>
						<h6><a href="<?php echo base_url(); ?>">Home</a> / Volunteers</h6>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- About Area-->

	<div class="program-area theme-3 section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="choose-us-bg">
						<img src="<?php echo base_url('assets/img/hero-area-bg-4.jpeg'); ?>" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="choose-us-content">
						<h5>Why Join us</h5>
						<p>We’re a non-profit organisation on a mission to see the youth equipped & empowered to live with dignity. This means you are freely giving time and labor to ensure the Mission and Vision of the organization is achieved</p>

						<div class="single-choose-item">
							<i class="las la-user-alt"></i>
							<div class="single-choose-content">
								<h6>Keep</h6>
								<p>Absolute 100% confidentiality</p>
							</div>
						</div>

						<div class="single-choose-item">
							<i class="las la-thumbs-up"></i>
							<div class="single-choose-content">
								<h6>Ensure</h6>
								<p>That the adult participant signs all legal documentation, committing to the institute rules and or our one-on-one coaching sessions</p>
							</div>
						</div>

						<div class="single-choose-item">
							<i class="las la-shield-alt"></i>
							<div class="single-choose-content">
								<h6>Get</h6>
								<p>A signed parental/guardian consent form before any underage one-on-one coaching session.</p>
							</div>
						</div>

						<div class="single-choose-item">
							<i class="las la-heart"></i>
							<div class="single-choose-content">
								<h6>Refer</h6>
								<p>Any difficult cases to the my team lead/the Founder</p>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 cause-details awareness">
					<p><b>The TUPI Volunteer is one who is:</b></p>
						<ul>
							<li>Accepting</li>
							<br>
							<li>A Listener</li>
							<br>
							<li>Non-judgmental</li>
							<br>
							<li>Nurturing</li>
							<br>
							<li>Discrete with information and who provides a safe Environment for their people to self-express</li>
							<li>Participating in our continuous learning system & is a constant learner</li>
							<li>An advocate for self-knowledge.</li>
						</ul>
				</div>
				<div class="col-lg-6 cause-details awareness">
					<p><b>As a TUPI Volunteer, you will:</b></p>
					<ul>
						<li>Be a self-leader and developer with self-growth as your daily watchword</li>
						<li>Be called upon to work with youth as a one-on-one or group coach/instructor physically or virtually</li>
						<li>Participate in live chats on our social media handles and programs</li>
						<li>Will contribute to and during brainstorming sessions and meetings</li>
						<li>Cooperate with other volunteers in achieving goals</li>
						<li>Attend capacity building programs like; Trainings and Team bonding programs.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<!-- About Area-->

	<div class="service-area theme-3 section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h6>You can join us</h6>
						<h2>Become a <b>volunteer</b></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="section-title">
						<h6>Personal Details</h6>
					</div>
					<div class="contact-form">

						<?php 
		                $form_attributes = array("id" => "volunteer_form");
		                echo form_open('home/volunteer_ajax', $form_attributes); ?>
						
							<input type="text" name="name" id="name" placeholder="Name" required>

							<textarea name="address" cols="30" rows="10" placeholder="Address" required></textarea>

							<select name="state" required >
								<option value="">State of Residence</option>

								<?php
								$nigerian_states = nigerian_states(); 
								foreach ($nigerian_states as $states) { ?>
									<option value="<?php echo $states; ?>" <?php echo set_select('states', $states); ?> ><?php echo $states; ?></option>
								<?php } ?>

							</select>

							<select class="multiselect" id="multiselect" name="residence[]" multiple="multiple" all-selected="All states selected" placeholder="You're volunteering in which State(s)?" required> 
								<option value="Abuja">Abuja</option>
								<option value="Lagos">Lagos</option>
								<option value="Portharcourt">Portharcourt</option>
							</select>
						
							<input type="tel" name="phone" id="phone" placeholder="Phone" required>

							<input type="email" name="email" id="email" placeholder="Your E-mail" required>


							<label>Availability Period</label>
							<input type="date" data-date-format="dd-mm-yyyy" name="availability" value="<?php echo set_value('availability'); ?>" required />

							<select class="multiselect" id="multiselect" name="qualification[]" multiple="multiple" all-selected="All qualifications selected" placeholder="Select Qualification(s)" required> 
								<?php 
								$qualifications = educational_qualifications();
								foreach ($qualifications as $qualification) { ?>
									<option value="<?php echo $qualification; ?>" <?php echo set_select('qualification', $qualification); ?> ><?php echo $qualification; ?></option>
								<?php } ?>
							</select>
							
							<label>Language(s)</label>
							<select class="multiselect" id="multiselect" name="language[]" multiple="multiple" all-selected="All languages selected" placeholder="Select Language(s)" required> 
								<option value="English">English</option>
								<option value="Igbo">Igbo</option>
								<option value="Yoruba">Yoruba</option>
								<option value="Hausa">Hausa</option>
							</select>
				

					</div>

				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-6 col-md-12">

						<div class="section-title" style="margin-bottom: 50px !important;">
							<h6>Reffree Details</h6>
						</div>

					
						<input type="text" name="f_name" id="fname" placeholder="First Name" required>
					
						<input type="text" name="m_name" id="mname" placeholder="Middle Name" required>
					
						<input type="text" name="l_name" id="lname" placeholder="Last Name" required>
					
						<input type="tel" name="r_phone" id="phone" placeholder="Phone" required>

						<input type="email" name="r_email" id="email" placeholder="E-mail" required>
					
						<input type="text" name="place_of_employment" id="employment" placeholder="Place of Employment" required>
					
						<input type="text" name="position" id="lname" placeholder="Posiition Held" required>
					
						<input type="text" name="office_phone" id="lname" placeholder="Office Phone" required>

                       	
                        <div id="c_status_msg"></div>

                        <?php echo flash_message_success('status_msg'); ?>
                        <?php echo flash_message_danger('status_msg_error'); ?>


						<button type="submit" id="submit" name="submit">Submit</button>
					
					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>

	<!-- Sponsor Area -->

	<div class="client-area section-padding padding-top-0">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo-carousel owl-carousel">

						<?php
    					foreach ($sponsors as $s) { ?>

						<div class="single-logo-wrapper">
							<div class="logo-inner-item">
								<img src="<?php echo base_url('assets/uploads/sponsors/' .$s->photo); ?>" alt="<?php echo $s->name; ?>">
							</div>
						</div>

						<?php } //endforeach } ?>

					</div>
				</div>
			</div>
		</div>
	</div>

