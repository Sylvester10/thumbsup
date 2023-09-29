
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('profiles'); ?>"><i class="fa fa-users"></i> All Profiles</a>
</div>


<?php 
$form_attributes = array("target" => "_blank","id"=>"new_profile");
echo form_open_multipart('profiles/new_profile_action',$form_attributes); ?>
	
	All fields marked * are required.

	<div class="row">
	
		<div class="col-md-6 col-sm-12 col-xs-12">

			<div class="form-group">
                <label class="form-control-label">Title*</label>
                <select class="form-control selectpicker" name="title">
                    <option value="">Select</option>
                    <?php select_options_vk(user_titles()); ?>
                </select>
                <div class="form-error"><?php echo form_error('title'); ?></div>
            </div>
			
			<div class="form-group">
				<label class="form-control-label">Full Name*</label>
				<br/>
				<input type="text" name="fullname" class="form-control"  />
				<div class="form-error"><?php echo form_error('fullname'); ?></div>
			</div>
			
			<div class="form-group">
				<label class="form-control-label">Email*</label>
				<br/>
				<input type="email" name="email" class="form-control"  />
				<div class="form-error"><?php echo form_error('email'); ?></div>
			</div>
			
			<div class="form-group" >
				<label class="form-control-label m-r-20 ">Sex*</label>
				<label class="m-r-10" ><input type="radio" name="sex" value="Male" <?php echo set_radio('sex', 'Male'); ?> > Male</label>
				<label><input type="radio" name="sex" value="Female" <?php echo set_radio('sex', 'Female'); ?> > Female</label>
				<div class="form-error"><?php echo form_error('sex'); ?></div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Description*</label>
				<textarea class="form-control t100" name="description"></textarea>
				<div class="form-error"><?php echo form_error('description'); ?></div>
			</div>	

			<div class="form-group">
				<label class="form-control-label">Is he/she in the organisation?*</label>
				<br/>
				<select class="form-control" name="organisation" id="organisation" >
					<option value=""> Select </option>
					<option value="Yes"> Yes </option>
					<option value="No"> No </option>
				</select>
				<div class="form-error"><?php echo form_error('organisation'); ?></div>
			</div>

			<div class="form-group" id="position_main" style="display: none;">
				<label class="form-control-label">Main Position*</label>
				<br/>
				<select class="form-control" name="position_main">
					<option value=""> Select </option>
					<option value="None">None</option>

					<?php
					$positions = $this->org_structures->get_positions();
					foreach ($positions as $y) { ?>
						<option value="<?php echo $y->fullname; ?>" ><?php echo $y->fullname; ?></option>
					<?php } ?>				

				</select>
				<div class="form-error"><?php echo form_error('position_main'); ?></div>
			</div>

			<div class="form-group" id="position_other" style="display: none;">
				<label class="form-control-label">Other Positions*</label>
				<br/>
				<select class="form-control selectpicker" name="position_other[]" multiple>
					<option value=""> Select </option>						
					<option value="None">None</option>

					<?php
					$positions = $this->org_structures->get_positions();
					foreach ($positions as $y) { ?>
						<option value="<?php echo $y->abbr; ?>" ><?php echo $y->fullname; ?></option>
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
					<input type="text" class="form-control" name="facebook" value="<?php echo set_value('facebook', 'https://facebook.com/'); ?>" />
					<div class="form-error"><?php echo form_error('facebook'); ?></div>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Twitter Handle</label>
				<div class="input-group">
					<div class="input-group-addon bg-twitter">
						<i class="fa fa-twitter"></i>
					</div>
					<input type="text" class="form-control" name="twitter" value="<?php echo set_value('twitter', 'https://twitter.com/'); ?>" />
					<div class="form-error"><?php echo form_error('twitter'); ?></div>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Instagram Handle</label>
				<div class="input-group">
					<div class="input-group-addon bg-instagram">
						<i class="fa fa-instagram"></i>
					</div>
					<input type="text" class="form-control" name="instagram" value="<?php echo set_value('instagram', 'https://instagram.com/'); ?>" />
					<div class="form-error"><?php echo form_error('instagram'); ?></div>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">LinkedIn Handle</label>
				<div class="input-group">
					<div class="input-group-addon bg-linkedin">
						<i class="fa fa-linkedin"></i>
					</div>
					<input type="text" class="form-control" name="linkedin" value="<?php echo set_value('linkedin', 'https://linkedin.com/'); ?>" />
					<div class="form-error"><?php echo form_error('linkedin'); ?></div>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Photo*
					<small>(Only jpg and png files allowed. Max 2MB)</small>
				</label>
				<input type="file" name="photo" id="the_image" class="form-control" />
				<div class="form-error"><?php echo form_error('photo'); ?> </div>
			</div>
						
			<!-- Image preview-->
			<?php echo generate_image_preview(); ?>

			<div id="response_message"></div>

			<div class="m-t-20">
				<button class="btn btn-primary btn-lg" id="submit" >Submit</button>
			</div>
		
		</div><!--/.col-->
		
	</div><!--/.row-->


<?php echo form_close(); ?>