<div class="uk-width-medium-1-4" style="display:none">

	<button class="md-btn success-alert" data-message="<a href='#' class='notify-action'>Clear</a> {{ Session::get('message') }}" data-timeout="0" data-status="success" data-pos="bottom-right">Success</button>

</div>

@if(Session::has('message'))

	@push('js')

		<script>

			$(document).ready(function(){

				setTimeout(function(){ $(".success-alert").trigger('click'); }, 2000);

			});

		</script>

	@endpush

@endif