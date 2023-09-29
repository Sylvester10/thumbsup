
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('events/events_list'); ?>"><i class="fa fa-calendar"></i> All Events</a>
</div>	
			

<?php 
echo form_open_multipart('events/edit_event_ajax/'.$y->id);

	$event_date = $y->year .'/'. $y->month .'/'. $y->day; ?>

	<div class="row">

		<div class="col-md-6 col-sm-12 col-xs-12">

			<input type="hidden" id="event_id" value="<?php echo $y->id; ?>" />
					
			<div class="form-group">
				<label class="form-control-label">Start Date</label>
				<div class="input-group date calendar_date_datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" name="event_date" value="<?php echo set_value('event_date', $event_date); ?>" readonly required />
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
					
			<div class="form-group">
				<label class="form-control-label">End Date</label>
				<div class="input-group date calendar_date_datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" name="end_date" value="<?php echo date('Y/m/d', strtotime($y->end_date)); ?>" readonly />
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Event Time</label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input name="time" id="timepicker" type="text" class="form-control input-small" value="<?php echo set_value('time', $y->time); ?>" required readonly />
					<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				</div>
			</div>

			<div class="form-group">
				<label class="form-control-label">End Time</label>
				<div class="input-group bootstrap-timepicker timepicker">
					<input name="end_time" id="timepicker" type="text" class="form-control input-small" value="<?php echo set_value('end_time', $y->end_time); ?>" required readonly />
					<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				</div>
			</div>

            <div class="form-group">
				<label class="form-control-label">Event Venue</label>
				<input type="text" name="venue" class="form-control" value="<?php echo set_value('venue', $y->venue); ?>" required />
			</div>
					
			<div class="form-group">
				<label class="form-control-label">Event Caption</label>
				<input type="text" name="caption" class="form-control" value="<?php echo set_value('caption', $y->caption); ?>" required />
			</div>
			
			<div class="form-group">
				<label class="form-control-label">Event Description</label>
				<textarea id="email_message" name="description" class="form-control t200" required><?php echo set_value('description', $y->description); ?></textarea>
			</div>

			<div class="form-group">
				<label class="form-control-label">Host</label>
				<br/>
				<select class="form-control selectpicker" name="host[]" multiple>
					<option selected value="<?php echo $y->host; ?>"> <?php echo $y->host; ?> </option>
					<option value="None">None</option>

					<?php
					$profiles = $this->common_model->get_profile();
					foreach ($profiles as $d) { ?>
						<option value="<?php echo $d->fullname; ?>" ><?php echo $d->fullname; ?></option>
					<?php } ?>		

				</select>
				<div class="form-error"><?php echo form_error('host'); ?></div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Guests</label>
				<br/>
				<select class="form-control selectpicker" name="guest[]" multiple>
					<option selected value="<?php echo $y->guest; ?>"> <?php echo $y->guest; ?> </option>
					<option value="None">None</option>

					<?php
					$profiles = $this->common_model->get_profile();
					foreach ($profiles as $p) { ?>
						<option value="<?php echo $p->fullname; ?>" ><?php echo $p->fullname; ?></option>
					<?php } ?>	

				</select>
				<div class="form-error"><?php echo form_error('guest'); ?></div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Moderator</label>
				<br/>
				<select class="form-control selectpicker" name="moderator[]" multiple>
					<option selected value="<?php echo $y->moderator; ?>"> <?php echo $y->moderator; ?> </option>
					<option value="None">None</option>

					<?php
					$profiles = $this->common_model->get_profile();
					foreach ($profiles as $p) { ?>
						<option value="<?php echo $p->fullname; ?>" ><?php echo $p->fullname; ?></option>
					<?php } ?>	

				</select>
				<div class="form-error"><?php echo form_error('moderator'); ?></div>
			</div>
					
			<div class="form-group">
				<label class="form-control-label">Zoom Link</label>
				<input type="text" name="zoom_link" class="form-control" value="<?php echo set_value('zoom_link', $y->zoom_link); ?>" />
			</div>
					
			<div class="form-group">
				<label class="form-control-label">Google Form Link</label>
				<input type="text" name="google_form" class="form-control" value="<?php echo set_value('google_form', $y->google_form); ?>" />
			</div>
		
		</div><!--/.col-md-7-->

		<div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
						
			<div class="form-group">
				<label class="form-control-label">Featured Image </label><br />
				
				<div id="current_image_area" class="m-b-10">
					<img id="current_image" src="<?php echo base_url('assets/uploads/events/' .$y->featured_image_thumb); ?>" />
				</div>
				<label class="form-control-label" id="change_image_text">Change image?</label> <br />
				
				<div class="file_area">
					<small>Only JPG and PNG files allowed (max 4MB).</small>
					<input type="file" name="featured_image" id="the_image_on_update" class="form-control" accept=".jpeg,.jpg,.png" />
				</div>
			</div>
			
			<!-- Image preview-->
			<?php echo generate_image_preview(); ?>
			
			<div class="form-group">       
				<button type="submit" class="btn btn-primary m-t-5" id="submit" >Update Event</button>
			</div>
			
		</div><!--/.col-md-4-->
		
	</div><!--/.row-->


<?php echo form_close(); ?>