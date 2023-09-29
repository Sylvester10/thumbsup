<form action="{{action}}" method="POST" id="edit_unit_form" unit="{{id}}" target="_blank" >

	<div class="form-group">
		<label class="form-control-label">Name</label>
		<br/>
		<input id="update_name" type="text" name="name" value="{{name}}" class="form-control" required />
		<div class="form-error"></div>
	</div>

	<div class="form-group">
		<label class="form-control-label">Description</label>
		<br/>
		<textarea id="edit_unit_editor" name="description" value="{{description}}"  class="form-control t100" required>{{description}}</textarea>
		<div class="form-error"></div>
	</div>
	
	<div id="edit_unit_response" style="display:none;"></div>
	
	<div>
		<button class="btn btn-primary" id="submit" use="ajax_too" >Update </button>
	</div>

</form>