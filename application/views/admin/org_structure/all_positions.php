
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>



		
	<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
		
		<thead>
			<tr>
				<th> Actions </th>
				<th class="min-w-150"> Name </th>
				<th> Abbreviation</th>
				<th> Under</th>
				<th> Rank</th>
				<th> Type</th>
				<th> Amount</th>
				<th> Date</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach ($positions as $y) {  ?>

				<tr>

					<?php require "application/views/admin/org_structure/modal/option.php";  ?>	
					<td class="w-15-p text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#options<?php echo $y->id; ?>"><i class="fa fa-navicon"></i></button></td>
					<td><?php echo $y->fullname ?></td>
					<td><?php echo $y->abbr; ?></td>
					<td><?php echo $y->under; ?></td>
					<td><?php echo $y->rank; ?></td>
					<td><?php echo ucfirst($y->type); ?></td>
					<td><?php echo $y->amount; ?></td>
					<td><?php echo x_date($y->date_added); ?></td>

				</tr>

			<?php } ?> 

		</tbody>
	</table>