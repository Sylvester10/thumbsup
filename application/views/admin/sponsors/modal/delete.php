		
		<div class="modal fade" id="delete<?php echo $s->id; ?>" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="pull-right">
							<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" title="Close"> ×</button>
						</div>
						<h4 class="modal-title">Delete: <?php echo $s->name; ?></h4>
					</div><!--/.modal-header-->
					<div class="modal-body">
						Are you sure you want to permanently delete this <!--?php echo $item; ?-->
						<p class="m-t-10"></p>
					</div>
					<div class="modal-footer">
						<a class="btn btn-sm btn-danger" role="button" href="<?php echo base_url('sponsor/delete_sponsor/'.$s->id); ?>"> Yes, Delete </a>
						<button data-dismiss="modal" class="btn btn-sm"> No, Cancel </button>
					</div>
				</div>
			</div>
		</div>