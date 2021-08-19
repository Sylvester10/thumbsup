
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>


<?php 
echo form_open('org_structure/add_structure_ajax'); ?>

	<div class="row">
	
		<div class="col-md-6 col-sm-12 col-xs-12">
				
			<div class="form-group">
				<label class="form-control-label">Type</label>
				<select class="form-control" name="type" required id="type">
					<option value="">Select</option>
					<option value="structure" >Structure</option>
					<option value="position" >Position</option>
				</select>
				<div class="form-error"><?php echo form_error('type'); ?></div>
			</div>

			<div class="form-group" id="position_amount" style="display: none;">
				<label class="form-control-label">Amount</label>
				<br/>
				<input type="text" name="amount" class="form-control" />
				<div class="form-error"><?php echo form_error('amount'); ?></div>
			</div>	

			<div class="form-group">
				<label class="form-control-label">Name</label>
				<br/>
				<input type="text" name="fullname" class="form-control" required />
				<div class="form-error"><?php echo form_error('fullname'); ?></div>
			</div>		

			<div class="form-group">
				<label class="form-control-label">Abbreviation</label>
				<br/>
				<input type="text" name="abbr" class="form-control" required />
				<div class="form-error"><?php echo form_error('abbr'); ?></div>
			</div>	

			<div class="form-group">
				<label class="form-control-label">The structure would be under</label>
				<select class="form-control" name="under" required >
					<option value="">Select</option>

					<?php
					foreach ($structures as $y) { ?>
						<option value="<?php echo $y->abbr; ?>" ><?php echo $y->fullname; ?></option>
					<?php } ?>

				</select>
				<div class="form-error"><?php echo form_error('under'); ?></div>
			</div>

			<div class="form-group">
				<label class="form-control-label">Rank</label>
				<br/>
				<input type="text" name="rank" class="form-control" required />
				<div class="form-error"><?php echo form_error('rank'); ?></div>
			</div>	

			<div class="m-t-20">
				<button class="btn btn-primary btn-lg" id="submit" >Submit</button>
			</div>
		
		</div><!--/.col-->
		
	</div><!--/.row-->


<?php echo form_close(); ?>