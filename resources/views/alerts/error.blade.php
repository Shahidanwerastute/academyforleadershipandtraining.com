<div class="uk-width-medium-1-4" style="display:none">

	<button class="md-btn error-alert" data-message="<a href='#' class='notify-action'>Refresh</a> {{ Session::get('error') }}" data-status="warning" data-pos="bottom-right">Warning</button>

</div>

@if(Session::has('error'))

	@push('js')

		<script>

			$(document).ready(function(){
	
				setTimeout(function(){ $(".error-alert").trigger('click'); }, 1000);

			});

		</script>

	@endpush

@endif