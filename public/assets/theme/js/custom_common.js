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
                    $("[name=" + k + "]").after(error(v));
                });
				
				if(result.message) error_alert(result.message)
            } else {
                if (result.reload == '1') {
                    window.location.reload();
                } else if (result.redirect == '1') {
                    window.location.href = result.url;
                } else if (result.records) {
                    $(result.selector).html(result.records);
                } else {
					$form[0].reset();
                    if(result.message) success_alert(result.message)
                }
            }
        }
    });
    return false;
});

/*Success Message*/
function success_alert(message)
{
	$(".success-alert").attr('data-message', message).trigger('click');
}
/*Error Message*/
function error_alert(message)
{
	$(".error-alert").attr('data-message', message).trigger('click');
}
function error(error) {
    return '<div class="parsley-errors-list filled"><span class="parsley-required">' + error + '</span></div>';
}