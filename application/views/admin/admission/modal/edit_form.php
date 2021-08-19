
	<div class="modal fade" id="edit_testimonial<?php echo $t->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-form-sm">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Edit Testimony</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
					<?php 
					echo form_open('testimonial/edit_testimonial_action/'.$t->id); ?>
					
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<br/>
							<input type="text" name="name" value="<?php echo set_value('name', $t->name); ?>" class="form-control" required />
							<div class="form-error"><?php echo form_error('name'); ?></div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Testimony</label>
							<br/>
							<textarea name="testimony" class="form-control t100" required ><?php echo $t->testimony; ?></textarea>
							<div class="form-error"><?php echo form_error('testimony'); ?></div>
						</div>
						
						<div id="status_msg"></div>
						
						<div>
							<button class="btn btn-primary">Update </button>
						</div>

					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>