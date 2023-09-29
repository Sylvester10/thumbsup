
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>



		
	<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
		
		<thead>
			<tr>
				<th> Actions </th>
				<th class="min-w-150"> Name </th>
				<th> Email</th>
				<th> Phone</th>
				<th> Date</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach ($applicants as $t) {  ?>

				<tr>
					<?php require "application/views/admin/applicants/modal/option.php";  ?>	
					<td class="w-15-p text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#options<?php echo $t->id; ?>"><i class="fa fa-navicon"></i></button></td>
					<td><?php echo $t->fullname ?></td>
					<td><?php echo $t->email; ?></td>
					<td><?php echo $t->number; ?></td>
					<td><?php echo $t->date_added; ?></td>

				</tr>

			<?php } ?>

		</tbody>
	</table>