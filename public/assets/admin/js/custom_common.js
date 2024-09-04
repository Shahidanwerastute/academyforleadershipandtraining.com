$(document).ready(function() {
	/*Color Picker*/
	if($(".color-picker").length) {
		$(".color-picker").spectrum({
			preferredFormat: "hex",
			showInput: true,
			showPalette: true,
			palette: [["red", "rgba(0, 255, 0, .5)", "rgb(0, 0, 255)"]]
		});
	}
    /*Language Switcher*/
    $("#lang_switcher").change(function() {
        $.ajax({
            url: language_switch,
            dataType: 'json',
            type: 'post',
            data: {
                code: $(this).val()
            },
            success: function(response) {
                location.reload();
            }
        });
    });
    /*Group Switcher*/
    $(".group-switcher ul li").click(function() {
        $.ajax({
            url: group_switch,
            dataType: 'json',
            type: 'post',
            data: {
                id: $(this).data('id')
            },
            success: function(response) {
                location.reload();
            }
        });
    });
    /*Country,State,City Selection */
    $('[name="country_id"]').on('change', function(e) {
        var $this = $(this);
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: country_to_state,
                data: 'country_id=' + countryID,
                dataType: "json",
                success: function(response) {
                    if (e.originalEvent == undefined) {
                        selectize($('[name="state_id"]'), response, (state_id ? state_id : ''));
                    } else selectize($('[name="state_id"]'), response);
                }
            });
        }
    });
    $('[name="state_id"]').on('change', function(e) {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: state_to_city,
                data: 'state_id=' + stateID,
                dataType: "json",
                success: function(response) {
                    if (e.originalEvent == undefined) selectize($('[name="city_id"]'), response, (city_id ? city_id : ''));
                    else selectize($('[name="city_id"]'), response);
                }
            });
        }
    });
    $('[name="country_id"]').change();
});
/*Form Submit*/
$(document).on('submit', '.ajax_form', function(e) {
    $form = $(this);
    altair_helpers.content_preloader_show();
    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: new FormData(this),
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(result) {
            altair_helpers.content_preloader_hide();
            $("input, select").removeClass('md-input-danger');
            $(".parsley-errors-list").remove();
            if (result.success == false) {
                $.each(result.error, function(k, v) {
                    $("[name=" + k + "]").addClass('md-input-danger');
                    $("[name=" + k + "]").parent().after(error(v));
                });
            } else {
                if (result.reload == '1') {
                    window.location.reload();
                } else if (result.records) {
                    $(result.selector).html(result.records);
                } else {
					$form[0].reset();
                    $(".success-alert").attr('data-message', success_alert(result.message)).trigger('click');
                }
            }
        }
    });
    return false;
});
/*Success Messag*/
function success_alert(message) {
    return "<a href='#' class='notify-action'>Clear</a> " + message;
}

function error(error) {
    return '<div class="parsley-errors-list filled" id="parsley-id-5"><span class="parsley-required">' + error + '</span></div>';
}
/*Selectize Plugin Jquery*/
function selectize(selector, data, id = '') {
    var $obj = selector.selectize();
    var selectize = $obj[0].selectize;
    selectize.clear();
    selectize.clearOptions();
    selectize.load(function(callback) {
        callback(data);
        if (id) selectize.setValue(id)
    });
}
/*Upload Image*/
function bind_upload_image(params) {
    var progressbar = $(params.selector).find('.file_upload-progressbar'),
        bar = progressbar.find('.uk-progress-bar'),
        settings = {
            action: params.route, // Target url for the upload
            allow: params.allowed_types, // File filter
            multiple: true,
            param: "file",
            params: {
                array: JSON.stringify(params)
            },
            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
            },
            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent + "%").text(percent + "%");
            },
            allcomplete: function(response, xhr) {
                bar.css("width", "100%").text("100%");
                setTimeout(function() {
                    progressbar.addClass("uk-hidden");
                    if (response !== "") {
                        var obj = $.parseJSON(response);
                        $(params.selector).find("input[type='hidden']").val(obj.image);
                        $(params.selector).find('.thumb_file').find('img').attr('src', obj.src);
                        $(params.selector).find('.thumb_file').find('a').attr('href', obj.src);
                        $('.thumb_file').show();
                    }
                }, 250);
                setTimeout(function() {
                    UIkit.notify({
                        message: "Upload Completed",
                        pos: 'top-right'
                    });
                }, 280);
            }
        };
    var select = UIkit.uploadSelect($(params.selector).find('.file_upload-select'), settings),
        drop = UIkit.uploadDrop($(params.selector).find('.file_upload-drop'), settings);
}
/*JTable*/
var dateFormat = /^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.]((?:19|20)\d\d)$/

