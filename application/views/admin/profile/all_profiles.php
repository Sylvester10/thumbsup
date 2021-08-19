

<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

	<div class="new-item">
		<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('profiles/new_profile'); ?>"><i class="fa fa-plus"></i> New Profile</a>
	</div>
	
	
	<?php 
	//select options bulk actions 
	$options_array = array(
		//'value' => 'Caption'
		'delete' => 'Delete'
	); 
	echo modal_bulk_actions('profiles/bulk_actions_profile', $options_array); ?>
	
		<div class="table-scroll">
			<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">

				<input type="hidden" id="csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>" />
				
				<thead>
					<tr>
						<th class="w-15-p"> <input type="checkbox" class="radio-box select_all" /> </th>
						<th> Actions </th>
						<th class=""> Photo </th>
						<th class="min-w-200"> Full Name </th>
						<th class="min-w-200"> Organisation </th>
						<th class="min-w-200"> Main Position </th>
						<th class="min-w-200"> Other Position </th>
						<th class="min-w-200"> Email Address </th>
						<th class=""> Sex </th>
						<th class="min-w-150"> Date </th>	
					</tr>
				</thead>
				<tbody>

					<?php
					foreach ($profiles as $y) {  ?>


						<tr>

							<td class="w-15-p text-center"> <?php echo checkbox_bulk_action($y->id); ?></td>
							
							<?php require "application/views/admin/profile/modal/delete.php";  ?>
							<td class="w-15-p text-center">

								<p><a type="button" href="<?php echo base_url('profiles/view_profile/'.$y->id); ?>" class="btn btn-default btn-sm btn-block action-btn clickable"> <i class="fa fa-eye" style="color: green"></i> &nbsp; View </a></p>

								<p><a type="button" href="<?php echo base_url('profiles/edit_profile/'.$y->id); ?>" class="btn btn-default btn-sm btn-block action-btn clickable"> <i class="fa fa-pencil" style="color: green"></i> &nbsp; Edit </a></p>

								<p><a type="button" href="#" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#delete<?php echo $y->id; ?>"> <i class="fa fa-trash" style="color: red"></i> &nbsp; Delete </a></p>

							</td>

							<td>
								<?php 

									$image_src = base_url('assets/uploads/photos/profile/'.$y->photo);
									$avatar = user_avatar_table($y->photo, $image_src, user_avatar);

									echo $avatar;

								?>
							</td>
							<td><?php echo $y->fullname ?></td>
							<td><?php echo $y->organisation; ?></td>
							<td><?php echo $y->position_main; ?></td>
							<td><?php echo $y->position_other; ?></td>
							<td><?php echo $y->email; ?></td>
							<td><?php echo $y->sex; ?></td>
							<td><?php echo x_date($y->date_added); ?></td>

						</tr>

					<?php } ?> 

				</tbody>
			</table>
		</div>
	
<?php echo form_close(); ?>


