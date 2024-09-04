$(function () {
	// crud table
	if ($('#records')
		.length) records.init();
});
records = {
	init: function () {
		$('#records')
			.jtable({
				title: 'Manage Roles',
				paging: true //Enable paging
					,
				messages: {
					addNewRecord: 'Add Role',
					editRecord: 'Edit role',
					areYouSure: 'Are you sure?',
				},
				pageSize: 10 //Set page size (default: 10)
					,
				sorting: true,
				addRecordButton: $('#recordAdd'),
				deleteConfirmation: function (data) {
					data.deleteConfirmMessage = 'Are you sure to delete role ' + data.record.name + '?';
				},
				formCreated: function (event, data) {
					data.form.find('select[name=permissions]').attr('name', 'permissions[]').attr('multiple', 'multiple');
					reInitDesign(event, data);
				},
				recordsLoaded: function (event, data) {
					if (!update_role) $(".jtable-edit-command-button").parent().hide();
					if (!delete_role) $(".jtable-delete-command-button").parent().hide();
				},
				actions: {
					listAction: roles,
					createAction: role_create,
					updateAction: role_update,
					deleteAction: role_delete
				},
				fields: {
					id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					name: {
						title: 'Name',
						sorting: false,
						create: true,
						edit: true,
						list: true,
						type: 'text'
					},
					permission_text: {
						title: 'Permissions',
						sorting: false,
						create: false,
						edit: false,
						list: true,
						type: 'text'
					},
					permissions: {
						title: 'Assign Permissions',
						type: 'multiselectddl',
						options: permissions,
						create: true,
						edit: true,
						list: false
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