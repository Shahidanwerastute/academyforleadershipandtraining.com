$(function () {
    // crud table
    if ($('#records').length) records.init();
    if ($('.uk-nestable').length) records.sorting();
});
records = {
    init: function () {
        $('#records').jtable({
            title: 'Manage Courses',
            paging: true //Enable paging
                ,
            messages: {
                addNewRecord: 'Add new course',
                editRecord: 'Edit course',
                areYouSure: 'Are you sure?',
            },
            pageSize: 10 //Set page size (default: 10)
                ,
            sorting: false,
            addRecordButton: $('#recordAdd'),
            deleteConfirmation: function (data) {
                data.deleteConfirmMessage = 'Are you sure to delete course ' + data.record.title + '?';
            },
            recordUpdated(event, data) {
                altair_forms.switches();
            },
            recordsLoaded: function (event, data) {
                altair_forms.switches();
            },
            formCreated: function (event, data) {
                /*Upload Image*/
                data.form.attr('enctype', 'multipart/form-data');
                data.form.find('[name="instructor_ids"]').attr('name', 'instructor_ids[]');

                var image_params = {
                    id: (data.formType == "edit" ? data.record.id : ''),
                    width: '438',
                    height: 'auto',
                    allowed_types: "*.(jpg|jpeg|gif|png)",
                    route: upload,
                    selector: ".image",
                    formType: data.formType,
                    table: 'course',
                    field: 'image',
                    dir: 'public/assets/admin/images/course/',
                }
                bind_upload_image(image_params);

                reInitDesign(event, data);
            },
            actions: {
                listAction: _listing + "?type=courses",
                createAction: _create + "?type=course_create",
                updateAction: _update + "?type=course_update",
                deleteAction: _delete + "?type=course_delete"
            },
            fields: {
                id: {
                    key: true,
                    create: false,
                    edit: false,
                    list: false
                },
                dates: {
                    title: 'Durations',
                    listClass: "uk-text-center",
                    width: '1%',
                    sorting: false,
                    create: false,
                    edit: false,
                    display: function (CourseInfo) {
                        var $link = $('<i class="material-icons">low_priority</i>');
                        $link.click(function () {
                            $('#records').jtable('openChildTable', $link.closest('tr'), {
                                title: '&nbsp;',
                                paging: true,
                                sorting: false,
                                recordUpdated(event, data) {
                                    altair_forms.switches();
                                },
                                recordsLoaded: function (event, data) {
                                    altair_forms.switches();
                                },
                                formCreated: function (event, data) {
                                    data.form.find("[name=start_date], [name=end_date]").kendoDatePicker({
                                        format: "yyyy-MM-dd"
                                    });
                                    reInitDesign(event, data);
                                },
                                actions: {
                                    listAction: _listing + "?type=dates",
                                    createAction: _create + "?type=date_create",
                                    updateAction: _update + "?type=date_update",
                                    deleteAction: _delete + "?type=date_delete"
                                },
                                fields: {
                                    id: {
                                        key: true,
                                        edit: false,
                                        list: false
                                    },
                                    start_date: {
                                        title: 'Start Date',
                                        listClass: "uk-text-center",
                                        width: '1%',
                                        sorting: false,
                                        edit: true,
                                        create: true
                                    },
                                    end_date: {
                                        title: 'End Date',
                                        listClass: "uk-text-center",
                                        width: '1%',
                                        sorting: false,
                                        edit: true,
                                        create: true
                                    },
                                    active: {
                                        title: 'Active',
                                        listClass: "uk-text-center",
                                        width: '12%',
                                        type: 'checkbox',
                                        values: {
                                            '0': 'Not Active',
                                            '1': 'Active'
                                        },
                                        defaultValue: '1',
                                        create: false,
                                        edit: false,
                                        display: function (data) {
                                            return '<input type="checkbox" data-id="' + data.record.id + '" data-table="course_date" data-field="active" class="active" ' + (data.record.active == 1 ? 'checked' : '') + ' data-switchery/>';
                                        }
                                    },
                                    course_id: {
                                        type: 'hidden',
                                        create: true,
                                        edit: true,
                                        list: false,
                                        defaultValue: CourseInfo.record.id
                                    }
                                }
                            }, function (data) { //opened handler
                                data.childTable.jtable('load', {
                                    course_id: CourseInfo.record.id
                                });
                                data.childTable.on("change", ".active", function (event) {
                                    event.stopPropagation();
                                    var status = ($(this).is(":checked") ? 1 : 0);
                                    $.post(field_active_route, {
                                        id: $(this).data('id'),
                                        table: $(this).data('table'),
                                        field: $(this).data('field'),
                                        status: status
                                    }, function (result) {
                                        $(".success-alert").attr('data-message', success_alert('Updated successfully.')).trigger('click');
                                    });
                                });
                            });
                        });
                        return $link;
                    }
                },
                videos: {
                    title: 'Videos',
                    listClass: "uk-text-center",
                    width: '1%',
                    sorting: false,
                    create: false,
                    edit: false,
                    display: function (CourseInfo) {
                        var $link = $('<i class="material-icons">video_library</i>');
                        $link.click(function () {
                            $('#records').jtable('openChildTable', $link.closest('tr'), {
                                title: '&nbsp;',
                                paging: true,
                                sorting: false,
                                formCreated: function (event, data) {
                                    reInitDesign(event, data);
                                },
                                actions: {
                                    listAction: _listing + "?type=videos",
                                    createAction: _create + "?type=video_create",
                                    updateAction: _update + "?type=video_update",
                                    deleteAction: _delete + "?type=video_delete"
                                },
                                fields: {
                                    id: {
                                        key: true,
                                        edit: false,
                                        list: false
                                    },
                                    embed_url: {
                                        title: 'Youtube Embed Code',
                                        listClass: "uk-text-center",
                                        width: '1%',
                                        type: 'textarea',
                                        sorting: false,
                                        edit: true,
                                        create: true
                                    },
                                    course_id: {
                                        type: 'hidden',
                                        create: true,
                                        edit: true,
                                        list: false,
                                        defaultValue: CourseInfo.record.id
                                    }
                                }
                            }, function (data) { //opened handler
                                data.childTable.jtable('load', {
                                    course_id: CourseInfo.record.id
                                });
                            });
                        });
                        return $link;
                    }
                },
                title: {
                    title: 'Title',
                    inputTitle: 'Title*',
                    create: true,
                    edit: true,
                    list: true,
                    type: 'text'
                },
                day: {
                    title: 'Duration',
                    inputTitle: 'Duration',
                    create: true,
                    edit: true,
                    list: true,
                    type: 'text'
                },
                price: {
                    title: 'Price',
                    inputTitle: 'Price',
                    create: true,
                    edit: true,
                    list: true,
                    type: 'text'
                },
                instructor_ids: {
                    title: 'Instructor(s)',
                    inputTitle: 'Instructor(s)',
                    options: instructors,
                    create: true,
                    edit: true,
                    list: false,
                    type: 'multiselectddl'
                },
                location: {
                    title: 'Location',
                    inputTitle: 'Location',
                    create: true,
                    edit: true,
                    list: false,
                    type: 'text'
                },
                short_info: {
                    title: 'Short Description',
                    create: true,
                    edit: true,
                    list: false,
                    inputClass: 'defaultRichHtml',
                    type: 'textarea',
                    sorting: false
                },
                description: {
                    title: 'Long Description',
                    create: true,
                    edit: true,
                    list: false,
                    inputClass: 'defaultRichHtml',
                    type: 'textarea',
                    sorting: false
                },
                outline: {
                    title: 'Outline',
                    create: true,
                    edit: true,
                    list: false,
                    inputClass: 'defaultRichHtml',
                    type: 'textarea',
                    sorting: false
                },
                can_register: {
                    title: 'Registration Available',
                    listClass: "uk-text-center",
                    width: '12%',
                    type: 'checkbox',
                    values: {
                        '0': 'Not Active',
                        '1': 'Active'
                    },
                    defaultValue: '1',
                    create: false,
                    edit: false,
                    display: function (data) {
                        return '<input type="checkbox" data-id="' + data.record.id + '" data-table="course" data-field="can_register" class="active" ' + (data.record.can_register == 1 ? 'checked' : '') + ' data-switchery/>';
                    }
                },
                icon: {
                    title: 'Icon',
                    options: {
                        'icons two': 'Icon 1',
                        'icons three': 'Icon 2',
                        'icons four': 'Icon 3',
                        'icons five': 'Icon 4',
                        'icons six': 'Icon 5',
                        'icons seven': 'Icon 6',
                        'icons eight': 'Icon 7',
                        'icons nine': 'Icon 8'
                    },
                    list: false,
                },
                image: {
                    title: 'Image',
                    input: function (data) {
                        html = '<div class="uk-grid file_upload image">';
                        html += '<div class="uk-width-1-1">';
                        html += '<div class="uk-file-upload file_upload-drop uk-margin-medium-bottom">';
                        html += '<p class="uk-text">Drop file to upload</p>';
                        html += '<p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>';
                        html += '<a class="uk-form-file md-btn">choose file<input class="file_upload-select" type="file"></a>';
                        if (data.formType == "edit") {
                            html += '<input type="hidden" name="image" value="' + data.record.image + '">';
                        } else {
                            html += '<input type="hidden" name="image" value="">';
                        }
                        html += '</div>';
                        if (data.formType == "edit") {
                            html += '<div class="thumb_file" style="width:30px;height:30px;"><a target="_blank" href="' + base_url + '/public/assets/admin/images/course/' + data.record.image + '"><img src="' + base_url + '/public/assets/admin/images/course/' + data.record.image + '" title="Click to open in new window" /></a></div>'
                        } else {
                            html += '<div class="thumb_file" style = "width:30px;height:30px;display:none;" ><a target="_blank" href=""><img src="" title="Click to open in new window" /></a></div>'
                        }
                        html += '<div class="uk-progress uk-hidden file_upload-progressbar">';
                        html += '<div class="uk-progress-bar" style="width:0">0%</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        return html;
                    },
                    display: function (data) {
                        if (data.record.image != null && data.record.image != "null") {
                            return '<div class="thumb_file" style="width:20px;height:20px;"><a target="_blank" href="' + base_url + '/public/assets/admin/images/course/' + data.record.image + '"><img src="' + base_url + '/public/assets/admin/images/course/' + data.record.image + '" title="Click to open in new window" /></a></div>';
                        }
                    }
                },
                status: {
                    title: 'Status (In-Active / Active)',
                    listClass: "uk-text-center",
                    width: '12%',
                    type: 'checkbox',
                    values: {
                        '0': 'Not Active',
                        '1': 'Active'
                    },
                    defaultValue: '1',
                    create: false,
                    edit: false,
                    display: function (data) {
                        return '<input type="checkbox" data-id="' + data.record.id + '" data-table="course" data-field="status" class="active" ' + (data.record.status == 1 ? 'checked' : '') + ' data-switchery/>';
                    }
                },
                is_sold_out: {
                    title: 'Is Sold Out (No / Yes)',
                    listClass: "uk-text-center",
                    width: '12%',
                    type: 'checkbox',
                    values: {
                        '0': 'No',
                        '1': 'Yes'
                    },
                    defaultValue: '0',
                    create: true,
                    edit: true,
                    display: function (data) {
                        return '<input type="checkbox" data-id="' + data.record.id + '" data-table="course" data-field="is_sold_out" class="active" ' + (data.record.is_sold_out == 1 ? 'checked' : '') + ' data-switchery/>';
                    }
                },
            }
        }).jtable('load');

        $('#search').click(function (e) {
            e.preventDefault();
            $('#records').jtable('load', {
                name: $('[name=name]').val()
            });
        });

        $(document).on("change", ".active", function () {
            var status = ($(this).is(":checked") ? 1 : 0);
            $.post(field_active_route, {
                id: $(this).data('id'),
                table: $(this).data('table'),
                field: $(this).data('field'),
                status: status
            }, function (result) {
                $(".success-alert").attr('data-message', success_alert('Updated successfully.')).trigger('click');
            });
        });
    },
    sorting: function () {
		$(".uk-nestable").sortable({ opacity: 0.8, cursor: 'move', update: function(){
				var order = $(this).sortable("serialize") + '&update=update';
				$.post(sorting, order);
			}                                                                 
		});	
	}
};