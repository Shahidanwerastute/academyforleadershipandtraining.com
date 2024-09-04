$(function () {
    // crud table
    if ($('#records').length) records.init();
});
records = {
    init: function () {
        $('#records').jtable({
            title: 'Manage Instructors',
            paging: true //Enable paging
                ,
            messages: {
                addNewRecord: 'Add new instructor',
                editRecord: 'Edit instructor',
                areYouSure: 'Are you sure?',
            },
            pageSize: 10 //Set page size (default: 10)
                ,
            sorting: false,
            addRecordButton: $('#recordAdd'),
            deleteConfirmation: function (data) {
                data.deleteConfirmMessage = 'Are you sure to delete instructor ' + data.record.name + '?';
            },
            formCreated: function (event, data) {
                /*Upload Image*/
                data.form.attr('enctype', 'multipart/form-data');

                var image_params = {
                    id: (data.formType == "edit" ? data.record.id : ''),
                    width: '438',
                    height: 'auto',
                    allowed_types: "*.(jpg|jpeg|gif|png)",
                    route: upload,
                    selector: ".image",
                    formType: data.formType,
                    table: 'instructor',
                    field: 'image',
                    dir: 'public/assets/admin/images/instructor/',
                }
                bind_upload_image(image_params);

                reInitDesign(event, data);
            },
            actions: {
                listAction: _listing,
                createAction: _create,
                updateAction: _update,
                deleteAction: _delete
            },
            fields: {
                id: {
                    key: true,
                    create: false,
                    edit: false,
                    list: false
                },
                name: {
                    title: 'Name*',
                    create: true,
                    edit: true,
                    list: true,
                    type: 'text'
                },
                bio: {
                    title: 'Bio',
                    create: true,
                    edit: true,
                    list: false,
                    inputClass: 'defaultRichHtml',
                    type: 'textarea',
                    sorting: false
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
                            html += '<div class="thumb_file" style="width:30px;height:30px;"><a target="_blank" href="' + base_url + '/public/assets/admin/images/instructor/' + data.record.image + '"><img src="' + base_url + '/public/assets/admin/images/instructor/' + data.record.image + '" title="Click to open in new window" /></a></div>'
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
                            return '<div class="thumb_file" style="width:20px;height:20px;"><a target="_blank" href="' + base_url + '/public/assets/admin/images/instructor/' + data.record.image + '"><img src="' + base_url + '/public/assets/admin/images/instructor/' + data.record.image + '" title="Click to open in new window" /></a></div>';
                        }
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
    }
};