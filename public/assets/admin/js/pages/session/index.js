$(function () {
	if ($('#records').length) records.init();
	if ($('.uk-nestable').length) records.sorting();
});
records = {
	init: function () {
		$('#records')
			.jtable({
				title: '',
				paging: true //Enable paging
					,
				messages: {
					addNewRecord: 'Add Sessions',
					editRecord: 'Edit Sessions',
					areYouSure: 'Are you sure?',
				},
				pageSize: 10 //Set page size (default: 10)
					,
				sorting: false,
				addRecordButton: $('#recordAdd'),
				deleteConfirmation: function (data) {
					data.deleteConfirmMessage = 'Are you sure to delete session ' + data.record.name + '?';
				},
				formCreated: function (event, data) {
					reInitDesign(event, data);
				},
				recordsLoaded: function (event, data) {
					if (!update_session) $(".jtable-edit-command-button").parent().hide();
					if (!delete_session) $(".jtable-delete-command-button").parent().hide();
				},
				actions: {
					listAction: sessions,
					createAction: session_create,
					//updateAction: session_update,
					deleteAction: session_delete
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
						type: 'text',
						display: function(data){
							name_data = '<a href="'+session_survey+'?id='+data.record.id+'">'+data.record.name+'</a>';
							return name_data;
						}
					},
					session_file:{
						title: 'Upload Excel or csv file',
						create: true,
						edit: true,
						list: false,
						type: 'file',
						input: function (data) {
							html = '<div class="uk-grid icon">';
							html += '<div class="uk-width-1-1">';
							html += '<div class="uk-file-upload file_upload-drop uk-margin-medium-bottom">';
							html += '<input  name="session_file" class="file_upload-select" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">';
							html += '</div>';
							html += '</div>';
							return html;
						}
					}
				}
			})
			.jtable('load');
		/*$('.ui-dialog-buttonset').children('button').attr('class', '').addClass('md-btn md-btn-flat').off('mouseenter focus');*/
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