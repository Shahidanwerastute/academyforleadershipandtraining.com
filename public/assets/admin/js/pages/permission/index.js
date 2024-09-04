$(function () {
	// crud table
	if ($('#records')
		.length) records.init();
});
records = {
	init: function () {
		$('#records')
			.jtable({
				title: 'Manage Permissions'
				, paging: true //Enable paging
				, messages: {
					addNewRecord: 'Add new permission',
					editRecord: 'Edit permission',
					areYouSure: 'Are you sure?',
				}
				, pageSize: 10 //Set page size (default: 10)
				, sorting: true
				, addRecordButton: $('#recordAdd')
				, deleteConfirmation: function (data) {
					data.deleteConfirmMessage = 'Are you sure to delete permission ' + data.record.name + '?';
				}
				, formCreated: function (event, data) {
					reInitDesign(event, data);
				}
				, actions: {
					listAction: permissions
					, createAction: permission_create
					, updateAction: permission_update
					, deleteAction: permission_delete
				}
				, fields: {
					id: {
						key: true
						, create: false
						, edit: false
						, list: false
					}
					, name: {
						title: 'Name'
						, sorting: false
						, create: true
						, edit: true
						, list: true
						, type: 'text'
					}
					, 'roles[]': {
						title: 'Roles'
						, type: 'multiselectddl'
						, options: roles
						, create: true
						, edit: false
						, list: false
					}
				}
			})
			.jtable('load');
		$('.ui-dialog-buttonset').children('button').attr('class', '').addClass('md-btn md-btn-flat').off('mouseenter focus');
		$('#AddRecordDialogSaveButton,#EditDialogSaveButton,#DeleteDialogButton').addClass('md-btn-flat-primary');
		$('#search').click(function (e) {
			e.preventDefault();
			$('#records').jtable('load', {
				name: $('[name=name]').val()
			});
		});
	}
};
