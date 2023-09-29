
	


<!--Class Options-->
	<div class="modal fade" id="options<?php echo $s->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-width">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Actions</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
										
					<p><a type="button" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#edit_sponsor<?php echo $s->id; ?>"> <i class="fa fa-pencil" style="color: green"></i> &nbsp; Edit Sponsor </a></p>
					
					<p><a type="button" class="btn btn-default btn-sm btn-block action-btn" href="<?php echo base_url('sponsor/delete_sponsor/'.$s->id); ?>"> <i class="fa fa-trash" style="color: red"></i> &nbsp; Delete Sponsor </a></p>

					<?php 

						if ($s->published == 'true') { ?>

							<p><a type="button" href="<?php echo base_url('sponsor/unpublish_sponsor/'.$s->id); ?>" class="btn btn-default btn-sm btn-block action-btn"></i> &nbsp; Unpublish Testimony </a></p>

							
						<?php } else { ?>

							<p class="pub"><a type="button" href="<?php echo base_url('sponsor/publish_sponsor/'.$s->id); ?>" class="btn btn-default btn-sm btn-block action-btn"></i> &nbsp; Publish Testimony </a></p>

					<?php } ?>


					
				</div>
			</div>
		</div>
	</div>
	
<?php require "application/views/admin/sponsors/modal/edit_sponsor.php";  ?>
<?php require "application/views/admin/sponsors/modal/delete.php";  ?>
