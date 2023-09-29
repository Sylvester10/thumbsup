
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('profiles/edit_profile/'.$y->id); ?>"><i class="fa fa-pencil"></i> Edit Profile</a>
</div>


<div class="row">

	<div class="col-md-4 col-sm-12 col-xs-12 profile_details">
	    <div class="well profile_view">
	      	<div class="col-sm-12">
	        	<div class="left col-xs-7">
	          		<h2 class="text-bold"><?php echo $y->fullname; ?></h2>
	        	</div>
	        	<div class="right col-xs-5 text-center">
		        	<?php
					if ($y->photo != NULL) { ?>
						<img class="img-circle img-responsive" src="<?php echo base_url('assets/uploads/photos/profile/' .$y->photo); ?>" />
					<?php } else { ?>
						<img class="img-circle img-responsive" src="<?php echo user_avatar; ?>" />
					<?php } ?>
	        	</div>
	        	<div class="col-xs-12">
	        		<ul class="list-unstyled">
		            	<li><i class="fa fa-envelope"></i> <?php echo $y->email; ?> </li>
		            	<li><i class="fa fa-user"></i> <?php echo $y->sex; ?> </li>
		          	</ul>
		        </div>
	      	</div>
	      	<hr />
	      	<div class="col-xs-12 bottom">
	        	<div class="emphasis">
	        		<div class="social_icon_round35 bg-facebook inline-block">
		          		<a href="<?php echo $y->facebook; ?>" class="text-white">
		          			<p><i class="fa fa-facebook"></i> <?php echo $y->facebook; ?> </p>
		          		</a>
		          	</div>
		          	<div class="social_icon_round35 bg-twitter inline-block">
		          		<a href="<?php echo $y->twitter; ?>" class="text-white">
		          			<p><i class="fa fa-twitter"></i> <?php echo $y->twitter; ?> </p>
		          		</a>
		          	</div>
		          	<div class="social_icon_round35 bg-instagram inline-block">
		          		<a href="<?php echo $y->instagram; ?>" class="text-white">
		          			<p><i class="fa fa-instagram"></i> <?php echo $y->instagram; ?> </p>
		          		</a>
		          	</div>
		          	<div class="social_icon_round35 bg-linkedin inline-block">
		          		<a href="<?php echo $y->linkedin; ?>" class="text-white">
		          			<p><i class="fa fa-linkedin"></i> <?php echo $y->linkedin; ?> </p>
		          		</a>
		          	</div>
	        	</div>
	      	</div>
	    </div>
	</div>

	<div class="col-md-8 col-sm-12 col-xs-12">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-bold"><i class="fa fa-briefcase f-s-30"></i> Employment Information</h3>
	  		<p><b>Organisation:</b> <?php echo $y->organisation; ?></p>
	  		<p><b>Main Position:</b> <i><?php echo $y->position_main; ?></i></p>
	  		<p><b>Other Position:</b> <i><?php echo $y->position_other; ?></i></p>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-bold"><i class="fa fa-lightbulb-o f-s-30"></i> Description</h3>
			<p> <?php echo $y->description; ?> </p>
		</div>

	</div>

</div>


