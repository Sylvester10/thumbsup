
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('events/events_list'); ?>"><i class="fa fa-calendar"></i> All Events</a>
</div>	
			

	
<?php 
echo form_open_multipart('events/create_event_ajax'); ?>

	<div class="row">

		<div class="col-md-7 col-sm-12 col-xs-12">
							
			<div class="form-group">
				<label class="form-control-label">Start Date</label>
				<div class="input-group date calendar_date_datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" name="event_date" value="<?php echo set_value('event_date', default_calendar_date()); ?>" required readonly />
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
							
			<div class="form-group">
				<label class="form-control-label">End Date</label>
				<div class="input-group date calendar_date_datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" name="end_date" value="<?php echo set_value('end_date', default_calendar_date()); ?>" readonly />
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Start Time</label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input name="time" id="timepicker" type="text" class="form-control input-small" required readonly />
					<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">End Time</label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input name="end_time" id="timepicker" type="text" class="form-control input-small" readonly />
					<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Event Venue</label>
				<input type="text" name="venue" class="form-control" value="<?php echo set_value('venue', 'School Premises'); ?>" required />
			</div>

			<div class="form-group">
				<label class="form-control-label">Event Caption</label>
				<input type="text" name="caption" class="form-control" value="<?php echo set_value('caption'); ?>" required />
			</div>
			
			<div class="form-group">
				<label class="form-control-label">Event Description</label>
				<textarea  id="email_message" name="description" class="form-control t200" required><?php echo set_value('description'); ?></textarea>
			</div>

			<div class="form-group">
				<label class="form-control-label">Host</label>
				<br/>
				<select class="form-control selectpicker" name="host[]" multiple>
					<option value="">Select</option>

					<?php
					$profiles = $this->common_model->get_profile();
					foreach ($profiles as $p) { ?>
						<option value="<?php echo $p->fullname; ?>" ><?php echo $p->fullname; ?></option>
					<?php } ?>				

				</select>
				<div class="form-error"><?php echo form_error('host'); ?></div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Guests</label>
				<br/>
				<select class="form-control selectpicker" name="guest[]" multiple>
					<option value=""> Select </option>	

					<?php
					$profiles = $this->common_model->get_profile();
					foreach ($profiles as $y) { ?>
						<option value="<?php echo $y->fullname; ?>" ><?php echo $y->fullname; ?></option>
					<?php } ?>	

				</select>
				<div class="form-error"><?php echo form_error('guest'); ?></div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Moderator</label>
				<br/>
				<select class="form-control selectpicker" name="moderator[]" multiple>
					<option value=""> Select </option>	

					<?php
					$profiles = $this->common_model->get_profile();
					foreach ($profiles as $y) { ?>
						<option value="<?php echo $y->fullname; ?>" ><?php echo $y->fullname; ?></option>
					<?php } ?>	

				</select>
				<div class="form-error"><?php echo form_error('guest'); ?></div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Zoom Link</label>
				<input type="text" name="zoom_link" class="form-control" value="<?php echo set_value('zoom_link'); ?>" />
			</div>

			<div class="form-group">
				<label class="form-control-label">Google Form Link</label>
				<input type="text" name="google_form" class="form-control" value="<?php echo set_value('google_form'); ?>" />
			</div>
			
		</div><!--/.col-md-7-->

		<div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
						
			<div class="form-group">
				<label class="form-control-label">Upload Featured Image </label><br />
				<small>Only JPG and PNG files allowed (max 4MB).</small>
				<input type="file" name="featured_image" id="the_image" class="form-control" accept=".jpeg,.jpg,.png" required />
				<div class="form-error"><?php echo $error; ?></div>
			</div>
			
			<!-- Image preview-->
			<?php echo generate_image_preview(); ?>
			
			<div class="form-group">       
				<button type="submit" class="btn btn-primary m-t-5" id="submit" >Create event</button>
			</div>
			
		</div><!--/.col-md-6-->

	</div><!--/.row-->

<?php echo form_close(); ?>