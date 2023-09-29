
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

	<?php require "application/views/admin/sponsors/modal/new_sponsor.php";  ?>

	<div class="new-item">
		<a class="btn btn-default btn-sm button-adjust" data-toggle="modal" data-target="#new_sponsor"><i class="fa fa-plus"></i> New Sponsor</a>
	</div>


	<div class="m-b-30">
		<p><i class="fa fa-th-large"></i> All: <?php echo number_format($total_records); ?></p>
	</div>

		
	<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
		
		<thead>
			<tr>
				<th> Actions </th>
				<th class="max-w-50"> Photo </th>
				<th> Name </th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach ($sponsors as $s) {  ?>

				<tr>
					<?php require "application/views/admin/sponsors/modal/option.php";  ?>	
					<td class="w-15-p text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#options<?php echo $s->id; ?>"><i class="fa fa-navicon"></i></button></td>
					<td class="text-center">
						<?php 

							$image_src = base_url('assets/uploads/sponsors/'.$s->photo);
							$avatar = user_avatar_table($s->photo, $image_src, user_avatar);

							echo $avatar;

						?>
					</td>
					<td><?php echo $s->name; ?></td>
					<?php 
						if ($s->published != 'true') { ?>
							<td class="unpub">Unpublished</td>
						<?php } else { ?>
							<td class="pub">Published</td>
						<?php } ?>
				</tr>

			<?php } ?>

		</tbody>
	</table>