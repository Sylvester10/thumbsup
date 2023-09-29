
	


<!--Class Options-->
	<div class="modal fade" id="options<?php echo $t->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-width">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Actions</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">

					<p><a type="button" href="<?php echo base_url('form/admission_form/'.$t->id); ?>" class="btn btn-default btn-sm btn-block action-btn clickable"> <i class="fa fa-eye" style="color: green"></i> &nbsp; View Form </a></p>
										
					<p><a type="button" href="<?php echo base_url('form/edit_form/'.$t->id); ?>" class="btn btn-default btn-sm btn-block action-btn clickable"> <i class="fa fa-pencil" style="color: black"></i> &nbsp; Edit Form </a></p>
					
					<p><a type="button" href="#" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#delete_form<?php echo $t->id; ?>"> <i class="fa fa-trash" style="color: red"></i> &nbsp; Delete Form </a></p>
					
				</div>
			</div>
		</div>
	</div>
	
<?php require "application/views/admin/admission/modal/edit_form.php";  ?>
<?php require "application/views/admin/admission/modal/delete_form.php";  ?>
