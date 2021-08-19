
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>



		
	<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
		
		<thead>
			<tr>
				<th> Actions </th>
				<th class="min-w-150"> Student Name </th>
				<th> Parent Nmae </th>
				<th>Parent Email</th>
				<th>Parent Phone</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach ($primary_forms as $t) {  ?>

				<tr>
					<?php require "application/views/admin/admission/modal/option.php";  ?>	
					<td class="w-15-p text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#options<?php echo $t->id; ?>"><i class="fa fa-navicon"></i></button></td>
					<td><?php echo $t->student_name; ?></td>
					<td><?php echo $t->father_name; ?></td>
					<td><?php echo $t->father_email; ?></td>
					<td><?php echo $t->father_number; ?></td>
				</tr>

			<?php } ?>

		</tbody>
	</table>