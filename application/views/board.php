<!-- Breadcroumb Area -->

	<div class="breadcroumb-area bread-bg-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcroumb-title text-center">
						<h1>Board</h1>
						<h6><a href="<?php echo base_url(); ?>">Home</a> / Board</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Team Area -->
	<div class="team-area section-padding">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h6>Meet Our</h6>
						<h2>Dedicated Board of <b>Trustees</b></h2>
					</div>
				</div>
			</div>

			<!-- Test START -->
		    <div>
		        <div id="board_holder">

		            <div>

		            	<?php 
        				if ( count($profiles) > 0) { ?>

		                <!-- First TEAM MEMBER START-->

		                <?php
    					foreach ($profiles as $p) { ?>

		                <div id="single_member" position="founder" name="Mrs. Gloria Ajoge-Adaba">
		                    <div id="member_container">
		                        <div id="top_position">
		                            <span><?php echo $p->position_main; ?></span>
		                        </div>
		                        <div id="image_holder">
		                            <img src="<?php echo base_url('assets/uploads/photos/profile/' .$p->photo); ?>">
		                        </div>
		                        <div id="details">
		                            <div id="details_holder">
		                                <h6><?php echo $p->position_main; ?></h6>
		                                <h3><?php echo $p->title; ?> <?php echo $p->fullname; ?></h3>
		                                <p><?php echo strip_tags($p->description); ?></p>
		                                <div id="socials">
		                                	<?php 
		                                	if($p->facebook != 'https://facebook.com/'){ 
		                                		echo '<a href="'.$p->facebook.'"><i class="la la-facebook"></i></a>';
		                                		} 

		                                	if($p->instagram != 'https://instagram.com/'){ 
		                                		echo '<a href="'.$p->instagram.'"><i class="la la-instagram"></i></a>';
		                                		} 

		                                	if($p->twitter != 'https://twitter.com/'){ 
		                                		echo '<a href="'.$p->twitter.'"><i class="la la-twitter"></i></a>';
		                                		} 

		                                	if($p->linkedin != 'https://linkedin.com/'){ 
		                                		echo '<a href="'.$p->linkedin.'"><i class="la la-linkedin"></i></a>';
		                                		}

		                                	?>

		                                    <a href="mailto:<?php echo $p->email; ?>"><i class="la la-envelope"></i></a>
		                                </div>
		                            </div>
		                            
		                        </div>
		                        
		                    </div>
		                </div>

                		<?php } //endforeach } ?>

		                <!-- First TEAM MEMBER END-->

		                <?php } else { ?>

				            <h3 class="text-danger">No Board Member to show.</h3>

				        <?php } ?>
		            </div>
		        </div>
		    </div>
			<!-- Test  ENDS-->

		</div>
	</div>
