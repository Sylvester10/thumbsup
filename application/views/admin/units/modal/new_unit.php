

	<div class="modal fade" id="new_unit" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-form-sm">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">New Unit</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
					<?php 
					$form_attributes = array("id" => "new_unit_form");
					echo form_open('units/add_new_unit_ajax', $form_attributes); ?>
					
						
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<br/>
							<select class="form-control" name="name" required>
								<option value=""> Select </option>

								<?php
								foreach ($unit_options as $y) { ?>
									<option value="<?php echo $y->fullname; ?>" ><?php echo $y->fullname; ?></option>
								<?php } ?>				

							</select>
							<div class="form-error"><?php echo form_error('name'); ?></div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Description</label>
							<br/>
							<textarea id="" is="editor" name="description" value="<?php echo set_value('description'); ?>" class="form-control t100" required ></textarea>
							<div class="form-error"><?php echo form_error('description'); ?></div>
						</div>
						
						<div id="status_msg"></div>
						
						<div>
							<button class="btn btn-primary" id="submit" >Submit </button>
						</div>

					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>