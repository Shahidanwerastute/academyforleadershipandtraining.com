	<!-- common functions -->	<script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>	{{ HTML::script('public/assets/assets/js/common.min.js') }}	{{ HTML::script('public/assets/theme/js/bootstrap.min.js') }}	{{ HTML::script('public/assets/theme/plugins/grid/mg-space.js') }}	{{ HTML::script('public/assets/theme/js/custom.js') }}	<!-- Common Js -->	{{HTML::script('public/assets/theme/js/custom_common.js')}}	@stack('js')		<script language="javascript">		$(document).ready(function ($) {			$("#VideoBox").click(function () {				$("#VideoBox").php('<iframe width="100%" height="100%" src=video/jim_glantz_video.mp4?autoPlay=true"\n' +					'                    allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed"\n' +					'                    allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen></iframe>');			});		});	</script>	</body></html>