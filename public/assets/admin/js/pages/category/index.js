$(function () {
	if ($('#records').length) records.init();
	if ($('.uk-nestable').length) records.sorting();
});
records = {
	init: function () {
		$('#records')
			.jtable({
				title: 'Manage Categories',
				paging: true //Enable paging
					,
				messages: {
					addNewRecord: 'Add Category',
					editRecord: 'Edit Category',
					areYouSure: 'Are you sure?',
				},
				pageSize: 10 //Set page size (default: 10)
					,
				sorting: false,
				addRecordButton: $('#recordAdd'),
				deleteConfirmation: function (data) {
					data.deleteConfirmMessage = 'Are you sure to delete category ' + data.record.name + '?';
				},
				formCreated: function (event, data) {
					reInitDesign(event, data);
				},
				recordsLoaded: function (event, data) {
					if (!update_category) $(".jtable-edit-command-button").parent().hide();
					if (!delete_category) $(".jtable-delete-command-button").parent().hide();
				},
				actions: {
					listAction: categories,
					createAction: category_create,
					updateAction: category_update,
					deleteAction: category_delete
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
						create: true,
						edit: true,
						list: true,
						type: 'text'
					},
					name_ar: {
						title: 'Name (Arabic)',
						create: false,
						edit: false,
						list: false,
						type: 'text'
					},
					active: {
						title: 'Activation',
						options: {
							'0': 'Not Active',
							'1': 'Active'
						}
					},
					color: {
						title: 'Background Grey Color',
						options: {
							'0': 'Not Active',
							'1': 'Active'
						}
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
	},
	sorting: function () {
		$(".uk-nestable").sortable({
			opacity: 0.8,
			cursor: 'move',
			update: function () {
				var order = $(this).sortable("serialize") + '&update=update';
				$.post(sorting, order);
			}
		});
	}
};