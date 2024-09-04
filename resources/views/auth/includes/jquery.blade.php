{!! HTML::script('public/assets/assets/js/common.min.js') !!}
{!! HTML::script('public/assets/assets/js/uikit_custom.min.js') !!}
{!! HTML::script('public/assets/assets/js/altair_admin_common.min.js') !!}
<!-- Notifications -->
{!! HTML::script('public/assets/assets/js/pages/components_notifications.min.js') !!}
<script type="text/javascript">
	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
</script>
<script>
	// check for theme
	if (typeof(Storage) !== "undefined") {
		var root = document.getElementsByTagName( 'html' )[0],
			theme = localStorage.getItem("altair_theme");
		if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
			root.className += ' app_theme_dark';
		}
	}
</script>
@stack('js')