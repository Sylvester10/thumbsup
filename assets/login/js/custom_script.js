jQuery(document).ready(function ($) {
 "use strict";



 // 	Dropzone.options.upload_photo_form = {
 // 		maxFilesize: 3,
 // 		acceptedFiles: '.jpg, .jpeg, .png, .gif',
	// 	init: function() {
	// 		this.on('success', function() {
	// 			if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
	// 				location.reload(); //reload page after upload success
	// 			}
	// 		});
	// 	}
	// };



	//Add new User
	$('#add_user_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
        var redirect_url = base_url + 'login';
		$.ajax({
			url: base_url + 'registration/register_ajax', 
			type: 'POST',
			data: form_data, 
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center" style="color: #000">'+res.msg+'</div>').fadeIn('fast');
					$('#add_user_form')[0].reset(); //reset form fields
					setTimeout(function() {
						$(location).attr('href', redirect_url);
					}, 3000);	
				} else {
					$( '#status_msg' ).html('<div class="alert alert-danger text-center" style="color: #000">' + res.msg + '</div>').fadeIn('fast').delay( 30000 ).fadeOut( 'slow' );	
				}
			}
		});
	});



		//Admin login
	$('#admin_login_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		var redirect_url = $('#requested_page').val();				
		$.ajax({
			url: base_url + 'login/login_ajax', 
			type: 'POST',
			data: form_data, 
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$('#status_msg').html('<div class="alert alert-success text-center" style="color: #000">'+res.msg+'</div>').fadeIn('fast');
					setTimeout(function() {
						$(location).attr('href', redirect_url);
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center" style="color: #000">'+res.msg+'</div>').fadeIn( 'fast' ).delay( 10000 ).fadeOut( 'slow' );
				}
			}
		});
	});



	//User login
	$('#user_login_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		var redirect_url = $('#requested_page').val();				
		$.ajax({
			url: base_url + 'login/login_ajax', 
			type: 'POST',
			data: form_data, 
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$('#status_msg').html('<div class="alert alert-success text-center" style="color: #000">'+res.msg+'</div>').fadeIn('fast');
					setTimeout(function() {
						$(location).attr('href', redirect_url);
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center" style="color: #000">'+res.msg+'</div>').fadeIn( 'fast' ).delay( 10000 ).fadeOut( 'slow' );
				}
			}
		});
	});



	//Edit new User
	$('#edit_user_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + 'dashboard/edit_user_action', 
			type: 'POST',
			data: form_data, 
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center" style="color: #000">'+res.msg+'</div>').fadeIn('fast').delay( 30000 ).fadeOut( 'slow' );	
				} else {
					$( '#status_msg' ).html('<div class="alert alert-danger text-center" style="color: #000">' + res.msg + '</div>').fadeIn('fast').delay( 30000 ).fadeOut( 'slow' );	
				}
			}
		});
	});


	//Edit User
	$('#edit_user_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
        var redirect_url = base_url + 'profile';
		$.ajax({
			url: base_url + 'dashboard/edit_user_ajax', 
			type: 'POST',
			data: form_data, 
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center" style="color: #000">'+res.msg+'</div>').fadeIn('fast').delay( 3000 ).fadeOut( 'fast' );	
					setTimeout(function() {
						$(location).attr('href', redirect_url);
					}, 3000);	
				} else {
					$( '#status_msg' ).html('<div class="alert alert-danger text-center" style="color: #000">' + res.msg + '</div>').fadeIn('fast').delay( 3000 ).fadeOut( 'slow' );	
				}
			}
		});
	});
	
	
	

	//Transfer
	$('#transfer_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
        var redirect_url = base_url + 'transfers';
		$.ajax({
			url: base_url + 'transfers/transfer_ajax', 
			type: 'POST',
			data: form_data, 
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center" style="color: #000">'+res.msg+'</div>').fadeIn('fast').delay( 30000 ).fadeOut( 'slow' );	
					setTimeout(function() {
						$(location).attr('href', redirect_url);
					}, 3000);	
				} else {
					$( '#status_msg' ).html('<div class="alert alert-danger text-center" style="color: #000">' + res.msg + '</div>').fadeIn('fast').delay( 6000 ).fadeOut( 'slow' );	
				}
			}
		});
	});





	//Contact Us
	$('#contact_us_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + 'home/contact_us_ajax', 
			type: 'POST',
			data: form_data, 
			dataType: 'json',
			success: function(res) {
				if (res.status) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center" style="color: #000">'+res.msg+'</div>').fadeIn('fast').delay( 3000 ).fadeOut( 'fast' );
					$('#contact_us_form')[0].reset(); //reset form fields	
				} else {
					$( '#status_msg' ).html('<div class="alert alert-danger text-center" style="color: #000">' + res.msg + '</div>').fadeIn('fast').delay( 3000 ).fadeOut( 'slow' );	
				}
			}
		});
	});


	
	
	
	
	

	
	
}); //jQuery(document).ready(function)