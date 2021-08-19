
	


<!--Class Options-->
	<div class="modal fade" id="options<?php echo $u->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-width">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Actions</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
										
					<p><a type="button" unit="<?php echo $u->id; ?>" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#edit_unit"> <i class="fa fa-pencil" style="color: green"></i> &nbsp; Edit Unit </a></p>
					
					<p><a type="button" href="#" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#delete_unit<?php echo $u->id; ?>"> <i class="fa fa-trash" style="color: red"></i> &nbsp; Delete Unit </a></p>

					<?php 

						if ($u->published == 'true') { ?>

							<p><a type="button" href="<?php echo base_url('units/unpublish_unit/'.$u->id); ?>" class="btn btn-default btn-sm btn-block action-btn"></i> &nbsp; Unpublish Unit </a></p>

							
						<?php } else { ?>

							<p class="pub"><a type="button" href="<?php echo base_url('units/publish_unit/'.$u->id); ?>" class="btn btn-default btn-sm btn-block action-btn"></i> &nbsp; Publish Unit </a></p>

					<?php } ?>


					
				</div>
			</div>
		</div>
	</div>
	
<?php //require "application/views/admin/units/modal/edit_unit.php";  ?>
<?php require "application/views/admin/units/modal/delete_unit.php";  ?>
