	
	
	
	<!--Edit Class-->
	<div class="modal fade" id="edit<?php echo $y->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-form-sm">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Edit Form: <?php echo $y->student_name; ?></h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
					<?php 
					echo form_open('admission/edit_form/'.$y->id); ?>
					
						<div class="form-group">
							<label class="form-control-label">Class</label>
							<input type="text" name="class" value="<?php echo $y->class; ?>" class="form-control" required />
						</div>

						<div class="form-group">
							<label class="form-control-label">Level</label>
							<input type="text" name="level" value="<?php echo $y->level; ?>" class="form-control" required />
						</div>

						<div class="form-group">
							<label class="form-control-label">Order Level <small>(Required to help with ordering)</small></label>
							<select class="form-control selectpicker" name="order_level">
								<option selected value="<?php echo $y->order_level; ?>"><?php echo $y->order_level; ?></option>
								<?php 
								for ($i = 1; $i <= 99; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</div>
						
						<div class="form-group">
							<label class="form-control-label">Section</label>
							<select class="form-control selectpicker" name="section_id" required>
								<?php 
								//check if any section has been created
								if ( count($sections) === 0 ) { ?>
								
									<option value="">No sections found!</option>
								
								<?php } else { 

									$section = $this->common_model->get_section_details($y->section_id)->section; ?>
								
									<option selected value="<?php echo $y->section_id; ?>"><?php echo $section; ?></option>
									<?php
									//list the sections
									foreach ($sections as $st) { ?>
										<option value="<?php echo $st->id; ?>"><?php echo $st->section; ?></option>
									<?php } //endforeach ?>
									
								<?php } //endif ?>
							</select>
						</div>
						
						<div class="form-group">
							<label class="form-control-label">Class Teacher: <?php echo $this->common_model->get_class_teacher_name($y->id); ?></label>
							<select class="form-control selectpicker" name="class_teacher_id">
								<?php 
								//check if any section has been created
								if ( count($teachers) === 0 ) { ?>
								
									<option value="">No teachers found!</option>
								
								<?php } else { 

									if ($y->class_teacher_id == NULL) { ?>
										<option value="">Leave unassigned</option>
									<?php } else { ?>
										<option value="<?php echo $y->class_teacher_id; ?>"><?php echo $this->common_model->get_class_teacher_name($y->id); ?></option>
									<?php }
									
									//list the teachers
									foreach ($teachers as $t) { ?>
										<option value="<?php echo $t->id; ?>"><?php echo $t->name; ?></option>
									<?php } //endforeach ?>
									
								<?php } //endif ?>
							</select>
						</div>
						
						<div>
							<button class="btn btn-primary">Update</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	
	