$(function () {
	// crud table
	if ($('#records')
		.length) records.init();
});
records = {
	init: function () {
		$('#records')
			.jtable({
				title: 'Manage Customers'
				, paging: true //Enable paging
				, messages: {
					addNewRecord: 'Add new user',
					editRecord: 'Edit user',
					areYouSure: 'Are you sure?',
				}
				, pageSize: 10 //Set page size (default: 10)
				, sorting: true
				, addRecordButton: $('#recordAdd')
				, deleteConfirmation: function (data) {
					data.deleteConfirmMessage = 'Are you sure to delete user ' + data.record.first_name+' ' + data.record.last_name+ '?';
				}
				, formCreated: function (event, data) {
					data.form.find('select[name=roles]').attr('name','roles[]').attr('multiple','multiple');
					reInitDesign(event, data);
				}
				, recordDeleted: function (event, data) {
					if(data.serverResponse.message) $(".success-alert").attr('data-message', success_alert(data.serverResponse.message)).trigger('click');
				}
				, recordsLoaded: function (event, data) {
					if(!update_user) $(".jtable-edit-command-button").parent().hide();
					if(!delete_user) $(".jtable-delete-command-button").parent().hide();
				}
				, actions: {
					listAction: users
					, createAction: user_create
					, updateAction: user_update
					, deleteAction: user_delete
				}
				, fields: {
					id: {
						key: true
						, create: false
						, edit: false
						, list: false
					}
					, first_name: {
						title: 'First Name'
						, sorting: false
						, create: true
						, edit: true
						, list: true
						, type: 'text'
					}
					, last_name: {
						title: 'Last Name'
						, sorting: false
						, create: true
						, edit: true
						, list: true
						, type: 'text'
					}
					, email: {
						title: 'Email'
						, sorting: false
						, create: true
						, edit: true
						, list: true
						, type: 'text'
					}
					, password: {
						title: 'Password'
						, sorting: false
						, create: true
						, edit: true
						, list: false
						, type: 'password'
					}
					, mobile: {
						title: 'Mobile'
						, sorting: false
						, create: true
						, edit: true
						, list: true
						, type: 'text'
					}
					, address: {
						title: 'Address'
						, sorting: false
						, create: true
						, edit: true
						, list: true
						, type: 'text'
					}
					, roles_text: {
						title: 'Roles'
						, sorting: false
						, create: false
						, edit: false
						, list: true
						, type: 'text'
					}
					, 'roles': {
						title: 'Roles'
						, type: 'multiselectddl'
						, options: roles
						, create: true
						, edit: true
						, list: false
					}
				}
			})
			.jtable('load');
		$('.ui-dialog-buttonset')
			.children('button')
			.attr('class', '')
			.addClass('md-btn md-btn-flat')
			.off('mouseenter focus');
		$('#AddRecordDialogSaveButton,#EditDialogSaveButton,#DeleteDialogButton').addClass('md-btn-flat-primary');
		$('#search').click(function (e) {
			e.preventDefault();
			$('#records').jtable('load', {
				name: $('[name=name]')
					.val()
			});
		});
	}
};
