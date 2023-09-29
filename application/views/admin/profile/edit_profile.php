
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

	<div class="new-item">
		<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('profiles/view_profile/'.$y->id); ?>"><i class="fa fa-user"></i> View Profile</a>
	</div>

	<?php 
	$form_attributes = array("target" => "_blank","id"=>"edit_profile");
	echo form_open_multipart('profiles/edit_profile_action/'.$y->id,$form_attributes); ?>
	

	
		<div class="row">
		
			<div class="col-md-6 col-sm-12 col-xs-12">

				<div class="form-group">
	                <label class="form-control-label">Title*</label>
	                <select class="form-control selectpicker" name="title">
	                    <option selected value="<?php echo $y->title; ?>"> <?php echo $y->title; ?> </option>
	                    <?php select_options_vk(user_titles()); ?>
	                </select>
	                <div class="form-error"><?php echo form_error('title'); ?></div>
	            </div>

				<div class="form-group">
					<label class="form-control-label">Full Name</label>
					<br/>
					<input type="text" name="fullname" value="<?php echo set_value('fullname', $y->fullname); ?>" class="form-control" required />
					<div class="form-error"><?php echo form_error('fullname'); ?></div>
				</div>

				<div class="form-group">
					<label class="form-control-label">Email</label>
					<br/>
					<input type="text" name="email" value="<?php echo set_value('email', $y->email); ?>" class="form-control" readonly required />
					<div class="form-error"><?php echo form_error('email'); ?></div>
				</div>
				
				<div class="form-group" >
					<label class="form-control-label m-r-20 ">Sex</label>
					<label class="m-r-10"><input type="radio" name="sex" value="Male" <?php echo set_radio( 'sex', 'Male', radio_value($y->sex, 'Male') ); ?> > Male</label>
					<label><input type="radio" name="sex" value="Female" <?php echo set_radio( 'sex', 'Female', radio_value($y->sex, 'Female') ); ?> > Female</label>
					<div class="form-error"><?php echo form_error('sex'); ?></div>
				</div>

				<div class="form-group">
					<label class="form-control-label">Description</label>
					<textarea class="form-control t100" name="description"> <?php echo set_value('description', $y->description); ?> </textarea>
					<div class="form-error"><?php echo form_error('description'); ?></div>
				</div>

				<div class="form-group">
					<label class="form-control-label">Is he/she in the organisation?</label>
					<br/>
					<select class="form-control" name="organisation" id="organisation"  required>
						<option selected value="<?php echo $y->organisation; ?>"> <?php echo $y->organisation; ?> </option>
						<option value="Yes"> Yes </option>
						<option value="No"> No </option>
					</select>
					<div class="form-error"><?php echo form_error('organisation'); ?></div>
				</div>

				<div class="form-group" id="position_main" style="display: <?php echo ($y->organisation == "No")? "none" : "block"; ?>;">
					<label class="form-control-label">Main Position</label>
					<br/>
					<select class="form-control" name="position_main">
						<option selected value="<?php echo $y->position_main; ?>"> <?php echo $y->position_main; ?> </option>
						<option value="None">None</option>

						<?php
						$positions = $this->org_structures->get_positions();
						foreach ($positions as $p) { ?>
							<option value="<?php echo $p->fullname; ?>" ><?php echo $p->fullname; ?></option>
						<?php } ?>				

					</select>
					<div class="form-error"><?php echo form_error('position_main'); ?></div>
				</div>

				<div class="form-group" id="position_other" style="display: <?php echo ($y->organisation == "No")? "none" : "block"; ?>;">
					<label class="form-control-label">Other Positions</label>
					<br/>
					<select class="form-control selectpicker" name="position_other[]" multiple>
						<option selected value="<?php echo $y->position_other; ?>"> <?php echo $y->position_other; ?> </option>
						<option value="None">None</option>

						<?php
						$positions = $this->org_structures->get_positions();
						foreach ($positions as $p) { ?>
							<option value="<?php echo $p->abbr; ?>" ><?php echo $p->fullname; ?></option>
						<?php } ?>	

					</select>
					<div class="form-error"><?php echo form_error('position_other'); ?></div>
				</div>
			
			</div><!--/.col-->


			<div class="col-md-6 col-sm-12 col-xs-12">

				<div class="form-group">
					<label class="form-control-label">Facebook Handle</label>
					<div class="input-group">
						<div class="input-group-addon bg-facebook">
							<i class="fa fa-facebook"></i>
						</div>
						<input type="text" class="form-control" name="facebook" value="<?php echo set_value('facebook', $y->facebook); ?>" />
						<div class="form-error"><?php echo form_error('facebook'); ?></div>
					</div>
				</div>

				<div class="form-group">
					<label class="form-control-label">Twitter Handle</label>
					<div class="input-group">
						<div class="input-group-addon bg-twitter">
							<i class="fa fa-twitter"></i>
						</div>
						<input type="text" class="form-control" name="twitter" value="<?php echo set_value('twitter', $y->twitter); ?>" />
						<div class="form-error"><?php echo form_error('twitter'); ?></div>
					</div>
				</div>

				<div class="form-group">
					<label class="form-control-label">Instagram Handle</label>
					<div class="input-group">
						<div class="input-group-addon bg-instagram">
							<i class="fa fa-instagram"></i>
						</div>
						<input type="text" class="form-control" name="instagram" value="<?php echo set_value('instagram', $y->instagram); ?>" />
						<div class="form-error"><?php echo form_error('instagram'); ?></div>
					</div>
				</div>

				<div class="form-group">
					<label class="form-control-label">LinkedIn Handle</label>
					<div class="input-group">
						<div class="input-group-addon bg-linkedin">
							<i class="fa fa-linkedin"></i>
						</div>
						<input type="text" class="form-control" name="linkedin" value="<?php echo set_value('linkedin', $y->linkedin); ?>" />
						<div class="form-error"><?php echo form_error('linkedin'); ?></div>
					</div>
				</div>
				
				<div class="form-group">

					<label class="form-control-label">Profile Photo
						<small>(Optional. Only jpg and png files allowed. Max 2MB)</small>
					</label>
				
					<?php 
					if ($y->photo != NULL) { ?>

						<div id="current_image_area" class="image_preview_area" class="m-b-10">
							<img id="current_image" src="<?php echo base_url('assets/uploads/photos/profile/' .$y->photo); ?>" />
						</div>
						<label class="form-control-label" id="change_image_text">Change Photo?</label> <br />

						<div class="file_area">
							<input type="file" name="photo" id="the_image_on_update" class="form-control" accept=".jpeg,.jpg,.png" value="<?php echo set_value('photo'); ?>" />
							<div class="form-error"><?php echo $upload_error['error']; ?></div>
						</div>	
						
					<?php } else { ?>
					
						<div id="current_image_area" class="m-b-10">
							<img id="current_image" src="<?php echo user_avatar; ?>" />
						</div>
						<label class="form-control-label" id="change_image_text">Upload Profile Photo?</label> <br />
						
						<div class="file_area">
							<input type="file" name="photo" id="the_image_on_update" class="form-control" accept=".jpeg,.jpg,.png" value="<?php echo set_value('photo'); ?>" />
							<div class="form-error"><?php echo $upload_error['error']; ?></div>
						</div>
						
					<?php } ?>
					
				</div>
							
				<!-- Image preview-->
				<?php echo generate_image_preview(); ?>
				
				<div id="response_message"></div>
				
				<div class="m-t-20">
					<button class="btn btn-primary btn-lg" id="submit" >Update</button>
				</div>
			
			</div><!--/.col-->
			
		</div><!--/.row-->

	
	<?php echo form_close(); ?>