function checkLEGAL(field, rules, i, options) {
    var match = field.val().match(dateFormat)
    console.log(match)
    if (!match) return "enter valid date DD/MM/YYYY"
}

function reInitDesign(event, data) {
    // replace click event on some clickable elements
    // to make icheck label works
    data.form.find('.jtable-option-text-clickable').each(function() {
        var $thisTarget = $(this).prev().attr('id');
        $(this).attr('data-click-target', $thisTarget).off('click').on('click', function(e) {
            e.preventDefault();
            $('#' + $(this).attr('data-click-target')).iCheck('toggle');
        })
    });
    // create selectize
    data.form.find('select:not([class=icon-category-select])').each(function() {
        var $this = $(this);
        $this.after('<div class="selectize_fix"></div>').selectize({
            dropdownParent: 'body',
            placeholder: 'Click here to select ...',
            onDropdownOpen: function($dropdown) {
                $dropdown.hide().velocity('slideDown', {
                    begin: function() {
                        $dropdown.css({
                            'margin-top': '0'
                        })
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
            },
            onDropdownClose: function($dropdown) {
                $dropdown.show().velocity('slideUp', {
                    complete: function() {
                        $dropdown.css({
                            'margin-top': ''
                        })
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
            }
        });
    });
    // create icheck
    data.form.find('input[type="checkbox"],input[type="radio"]').each(function() {
        var $this = $(this);
        $this.iCheck({
            checkboxClass: 'icheckbox_md',
            radioClass: 'iradio_md',
            increaseArea: '20%'
        }).on('ifChecked', function(event) {
            $this.parent('div.icheckbox_md').next('span').text('Active');
        }).on('ifUnchecked', function(event) {
            $this.parent('div.icheckbox_md').next('span').text('Passive');
        })
    });
    // reinitialize inputs
    data.form.find('.jtable-input').children('input[type="text"],input[type="password"],textarea').not('.md-input').each(function() {
        $(this).addClass('md-input');
        altair_forms.textarea_autosize();
    });
    altair_md.inputs();
    if (data.form.find(".defaultRichHtml").length) {
        data.form.find(".defaultRichHtml").ckeditor({
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent']
                },
                {
                    name: 'styles'
                },
                {
                    name: 'tools'
                },
                { name: 'document',    groups: [ 'source', 'mode', 'document', 'doctools' ] },
            ],
            height: 200,
            width: 330,
            format_tags: 'p;h1;h2;h3;h4;h5',
            removeButtons: 'Styles'
        });
    }
}
$(document).on('click','.reminder_email_button', function(e) {
    var $url = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: $url,
        dataType: "json",
        cache: false,
        beforeSend: function () {
            altair_helpers.content_preloader_show();
        },
        complete: function () {
            altair_helpers.content_preloader_hide();
        },
        success: function(response) {
            console.log(response.message);
            //alert(response.message);
            setTimeout(function() {
                window.location.reload();
            }, 2000);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert("Friends assessments are pending. Sorry, can't send aggregate email for now.");
            // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});

/*$(document).on('click','.generate_survey_pdf_button', function(e) {
    var $url = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: $url,
        cache: false,
        beforeSend: function () {
            altair_helpers.content_preloader_show();
        },
        complete: function () {
            altair_helpers.content_preloader_hide();
        },
        success: function(response) {
            alert(response);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}); */

$(document).on('click','.invitation_email_button', function(e) {
    var $url = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: $url,
        dataType: "json",
        cache: false,
        success: function(response) {
            console.log(response.message);
            //alert(response.message);
            setTimeout(function() {
                window.location.reload();
            }, 2000);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
$(document).on('click','.session_reminder_email_button', function(e) {
    var $url = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: $url,
        dataType: "json",
        cache: false,
        success: function(response) {
            console.log(response.message);
            //alert(response.message);
            setTimeout(function() {
                window.location.reload();
            }, 2000);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});