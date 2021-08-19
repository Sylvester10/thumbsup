

<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>
	
	
	<?php 
	//select options bulk actions 
	$options_array = array(
		//'value' => 'Caption'
		'delete' => 'Delete'
	); 
	echo modal_bulk_actions('volunteers/bulk_actions_volunteer', $options_array); ?>
	
		<div class="table-scroll">
			<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">

				<input type="hidden" id="csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>" />
				
				<thead>
					<tr>
						<th class="w-15-p"> <input type="checkbox" class="radio-box select_all" /> </th>
						<th> Actions </th>
						<th class="min-w-200"> Full Name </th>
						<th class="min-w-200"> Address </th>
						<th class="min-w-200"> State of Origin </th>
						<th class="min-w-200"> State of Residence </th>
						<th class="min-w-200"> Phone Number </th>
						<th class="min-w-200"> Email Address </th>
						<th class="min-w-200"> Availability Period </th>
						<th class="min-w-200"> Educational Qualification </th>
						<th class="min-w-200"> Language </th>
						<th class="min-w-200"> Reffree First Name </th>
						<th class="min-w-200"> Reffree Middle Name</th>
						<th class="min-w-200"> Reffree Last Name</th>
						<th class="min-w-200"> Reffree Phone</th>
						<th class="min-w-200"> Reffree  Email</th>
						<th class="min-w-200"> Place of Emloyment </th>
						<th class="min-w-200"> Position Held </th>
						<th class="min-w-200"> Office Phone </th>
						<th class="min-w-150"> Date </th>	
					</tr>
				</thead>
				<tbody>

					<?php
					foreach ($volunteers as $y) {  ?>


						<tr>

							<td class="w-15-p text-center"> <?php echo checkbox_bulk_action($y->id); ?></td>
							
							<?php require "application/views/admin/volunteers/modal/delete.php";  ?>
							<td class="w-15-p text-center">

								<p><a type="button" href="<?php echo base_url('volunteers/view_volunteer/'.$y->id); ?>" class="btn btn-default btn-sm btn-block action-btn clickable"> <i class="fa fa-eye" style="color: green"></i> &nbsp; View </a></p>

								<p><a type="button" href="#" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#delete<?php echo $y->id; ?>"> <i class="fa fa-trash" style="color: red"></i> &nbsp; Delete </a></p>

							</td>
							<td><?php echo $y->name ?></td>
							<td><?php echo $y->address; ?></td>
							<td><?php echo $y->state; ?></td>
							<td><?php echo $y->residence; ?></td>
							<td><?php echo $y->phone; ?></td>
							<td><?php echo $y->email; ?></td>
							<td><?php echo $y->availability; ?></td>
							<td><?php echo $y->qualification; ?></td>
							<td><?php echo $y->language; ?></td>
							<td><?php echo $y->f_name; ?></td>
							<td><?php echo $y->m_name; ?></td>
							<td><?php echo $y->l_name; ?></td>
							<td><?php echo $y->r_phone; ?></td>
							<td><?php echo $y->r_email; ?></td>
							<td><?php echo $y->place_of_employment; ?></td>
							<td><?php echo $y->position; ?></td>
							<td><?php echo $y->office_phone; ?></td>
							<td><?php echo x_dates($y->date_added); ?></td>

						</tr>

					<?php } ?> 

				</tbody>
			</table>
		</div>
	
<?php echo form_close(); ?>


