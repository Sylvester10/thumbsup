jQuery(document).ready(function ($) {
 "use strict";



 	Dropzone.options.upload_photo_form = {
 		maxFilesize: 3,
 		acceptedFiles: '.jpg, .jpeg, .png, .gif',
		init: function() {
			this.on('success', function() {
				if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
					location.reload(); //reload page after upload success
				}
			});
		}
	};

	function disableSubmitBtn(){
		var submitButton = $("#submit");
			submitButton.html("Please Wait...");
			submitButton.attr("disabled",true);
			submitButton.addClass("disabled");

	}

	function enableSubmitBtn(){
		var submitButton = $("#submit");
		submitButton.html("Submit");
		submitButton.removeClass("disabled");
		submitButton.attr("disabled",false);
	}
	
 	//Quick Mail
	$('#quick_mail_form').submit(function(e) {
		e.preventDefault();
		var form_data = $('#quick_mail_form').serialize();
		$.ajax({
			url: base_url + 'admin/send_quick_mail_ajax', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#q_status_msg' ).html('<div class="alert alert-success text-center">Mail successfully sent.</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					$('#quick_mail_form')[0].reset(); //reset form fields
					var email_message = $("#email_message");
					email_message.val('');
				    email_message.siblings('[class="trumbowyg-editor"]').html('');
				} else {
					$('#q_status_msg').html('<div class="alert alert-danger text-center"> Email not Sent!</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});



	//Update School Stats
	$('#update_school_stats_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + 'school_stats/update_school_stats_ajax', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">School Stats updated successfully.</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});



	//New Profile
	$('#new_profile_form').submit(function(e) {
		e.preventDefault();
		disableSubmitBtn();
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + 'profiles/new_profile_action', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">Profile Added successfully.</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					enableSubmitBtn();
					setTimeout(function() { 
						location.reload(); //reload page
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					enableSubmitBtn();
				}
			}
		});
	});





	
	//Edit Event
	$('#edit_event_form').submit(function(e) {
		e.preventDefault();
		disableSubmitBtn();
		var form_data = $(this).serialize();
		var event_id = $('#event_id').val();			
		$.ajax({
			url: base_url + 'events/edit_event_ajax/' + event_id, 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">Event updated successfully.</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					var email_message = $("#email_message");
					email_message.val('');
				    email_message.siblings('[class="trumbowyg-editor"]').html('');
					enableSubmitBtn();
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					enableSubmitBtn();
				}
			}
		});
	});


 	
	//Update General Announcement
	$('#update_announcement_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + 'announcement/update_announcement_ajax', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">Announcement updated successfully.</div>').fadeIn( 'fast' );
					setTimeout(function() { 
						location.reload(); //reload page
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});




	//Add Newsletter Subscriber
	$('#add_subscriber_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + 'newsletter/add_subscriber_ajax', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">New subscriber added successfully.</div>').fadeIn( 'fast' );
					setTimeout(function() { 
						location.reload(); //reload page
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});


	
	//Add New Testimony
	$('#new_testimony_form').submit(function(e) {
		e.preventDefault();
		var form_data = new FormData(this);
		disableSubmitBtn();



		$.ajax({
			url: base_url + 'testimonial/add_new_testimonial_ajax', 
			type: 'POST',
			data: form_data,
			contentType:false,
			cache:false,
			processData:false, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">New Testimony added successfully.</div>').fadeIn( 'fast' );
					enableSubmitBtn();
					setTimeout(function() { 
						location.reload(); //reload page
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					enableSubmitBtn();
				}
			}
		});
	});





	$('button[use="ajax"]').each(function(index,element){
			$(this).click(function(){
				var formMain = $(this).parents('div').siblings('form');
				var statusMsg = $(this).siblings("div#status_msg");
				var btn = $(this);
				$(this).html("Please Wait...");
				$(this).addClass("disabled");
				btn.css('cursor',"progress");

				

		formMain.submit(function(e) {
			e.preventDefault();
			var actionUrl = $(this).attr("action");
			var form_data = new FormData(this);

			$.ajax({
				url: actionUrl, 
				type: 'POST',
				data: form_data,
				contentType:false,
				cache:false,
				processData:false, 
				success: function(msg) {
					if (msg == 1) {
						statusMsg.html('<div class="alert alert-success text-center">New Testimony added successfully.</div>').fadeIn( 'fast' );
						btn.html("Updated successfully!");
						btn.removeClass('disabled');
						btn.removeClass('btn-primary');
						btn.addClass('btn-success');
						btn.css('cursor',"not-allowed");
						setTimeout(function() { 
							location.reload(); //reload page
						}, 3000);
					} else {
						statusMsg.html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
						
					}
				}
			});
		});




			});
	});


	//Add New Sponsor
	$('#new_sponsors_form').submit(function(e) {
		e.preventDefault();
		var form_data = new FormData(this);
		disableSubmitBtn();



		$.ajax({
			url: base_url + 'sponsor/add_new_sponsor_ajax', 
			type: 'POST',
			data: form_data,
			contentType:false,
			cache:false,
			processData:false, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">New sponsor added successfully.</div>').fadeIn( 'fast' );
					enableSubmitBtn();
					setTimeout(function() { 
						location.reload(); //reload page
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					enableSubmitBtn();
				}
			}
		});
	});

	

	// add a new profile
	$("#new_profile").submit(function(e){
		e.preventDefault();
		var form_data = new FormData(this);
		let actionUrl = $(this).attr("action");

			$.ajax({
				url: actionUrl, 
				type: 'POST',
				data: form_data,
				contentType:false,
				cache:false,
				processData:false, 
				success: function(msg) {
					if (msg == 1) {
						$( '#response_message' ).html('<div class="alert alert-success text-center">Successfully Added Profile</div>').fadeIn( 'fast' );
						
						setTimeout(function() { 
							location.reload(); //reload page
						}, 3000);
					} else {
						$('#response_message').html('<div class="alert alert-danger text-center">' + msg + '</div>');
						$('#response_message').fadeIn("slow");
						setTimeout(function(){ $('#response_message').fadeOut("slow"); }, 5000);
					}
				}
			});
	});


	// add edit profile
	$("#edit_profile").submit(function(e){
		e.preventDefault();
		var form_data = new FormData(this);
		let actionUrl = $(this).attr("action");

			$.ajax({
				url: actionUrl, 
				type: 'POST',
				data: form_data,
				contentType:false,
				cache:false,
				processData:false, 
				success: function(msg) {
					if (msg == 1) {
						$( '#response_message' ).html('<div class="alert alert-success text-center">Successfully updated Profile</div>').fadeIn( 'fast' );
						
						setTimeout(function() { 
							window.location.replace(base_url +"profiles"); //reload page
						}, 3000);
					} else {
						$('#response_message').html('<div class="alert alert-danger text-center">' + msg + '</div>');
						$('#response_message').fadeIn("slow");
						setTimeout(function(){ $('#response_message').fadeOut("slow"); }, 6000);
					}
				}
			});
	});









	


	//Add New Unit
	$('#new_unit_form').submit(function(e) {
		e.preventDefault();
		disableSubmitBtn();
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + 'units/add_new_unit_ajax', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">New Unit added successfully.</div>').fadeIn( 'fast' );
					enableSubmitBtn();
					setTimeout(function() { 
						location.reload(); //reload page
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					enableSubmitBtn();
				}
			}
		});
	});









	//show the editor onclick on the add new button
	$('a[data-target="#new_unit"]').click(function(){

		$('textarea[is="editor"]').trumbowyg({
			    btns: [['viewHTML'],['formatting'],['bold', 'italic','underline','del'],['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],['unorderedList', 'orderedList'],['insertImage'],['link'],['horizontalRule'],['removeformat'], ['fullscreen']],
			    changeActiveDropdownIcon: true,
			    imageWidthModalEdit: true
			});
	});









	//Load functions that did'nt load on document ready
	function load_all(){

		$('#edit_unit_form').submit(function(e) {
			e.preventDefault();
			var resp = $('#edit_unit_response');
			var form_data = new FormData(this);
			var actionUrl = $(this).attr("action");
			var unitId = $(this).attr('unit');
			$.ajax({
				url: actionUrl, 
				type: 'POST',
				data: form_data,
				contentType:false,
				cache:false,
				processData:false, 
				success: function(msg) {
					if (msg == 1) {
						resp.html('<div class="alert alert-success text-center">New Unit added successfully.</div>');
						resp.fadeIn("slow");
						setTimeout(function(){ 
							resp.fadeOut("slow");
							location.reload();
						 }, 3000);


					} else {
						resp.html('<div class="alert alert-danger text-center">' + msg + '</div>');
						resp.fadeIn("slow");
						setTimeout(function(){ resp.fadeOut("slow"); }, 15000);
						
					}
				}
			});		
		});








	}
	





	$('a[data-target="#edit_unit"]').each(function(index,element){

		var unitId = $(this).attr("unit");

		var resp = $('div[id="all_edit_unit_response"]');
		
		$(this).click(function(){

			$.ajax({
				url: base_url + 'units/generate_edit_unit_form/'+unitId, 
				type: 'POST', 
				success: function(msg) {

					resp.html(msg);// LOAD THE FORM FROM

					//ADD THE EDITOR
					$("#edit_unit_editor").trumbowyg({
					    btns: [['viewHTML'],['formatting'],['bold', 'italic','underline','del'],['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],['unorderedList', 'orderedList'],['insertImage'],['link'],['horizontalRule'],['removeformat'], ['fullscreen']],
					    changeActiveDropdownIcon: true,
					    imageWidthModalEdit: true
					});

					load_all();
					
				}
			});


		});
	});








	//Class Teacher Assignment
	$('#class_teacher_assignment_form').submit(function(e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		var class_teacher_id = $('#class_teacher_id').val();
		$.ajax({
			url: base_url + 'school_staff/class_teacher_assignment_ajax/' + class_teacher_id, 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center"> Class teacher assignment updated successfully.</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});




	//Add New Admin
	$('#new_admin_form').submit(function(e) {
		e.preventDefault();
		var form_data = $('#new_admin_form').serialize();
		$.ajax({
			url: base_url + 'admin_users/add_new_admin_ajax', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$('#new_admin_form')[0].reset(); //reset form fields
					$( '#status_msg' ).html('<div class="alert alert-success text-center">New admin added successfully.</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});
	
	
	
	//Edit Admin
	$('#edit_admin_form').submit(function(e) {
		e.preventDefault();
		var form_data = $('#edit_admin_form').serialize();
		var id = $('#admin_id').val();
		var name = $('#admin_name').val();
		var redirect_url = base_url + 'admin_users';
		$.ajax({
			url: base_url + 'admin_users/edit_admin_ajax/' + id, 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#status_msg' ).html('<div class="alert alert-success text-center">' + name + ' updated successfully.</div>').fadeIn( 'fast' );
					setTimeout(function() { 
						$(location).attr('href', redirect_url);
					}, 3000);
				} else {
					$('#status_msg').html('<div class="alert alert-danger text-center">' + msg + '</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});
	
	
	
	
	
	//print and export buttons for DataTables
	var ExportButtons = [
		{
			extend: 'colvis', //column visibility
			className: 'data_export_buttons'
		},
		{
			extend: 'print',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'excel',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'csv',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'pdf',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		}
	];



	//Newsletter Subscribers
	var csrf_hash = $('#csrf_hash').val();
	var newsletter_subscribers_table = $('#newsletter_subscribers_table').DataTable({ 
		paging: true,
		pageLength :30,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter subscribers: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ subscribers",
			infoFiltered: "(filtered from _MAX_ total subscribers)",
			emptyTable: "No subscriber to show.",
			lengthMenu: "Show _MENU_ subscribers",
		},
		ajax: {
			url: base_url + 'newsletter/subscribers_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});




	//Staff
	var csrf_hash = $('#csrf_hash').val();
	var all_staff_table = $('#all_staff_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter staff: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ staff",
			infoFiltered: "(filtered from _MAX_ total staff)",
			emptyTable: "No staff to show.",
			lengthMenu: "Show _MENU_ staff",
		},
		ajax: {
			url: base_url + 'school_staff/staff_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});



	//Staff: Class Teachers
	var csrf_hash = $('#csrf_hash').val();
	var class_teachers_table = $('#class_teachers_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter teachers: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ teachers",
			infoFiltered: "(filtered from _MAX_ total teachers)",
			emptyTable: "No teacher to show.",
			lengthMenu: "Show _MENU_ teachers",
		},
		ajax: {
			url: base_url + 'school_staff/class_teachers_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});





	//Admins
	var csrf_hash = $('#csrf_hash').val();
	var admins_table = $('#admins_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter admins: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ admins",
			infoFiltered: "(filtered from _MAX_ total admins)",
			emptyTable: "No admin to show.",
			lengthMenu: "Show _MENU_ admins",
		},
		ajax: {
			url: base_url + 'admin_users/admins_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});


	
		
		$('#email_message').trumbowyg({
			    btns: [['viewHTML'],['formatting'],['bold', 'italic','underline','del'],['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],['unorderedList', 'orderedList'],['link'],['removeformat'], ['fullscreen']],
			    changeActiveDropdownIcon: true,
			    imageWidthModalEdit: true
			});
	
	/* Telephone */
	$('input[is="phone-number"]').each(function(index,element){

	    window.intlTelInput(element, {
	      allowDropdown: true, // whether or not to allow the dropdown
	      autoHideDialCode: true,// if there is just a dial code in the input: remove it on blur, and re-add it on focus
	      autoPlaceholder: "aggressive",// add a placeholder in the input with an example number for the selected country
	      dropdownContainer: document.body,
	      //excludeCountries: ["us"],//In the dropdown, display all countries except the ones you specify here.
	      formatOnDisplay: true,
	      initialCountry: "auto",
	      geoIpLookup: function(success, failure) {
	        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
	          var countryCode = (resp && resp.country) ? resp.country : "ng";
	          success(countryCode);
	        });},
	      hiddenInput: "full_number",
	      localizedCountries: { 'de': 'Deutschland' },
	      nationalMode: true,
	      //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do','ng'], //In the dropdown, display only the countries you specify 
	      placeholderNumberType: "MOBILE",
	      preferredCountries: ['us', 'uk','ng'],
	      separateDialCode: false,
	      utilsScript: "builders/tell-input/js/utils.js",
	    });


	});










































































	
}); //jQuery(document).ready(function)