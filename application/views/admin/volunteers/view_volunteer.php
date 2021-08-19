
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('volunteers'); ?>"> Back </a>
</div>


<div class="row">

	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 profile_details">
  		
		<h3 class="text-bold"><i class="fa fa-user f-s-30"></i> Personal Information</h3>
  		<p><b>Email:</b> <?php echo $y->email; ?></p>
  		<p><b>Phone:</b> <?php echo $y->phone; ?></p>

		<ul class="list-unstyled">
        	<li><b>Address: </b> <?php echo $y->address; ?> </li>
        	<li><b>State of Reseidence </b> <?php echo $y->state; ?></li>
        	<li><b>State of work: </b><?php echo $y->residence; ?></li>
        	<li><b>Educational Qualification: </b> <?php echo $y->qualification; ?></li>
        	<li><b>Language: </b> <?php echo $y->language; ?></li>
        	<li><b>Date of availability: </b> <?php echo $y->availability; ?></li>
      	</ul>

	</div>

	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

		<h3 class="text-bold"><i class="fa fa-user f-s-30"></i> Reffree Information</h3>
		<p><b>Reffree Name:</b> <?php echo $y->f_name .' '. $y->m_name .' '. $y->l_name; ?></p>
		<p><b>Phone:</b> <?php echo $y->r_phone; ?></p>
		<p><b>Email:</b> <?php echo $y->r_email; ?></p>
		<p><b>Place of Employment:</b> <?php echo $y->place_of_employment; ?></p>
		<p><b>Position Held:</b> <?php echo $y->position; ?></p>
		<p><b>Office Phone:</b> <?php echo $y->office_phone; ?></p>

	</div>

</div>