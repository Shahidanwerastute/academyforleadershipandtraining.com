var start_point = ".quesEdFormFull .questionnaireEd > .start-point";
var total_no_list = $(start_point).size();
var windowInnerHeight = window.innerHeight;

/*Typeform*/
function next() {
    var listItem = $(".fp-completely");
    var urIndexNo = (listItem.index(start_point));
    var urIndexNo = urIndexNo + 1;
    if ($(start_point + ':nth-child(' + urIndexNo + ')').next('.start-point').length) {
        if ($(start_point + ':nth-child(' + urIndexNo + ')').hasClass('required') && $(start_point + ':nth-child(' + urIndexNo + ')').find("input[type=text][name!='']").size() == 4) {
            var counter = 0;
            $(start_point + ':nth-child(' + urIndexNo + ')').find("input[type=text][name!=''].require").each(function (index) {
                if (!$(this).val()) {
                    $(this).next().html("This field is required!");
                    counter++;
                } else $(this).next().html("");
            });
            if (counter > 0) return false;
        } else if ($(start_point + ':nth-child(' + urIndexNo + ')').hasClass('required') && $(start_point + ':nth-child(' + urIndexNo + ')').hasClasses('radioBoxes') && !$(start_point + ':nth-child(' + urIndexNo + ')').find("input[type=radio][name!='']:checked").val()) {
            $(start_point + ':nth-child(' + urIndexNo + ')').find("input[type=text][name!=''], input[type=hidden][name!=''], textarea[name!=''], select[name!=''], input[type=radio][name!='']:checked, input[type=checkbox][name!='']:checked").focus();
            $(start_point + ':nth-child(' + urIndexNo + ')').find('.error').html("Answer of this question is compulsory!");
            return false;
        } else {
            $('.error').html("");
        }
        $(start_point + ':nth-child(' + urIndexNo + ')').find(".rbox").removeClass('active');
        $(start_point + ':nth-child(' + urIndexNo + ')').find("input[type=radio][name!='']:checked").parents('.rbox:first').addClass('active');
        if ($(start_point + ':nth-child(' + urIndexNo + ')').next('.start-point').hasClasses('ab || rl')) {
            if (evaluate_quardinates() == 2) {
                var urIndexNo = $('.ab').index(start_point);
            } else if (evaluate_quardinates() == 3) {
                var urIndexNo = $('.rl').index(start_point);
            } else if ($(start_point + ':nth-child(' + urIndexNo + ')').next('.start-point').hasClass('ab')) {
                if ($(start_point + '.ab').find('[type=radio]').is(":checked")) {
                    var urIndexNo = $('.ab').index(start_point);
                } else if ($(start_point + '.rl').find('[type=radio]').is(":checked")) {
                    var urIndexNo = $('.rl').index(start_point);
                } else if (evaluate_quardinates() != 1) {
                    var urIndexNo = $(start_point).last().index(start_point);
                }
            } else if ($(start_point + ':nth-child(' + urIndexNo + ')').next('.start-point').hasClass('rl')) {
                if ($(start_point + '.rl').find('[type=radio]').is(":checked")) {
                    var urIndexNo = $('.rl').index(start_point);
                } else if (evaluate_quardinates() != 1) {
                    var urIndexNo = $(start_point).last().index(start_point);
                }
            } else if (evaluate_quardinates() != 1) {
                var urIndexNo = $(start_point).last().index(start_point);
            }
        } else {
            if (total_no_list != (urIndexNo + 1)) {
                $(start_point + '.rl, ' + start_point + '.ab').find('[type=radio]').prop('checked', false);
                $(start_point + '.rl, ' + start_point + '.ab').find(".rbox").removeClass('active');
            }
        }
        $.fn.fullpage.moveTo(urIndexNo + 1);
    }
    ;
};

