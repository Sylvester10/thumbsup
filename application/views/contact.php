
	<!-- Breadcroumb Area -->

	<div class="breadcroumb-area bread-bg-7">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcroumb-title text-center">
						<h1>Contact Us</h1>
						<h6><a href="<?php echo base_url(); ?>">Home</a> / Contact Us</h6>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Map Area 

	<div class="map-area section-padding pad-bot-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="map-section">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79502.31405523678!2d-0.14129405063058142!3d51.4866584244681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876056c23490e4f%3A0x268033680c352ea!2sChelsea%2C%20London%2C%20UK!5e0!3m2!1sen!2sbd!4v1588410434742!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						<i class="las la-map-marker"></i>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Contact Area -->

	<div class="contact-section section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12">
					<div class="section-title">
						<h6>Contact Us</h6>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<h5>Lagos Office</h5>
							<div class="contact-detail">
								<p><i class="las la-mobile"></i><b>Phone</b>
									<span><?php echo business_phone_number; ?></span>
								</p>
							</div>

							<div class="contact-detail">
								<p><i class="las la-map-marker"></i><b>Address</b>
									<span>No 20 Adepeju Road</span>
									<span><?php echo business_address; ?></span>
								</p>
							</div>

							<div class="contact-detail">
								<p><i class="las la-envelope"></i><b>Email</b>
									<span><?php echo business_contact_email; ?></span>
									<span><?php echo business_contact_email; ?></span>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="contact-form">

						<?php 
		                $form_attributes = array("id" => "contact_us_form");
		                echo form_open('home/contact_us_ajax', $form_attributes); ?>

						<h5>Get in Touch</h5>
						
							<input type="text" name="name" id="name" placeholder="Name">

							<input type="email" name="email" id="email" placeholder="Your E-mail">

							<input type="text" name="subject" id="subject" placeholder="Subject">

							<textarea name="message" cols="30" rows="10" placeholder="How can help you?"></textarea>

                           	
	                        <div id="c_status_msg"></div>

	                        <?php echo flash_message_success('status_msg'); ?>
	                        <?php echo flash_message_danger('status_msg_error'); ?>

							<button type="submit" name="submit">Send Message</button>
						
						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>



	