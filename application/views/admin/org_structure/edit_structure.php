
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('all_structures'); ?>"><i class="fa fa-user"></i> All Structures</a>
</div>


<?php 
echo form_open('org_structure/edit_ajax/'.$y->id); ?>

	<div class="row">
	
		<div class="col-md-6 col-sm-12 col-xs-12">
				
			<div class="form-group">
				<label class="form-control-label">Type</label>
				<select class="form-control" name="type" required id="type">
					<option value="<?php echo $y->type; ?>"><?php echo ucfirst($y->type); ?></option>
					<option value="structure" >Structure</option>
					<option value="position" >Position</option>
				</select>
				<div class="form-error"><?php echo form_error('type'); ?></div>
			</div>

			<div class="form-group" id="position_amount" style="display: none;">
				<label class="form-control-label">Amount</label>
				<br/>
				<input type="text" name="amount" value="<?php echo set_value('amount', $y->amount); ?>" class="form-control" />
				<div class="form-error"><?php echo form_error('amount'); ?></div>
			</div>	

			<div class="form-group">
				<label class="form-control-label">Name</label>
				<br/>
				<input type="text" name="fullname" value="<?php echo set_value('fullname', $y->fullname); ?>" class="form-control" required />
				<div class="form-error"><?php echo form_error('fullname'); ?></div>
			</div>		

			<div class="form-group">
				<label class="form-control-label">Abbreviation</label>
				<br/>
				<input type="text" name="abbr" value="<?php echo set_value('abbr', $y->abbr); ?>" class="form-control" required />
				<div class="form-error"><?php echo form_error('abbr'); ?></div>
			</div>	

			<div class="form-group">
				<label class="form-control-label">The structure would be under</label>
				<select class="form-control" name="under"  required >
					<option value="<?php echo $y->abbr; ?>"><?php echo $y->fullname; ?></option>

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
				<input type="text" name="rank" value="<?php echo set_value('rank', $y->rank); ?>" class="form-control" required />
				<div class="form-error"><?php echo form_error('rank'); ?></div>
			</div>	

			<div class="m-t-20">
				<button class="btn btn-primary btn-lg" id="submit" >Submit</button>
			</div>
		
		</div><!--/.col-->
		
	</div><!--/.row-->


<?php echo form_close(); ?>