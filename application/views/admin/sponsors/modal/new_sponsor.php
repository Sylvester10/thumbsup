

	<div class="modal fade" id="new_sponsor" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-form-sm">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">New Sponsor</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
					<?php 
					$form_attributes = array("id" => "new_sponsors_form");
					echo form_open_multipart('sponsor/add_new_sponsor_ajax', $form_attributes); ?>
					
						
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<br/>
							<input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" required />
							<div class="form-error"><?php echo form_error('name'); ?></div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Photo*
								<small>(Only jpg and png files allowed. Max 2MB)</small>
							</label>
							<input type="file" name="photo" id="the_image" class="form-control" accept=".jpeg,.jpg,.png" required />
							<div class="form-error"><?php echo form_error('photo'); ?> </div>
						</div>
						
						<!-- Image preview-->
						<?php echo generate_image_preview(); ?>
						
						<div id="status_msg"></div>
						
						<div>
							<button class="btn btn-primary" id="submit" >Submit </button>
						</div>

					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>