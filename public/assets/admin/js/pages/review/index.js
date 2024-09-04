$(function () {
	// crud table
	if ($('#records').length) records.init();
});
records = {
	init: function () {
		$('#records')
			.jtable({
				title: 'Manage Comments'
				, paging: true //Enable paging
				, messages: languageMessages
				, pageSize: 10 //Set page size (default: 10)
				, sorting: true
				, addRecordButton: $('#recordAdd')
				, deleteConfirmation: function (data) {
					data.deleteConfirmMessage = 'Are you sure to delete review?';
				}
				, formCreated: function (event, data) {
					reInitDesign(event, data);
				}
				, actions: {
					listAction: _listing
					, deleteAction: _delete
				}
				, recordsLoaded: function (event, data) {
					altair_forms.switches();
				}
				, recordUpdated(event, data) {
					altair_forms.switches();
				}
				, fields: {
					id: {
						key: true
						, create: false
						, edit: false
						, list: false
					} 
					, blog_title: {
						title: 'Blog Title'
						, create: true
						, edit: true
						, list: true
						, type: 'text'
						, sorting: false
					}
					, name: {
						title: 'Name'
						, create: true
						, edit: true
						, list: true
						, type: 'text'
						, sorting: false
					}
					, email: {
						title: 'Email'
						, create: true
						, edit: true
						, list: true
						, type: 'text'
						, sorting: false
					}
					, website: {
						title: 'Website'
						, create: true
						, edit: true
						, list: true
						, type: 'text'
						, sorting: false
					}
					, comment: {
						title: 'Comment'
						, create: true
						, edit: true
						, list: true
						, type: 'text'
						, sorting: false
					}
                    , status: {
                        title: 'Active',
                        sorting: false,
                        width: '1%',
                        type: 'checkbox',
                        values: { '0': 'Not Active', '1': 'Active' },
                        defaultValue: '1',
                        listClass: "uk-text-center",
                        display: function(data) {
                            return '<input type="checkbox" data-id="'+data.record.id+'" data-table="review" data-field="status" class="active" '+(data.record.status == 1 ? 'checked' : '')+' data-switchery/>';
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
		
		$(document).on("change", ".active", function () {
			var status = ($(this).is(":checked") ? 1 : 0);
			$.post(field_active_route, {id: $(this).data('id'), table: $(this).data('table'), field: $(this).data('field'), status: status}, function(result){
				$(".success-alert").attr('data-message', success_alert('Updated successfully.')).trigger('click');
				$('#records').jtable('load');
			}); 
		});
	}
};
