	<div class="modal fade" id="edit_unit" role="dialog" style="z-index: 999999; -webkit-transform: translate3d(0,0,1px);
transform: translate3d(0,0,1px);">
		<div class="modal-dialog">
			<div class="modal-content modal-form-sm">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Edit Unit</h4>
				</div><!--/.modal-header-->
				<div class="modal-body" id="all_edit_unit_response">
					<h1>Please Wait</h1>
					<p>fetching data</p>
					

				</div>
			</div>
		</div>
	</div>




<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

	<?php require "application/views/admin/units/modal/new_unit.php";  ?>

	<div class="new-item">
		<a class="btn btn-default btn-sm button-adjust" data-toggle="modal" data-target="#new_unit"><i class="fa fa-plus"></i> New Unit</a> 
	</div>


	<div class="m-b-30">
		<p><i class="fa fa-th-large"></i> All: <?php echo number_format($total_records); ?></p>
	</div>

		
	<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
		
		<thead>
			<tr>
				<th> Actions </th>
				<th class="min-w-150"> Name </th>
				<th> Description </th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach ($units as $u) {  ?>

				<tr>
					<?php require "application/views/admin/units/modal/option.php";  ?>	
					<td class="w-15-p text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#options<?php echo $u->id; ?>"><i class="fa fa-navicon"></i></button></td>
					<td><?php echo $u->name; ?></td>
					<td><?php echo $u->description; ?></td>
					<?php 
						if ($u->published != 'true') { ?>
							<td class="unpub">Unpublished</td>
						<?php } else { ?>
							<td class="pub">Published</td>
						<?php } ?>
				</tr>

			<?php } ?>

		</tbody>
	</table>