function prev() {
    var listItem = $(".fp-completely");
    var urIndexNo = (listItem.index(start_point));
    var urIndexNo = urIndexNo + 1;
    if ($(start_point + ':nth-child(' + urIndexNo + ')').prev('.start-point').hasClasses('ab || rl')) {
        if ($(start_point + ':nth-child(' + urIndexNo + ')').prev('.start-point').hasClass('rl')) {
            if ($(start_point + '.rl').find('[type=radio]').is(":checked")) {
                urIndexNo = $('.rl').index(start_point) + 2;
            } else if ($(start_point + '.ab').find('[type=radio]').is(":checked")) {
                urIndexNo = $('.ab').index(start_point) + 2;
            } else {
                urIndexNo = $('.ab').index(start_point) + 1;
            }
        } else if ($(start_point + ':nth-child(' + urIndexNo + ')').prev('.start-point').hasClass('ab')) {
            if ($(start_point + '.ab').find('[type=radio]').is(":checked")) {
                urIndexNo = $('.ab').index(start_point) + 2;
            } else {
                urIndexNo = $('.ab').index(start_point) + 1;
            }
        } else {
            urIndexNo = $('.ab').index(start_point) + 1;
        }
    }

    if ($(start_point + ':nth-child(' + urIndexNo + ')').prev('.start-point').length) {
        $.fn.fullpage.moveTo(urIndexNo - 1);
    }
    ;
};

function evaluate_quardinates() {
    var a = b = l = r = 0;
    $(start_point).find("input[type=radio][name!='']:checked").each(function () {
        if ($(this).val() == "A") a++;
        else if ($(this).val() == "B") b++;
        else if ($(this).val() == "L") l++;
        else if ($(this).val() == "R") r++;
    });
    if ($.inArray(a - b, [5, -5]) != -1 && $.inArray(r - l, [5, -5]) != -1)
        return "1";
    else if ($.inArray(a - b, [5, -5]) != -1)
        return "2";
    else if ($.inArray(r - l, [5, -5]) != -1)
        return "3";
    else
        return false;
}

