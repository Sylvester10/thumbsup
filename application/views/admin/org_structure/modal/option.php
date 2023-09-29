
	


<!--Class Options-->
	<div class="modal fade" id="options<?php echo $y->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-width">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Actions</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">

					 <?php
                     if ($y->type == 'structure') { ?>

                        <p><a type="button" href="<?php echo base_url('org_structure/edit_structure/'.$y->id); ?>" class="btn btn-default btn-sm btn-block action-btn clickable"> <i class="fa fa-pencil" style="color: green"></i> &nbsp; Edit </a></p>

                     <?php } else { ?>

                        <p><a type="button" href="<?php echo base_url('org_structure/edit_position/'.$y->id); ?>" class="btn btn-default btn-sm btn-block action-btn clickable"> <i class="fa fa-pencil" style="color: green"></i> &nbsp; Edit </a></p>

                     <?php } ?>
					
					
					<p><a type="button" href="#" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#delete<?php echo $y->id; ?>"> <i class="fa fa-trash" style="color: red"></i> &nbsp; Delete </a></p>
					
				</div> 
			</div>
		</div>
	</div>
	
<?php require "application/views/admin/org_structure/modal/delete.php";  ?>
