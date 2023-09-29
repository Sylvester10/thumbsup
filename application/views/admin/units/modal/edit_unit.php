
	<div class="modal fade" id="edit_unit" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-form-sm">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Edit Unit</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
					<!--<?php 
					$form_attributes = array("id" => "edit_unit_form");
					echo form_open('units/edit_unit_action/'.$u->id); ?>
						
						<form id="edit_unit_form" unit="<?php echo $u->id; ?>">
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<br/>
							<input id="update_name" type="text" name="name" value="<?php echo set_value('name', $u->name); ?>" class="form-control" required />
							<div class="form-error"><?php echo form_error('name'); ?></div>
						</div>

						<div class="form-group">
							<label class="form-control-label">Description</label>
							<br/>
							<textarea is="editor" name="description" value="<?php echo set_value('description', $u->description); ?>"  class="form-control t100" required><?php echo $u->description; ?></textarea>
							<div class="form-error"><?php echo form_error('description'); ?></div>
						</div>
						
						<div id="status_msg"></div>
						
						<div>
							<button class="btn btn-primary" id="submit" >Update </button>
						</div>
					</form>

					<?php echo form_close(); ?> -->

				</div>
			</div>
		</div>
	</div>