/*Keys event*/
$("body").keydown(function (e) {
    var listItem = $(".fp-completely");
    var urIndexNo = (listItem.index(start_point));
    var urIndexNo = urIndexNo + 1;
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 37 || code == 38) prev();
    else if (code == 39 || code == 40 || code == 13) {
        if ($(start_point + ':nth-child(' + urIndexNo + ')').find("[name=coupon]").length) {
            $('.coupon').click();
        } else {
            next();
        }
        e.stopPropagation();
        e.preventDefault();
        return false;
    } else if ((code >= 65 && code <= 90) || (code >= 97 && code <= 122)) {
        var yourKeyIs = String.fromCharCode(code); //		converting back into Alphabatic
        var yourKeyIs = yourKeyIs.toLowerCase();
        $(start_point + ':nth-child(' + urIndexNo + ')').find('.media .media-left').each(function (i) {
            if ($(this).find('label b:first').text().toLowerCase() == yourKeyIs) {
                $(this).children('input[type="radio"]').click();
                return false;
            }
        });
    } else if ((code == 9)) {

        if ($(e.target).hasClass("allowTab")) {
            //do nothing, let the tabbing work
        } else if ($(e.target).hasClass("mobileTabSpecial")) {
            //show footer fields back
            $("#footer").show();
            $(".emptydiv").hide();

            //stop tabbing
            e.stopPropagation();
            e.preventDefault();
            return false;
        } else {
            //stop tabbing
            e.stopPropagation();
            e.preventDefault();
            return false;
        }

    }
    ;
});
//KERYORESS END
$(document).ready(function (e) {
    //Radio Buttons function
    $(start_point + '.radioBoxes input[type="radio"]').click(function (e) {
        setTimeout(function myFunction() {
            next();
        }, 100)
    });
    $(start_point + '.dropDown select').change(function (e) {
        setTimeout(function myFunction() {
            next();
        }, 100)
    });
    // Next button function
    $('.movepage .next').click(function (e) {
        e.stopPropagation();
        next();
    });
    // Previous button function
    $('.movepage .prev').click(function (e) {
        e.stopPropagation();
        prev();
    });

    var myEfficientFn = debounce(function (e) {
        var listItem = $(".fp-completely");
        var urIndexNo = (listItem.index(start_point));
        var urIndexNo = urIndexNo + 1;
        var delta = e.wheelDelta ? e.wheelDelta : -e.detail;
        if (delta > 0) {
            prev();
        } else if (delta < 0) {
            if ($(start_point + ':nth-child(' + urIndexNo + ')').find("[name=coupon]").length) {
                $('.coupon').click();
            } else {
                next();
            }
        }
    }, 100);
    // For Chrome
    window.addEventListener('mousewheel', myEfficientFn);
    // For Firefox
    window.addEventListener('DOMMouseScroll', myEfficientFn);

    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this,
                args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    /*Fullpage Plugin*/
    $('#fullpage').fullpage({
        navigation: false,
        navigationPosition: 'right',
        keyboardScrolling: false,
        onLeave: function (index, nextIndex, direction) {
            var widthSbe = (nextIndex / total_no_list) * 100;
            $(".progress-bar").text(widthSbe.toFixed(0) + '%').css("width", widthSbe + "%");
        }
    });

    $('.arrowDown').click(function () {
        next();
    });

    $.fn.fullpage.setAllowScrolling(false);

    $(".coupon").click(function (e) {
        $this = $(this);
        $.ajax({
            url: coupon_route,
            type: 'post',
            data: {code: $("input[name=coupon]").val()},
            dataType: 'json',
            beforeSend: function () {
                if (!$("#loader-content").length) $('body').prepend('<div id="loader-content"><div class="loader">Loading...</div></div>');
            },
            complete: function () {
                $('#loader-content').fadeOut('slow', function () {
                    $(this).remove();
                });
            },
            success: function (response) {
                $this.parents('.start-point:first').find('._success, ._error').html('');
                $('.payment_info').html('');
                if (response.type == 0 && response.result) {
                    $('.payment_info').hide();
                    $('.paypal_text').hide();
                    $this.parents('.start-point:first').find('._success').html("The " + response.result.name + " is providing your assessment free of charge.");
                    $("input[name=coupon_status]").val(1);
                } else if (response.type == 1 && response.result) {
                    $('.payment_info').show();
                    if (response.result.percentage == "100")
                        $('.paypal_text').hide();
                    else
                        $('.paypal_text').show();
                    $('.paypal_text').hide();
                    $this.parents('.start-point:first').find('._success').html("Congratulations. You've received " + response.result.percentage + "% off!");
                    $("input[name=coupon_status]").val(2);
                    next();
                } else {
                    $('.payment_info').show();
                    $('.paypal_text').show();
                    $this.parents('.start-point:first').find('._error').html("Invalid Coupon Code.");
                    $("input[name=coupon_status]").val(0);
                }

                if (response.payment_info) $(".payment_info").html(response.payment_info);

                _functions.check_invitations();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    $(document).on('submit', '.file_upload_form', function (e) {
        $form = $(this);
        $.ajax({
            type: $form.attr('method'),
            url: upload_excel_route,
            data: new FormData(this),
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                if (!$("#loader-content").length) $('body').prepend('<div id="loader-content"><div class="loader">Loading...</div></div>');
            },
            complete: function () {
                $('#loader-content').fadeOut('slow', function () {
                    $(this).remove();
                });
            },
            success: function (response) {
                //$("#czContainer").czMore();
                $('#czContainer_czMore_txtCount').val(response.data_count);
                $('#upload_excel_modal').modal('hide');
                $('#loader-content').fadeOut('slow');
                $('.html_for_invites').html(response.html);
                _functions.check_invitations();
                $("#invitation_modal").modal('show');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    $('input[type=text]').on('focusout', function () {
        $("#footer").show();
        $(".emptydiv").hide();
    });

    $('input[type=text]').on('focusin', function () {
        $("#footer").hide();
        $(".emptydiv").show();
    });

});

$(document).ready(function ($) {
    $(".custom-select select").focus(function () {
        $(this).parent().removeClass("up");
        $(this).parent().addClass("down");
    }).blur(function () {
        $(this).parent().removeClass("down");
        $(this).parent().addClass("up");
    })
    $('.dropdown').multiselect();
    /*Bar Rating*/
    $('select.buttons').togglebutton();
    $('.select-box').on('change', function () {
        $(this).val(this.value);
    })
});
$(document).on('click', '#btnMinus2', function () {
    var id = $(this).attr("data-id");
    $(this).parents(".recordset:first").remove();
});
$(function ($) {
    // init the state from the input
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        } else {
            $(this).removeClass('image-checkbox-checked');
        }
    });
    // sync the state to the input
    $(".image-checkbox").click(function (e) {
        if ($(this).hasClass('image-checkbox-checked')) {
            $(this).removeClass('image-checkbox-checked');
            $(this).find('input[type="checkbox"]').first().prop('checked', false);
        } else {
            $(this).addClass('image-checkbox-checked');
            $(this).find('input[type="checkbox"]').first().prop('checked', true);
        }
        e.preventDefault();
    });
});
/*To check class of selector*/
(function ($) {
    // wrap jQuery's .hasClass in a local function
    function hasClassName($element, className) {
        return $element.hasClass(className);
    }

    // remove 'all:', 'any:', delimeters '||' and '&&'
    // and any bogus commas or periods
    function splitClassNames(classNames) {
        return classNames.replace(/\.|,|any:|all:|\|\||&&/g, ' ').trim().split(/\s+/);
    }

    $.fn.hasAnyClass = function (classNames) {
        var i = -1,
            classes = splitClassNames(classNames),
            len = classes.length;
        while (++i < len) {
            if (hasClassName(this, classes[i])) {
                return true;
            }
        }
        return false;
    };
    $.fn.hasAllClasses = function (classNames) {
        var i = -1,
            classes = splitClassNames(classNames),
            len = classes.length,
            matches = 0;
        while (++i < len) {
            if (hasClassName(this, classes[i])) {
                matches++;
            }
        }
        return matches === len;
    };
    $.fn.hasClasses = function (classNames) {
        var any = false;
        // forgive stupidity if || is included in an 'all:' check
        if (classNames.indexOf('all:') === 0) {
            any = false;
        } else if (classNames.indexOf('any:') === 0) {
            any = true;
        } else if (classNames.indexOf('||') > -1) {
            any = true;
        }
        // 'all' is default check if no 'any' indicators are present
        return any ? this.hasAnyClass(classNames) : this.hasAllClasses(classNames);
    };
})(jQuery);

/*Invitation friends for your individual assessment*/
$(function () {
    _functions.invitation();
    _functions.invitation_popup();
});

_functions = {
    invitation: function () {
        $("#czContainer").czMore();
    },
    validate_email: function (sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        } else {
            return false;
        }
    },
    invitation_popup: function () {
        $("#invitation_modal .modal-footer button").click(function () {
            _functions.check_invitations();
            $("#invitation_modal").modal('hide');
        });
    },
    check_invitations: function () {
        var count = 0;
        $(".recordset").each(function (index) {
            if (_functions.validate_email($(this).find("input[name^='invite[email]']").val()) && $(this).find("input[name^='invite[name]']").val()) {
                count++;
            }
        });
        if (count > 0) {
            $(".friend-assessment-info").removeClass('hide');
            $('.paypal_text').show();
            $(".friend-assessment-info span i").text(" ($" + $("[name=friend_assessment_price]").val() + " x " + count + ") = $" + $("[name=friend_assessment_price]").val() * count);
        } else {
            $(".friend-assessment-info").addClass('hide');
            $('.paypal_text').hide();
        }
    }
};