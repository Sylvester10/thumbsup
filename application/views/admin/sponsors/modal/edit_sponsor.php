
	<div class="modal fade" id="edit_sponsor<?php echo $s->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-form-sm">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Edit Sponsor</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
					<?php 
					$form_attributes = array("id" => "edit_sponsor_form");
					echo form_open_multipart('sponsor/edit_sponsor_action/'.$s->id, $form_attributes); ?>
					
					
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<br/>
							<input type="text" name="name" value="<?php echo set_value('name', $s->name); ?>" class="form-control" required />
							<div class="form-error"><?php echo form_error('name'); ?></div>

						<div class="form-group">

							<label class="form-control-label">Photo
								<small>(Optional. Only jpg and png files allowed. Max 2MB)</small>
							</label>

							<div id="current_image_area" class="image_preview_area" class="m-b-10">
								<img id="current_image" src="<?php echo base_url('assets/uploads/sponsors/' .$s->photo); ?>" />
							</div>
							<label class="form-control-label" id="change_image_text">Change Photo?</label> <br />

							<div class="file_area">
								<input type="file" name="photo" id="the_image_on_update" class="form-control" accept=".jpeg,.jpg,.png" value="<?php echo set_value('photo'); ?>" />
								<div class="form-error"><?php echo form_error('photo'); ?></div>
							</div>								
						</div>
							
						<!-- Image preview-->
						<?php echo generate_image_preview(); ?>
						
						<div id="status_msg"></div>
						
						<div>
							<button class="btn btn-primary" use="ajax" id="submit" >Update </button>
						</div>

					

					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>