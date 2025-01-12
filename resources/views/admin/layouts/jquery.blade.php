<!-- common functions -->
{{ Html::script('public/assets/assets/js/common.min.js') }}
<!-- uikit functions -->
{{ Html::script('public/assets/assets/js/uikit_custom.min.js') }}
<!-- altair common functions/helpers -->
{{ Html::script('public/assets/assets/js/altair_admin_common.js') }}
<!-- JQuery-UI -->
{{ Html::script('public/assets/bower_components/jquery-ui/jquery-ui.min.js') }}
<!-- Notifications -->
{!! HTML::script('public/assets/assets/js/pages/components_notifications.min.js') !!}  
<!-- Common Js -->
{{HTML::script('public/assets/admin/js/custom_common.js')}}<!-- Jquery push by pages -->@stack('js')
<!-- page specific plugins -->
<script>
	$(function () {
		var $switcher = $('#style_switcher')
			, $switcher_toggle = $('#style_switcher_toggle')
			, $theme_switcher = $('#theme_switcher')
			, $mini_sidebar_toggle = $('#style_sidebar_mini')
			, $slim_sidebar_toggle = $('#style_sidebar_slim')
			, $boxed_layout_toggle = $('#style_layout_boxed')
			, $accordion_mode_toggle = $('#accordion_mode_main_menu')
			, $html = $('html')
			, $body = $('body');
		$switcher_toggle.click(function (e) {
			e.preventDefault();
			$switcher.toggleClass('switcher_active');
		});
		$theme_switcher.children('li')
			.click(function (e) {
				e.preventDefault();
				var $this = $(this)
					, this_theme = $this.attr('data-app-theme');
				$theme_switcher.children('li')
					.removeClass('active_theme');
				$(this)
					.addClass('active_theme');
				$html.removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
					.addClass(this_theme);
				if (this_theme == '') {
					localStorage.removeItem('altair_theme');
				} else {
					localStorage.setItem("altair_theme", this_theme);
					if (this_theme == 'app_theme_dark') {
						$('#kendoCSS')
							.attr('href', 'bower_components/kendo-ui/styles/kendo.materialblack.min.css')
					}
				}
			});
		// hide style switcher
		$document.on('click keyup', function (e) {
			if ($switcher.hasClass('switcher_active')) {
				if (
					(!$(e.target)
						.closest($switcher)
						.length) || (e.keyCode == 27)) {
					$switcher.removeClass('switcher_active');
				}
			}
		});
		// get theme from local storage
		if (localStorage.getItem("altair_theme") !== null) {
			$theme_switcher.children('li[data-app-theme=' + localStorage.getItem("altair_theme") + ']')
				.click();
		}
		// toggle mini sidebar
		// change input's state to checked if mini sidebar is active
		if ((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
			$mini_sidebar_toggle.iCheck('check');
		}
		$mini_sidebar_toggle.on('ifChecked', function (event) {
				$switcher.removeClass('switcher_active');
				localStorage.setItem("altair_sidebar_mini", '1');
				localStorage.removeItem('altair_sidebar_slim');
				location.reload(true);
			})
			.on('ifUnchecked', function (event) {
				$switcher.removeClass('switcher_active');
				localStorage.removeItem('altair_sidebar_mini');
				location.reload(true);
			});
		// toggle slim sidebar
		// change input's state to checked if mini sidebar is active
		if ((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
			$slim_sidebar_toggle.iCheck('check');
		}
		$slim_sidebar_toggle.on('ifChecked', function (event) {
				$switcher.removeClass('switcher_active');
				localStorage.setItem("altair_sidebar_slim", '1');
				localStorage.removeItem('altair_sidebar_mini');
				location.reload(true);
			})
			.on('ifUnchecked', function (event) {
				$switcher.removeClass('switcher_active');
				localStorage.removeItem('altair_sidebar_slim');
				location.reload(true);
			});
		// toggle boxed layout
		if ((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
			$boxed_layout_toggle.iCheck('check');
			$body.addClass('boxed_layout');
			$(window)
				.resize();
		}
		$boxed_layout_toggle.on('ifChecked', function (event) {
				$switcher.removeClass('switcher_active');
				localStorage.setItem("altair_layout", 'boxed');
				location.reload(true);
			})
			.on('ifUnchecked', function (event) {
				$switcher.removeClass('switcher_active');
				localStorage.removeItem('altair_layout');
				location.reload(true);
			});
		// main menu accordion mode
		if ($sidebar_main.hasClass('accordion_mode')) {
			$accordion_mode_toggle.iCheck('check');
		}
		$accordion_mode_toggle.on('ifChecked', function () {
				$sidebar_main.addClass('accordion_mode');
			})
			.on('ifUnchecked', function () {
				$sidebar_main.removeClass('accordion_mode');
			});
	});
</script>
<script>
	$(function() {
	    if(isHighDensity) {
	        // enable hires images
	        altair_helpers.retina_images();
	    }
	    if(Modernizr.touch) {
	        // fastClick (touch devices)
	        FastClick.attach(document.body);
	    }
	});
	$window.load(function() {
	    // ie fixes
	    altair_helpers.ie_fix();
	});
</script>
<!-- google web fonts -->
<script>
	WebFontConfig = {
	    google: {
	        families: [
	            'Source+Code+Pro:400,700:latin',
	            'Roboto:400,300,500,700,400italic:latin'
	        ]
	    }
	};
	(function() {
	    var wf = document.createElement('script');
	    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	    wf.type = 'text/javascript';
	    wf.async = 'true';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(wf, s);
	})();
</script>
</body>
</html>