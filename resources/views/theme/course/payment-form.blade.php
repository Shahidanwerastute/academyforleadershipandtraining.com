@extends('theme.layouts.template')
@section('content')
<div id="BannerInner">
	<img src="{{URL::to('/')}}/public/assets/theme/images/banner-contact.jpg" alt="Banner About" class="img-fluid w-100">
	<div class="caption">
	To Pay By Credit Card or Paypal
	</div>
</div>

<main id="main">
	<section id="Contact" class="pt-5 pb-5">
		<div class="pay-method">
			<h2 class="text-center">Payment Summary</h2>
			<p><strong>Course:</strong> {!! $data['course']->title !!}</p>
			<p><strong>Duration:</strong> {{$data['course']->day}}</p>
			<p><strong>Location:</strong> {!!strip_tags($data['course']->location)!!}</p>
			<p><strong>Total Amount:</strong> ${{number_format($data['course']->price)}}</p>
			
			<div id="dropin-container"></div><br>
			
			<div class="">
				<input id="submit-button" name="submit" type="submit" class="btn btn-primary BtnBlue" value="
				Pay for this Course">
			</div>
		</div>
	</section>
</main>
@include('alerts.success')
@include('alerts.error')
@endsection
@push('css')
{{HTML::style('public/assets/theme/css/alert.css')}}
@endpush
@push('js')
<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
{{HTML::script('public/assets/assets/js/altair_admin_common.js')}} 
{{HTML::script('public/assets/assets/js/pages/components_notifications.min.js')}}
{{HTML::script('public/assets/assets/js/uikit_custom.min.js')}}
<script>
	var button = document.querySelector('#submit-button');

	braintree.dropin.create({
		authorization: "{{ Braintree_ClientToken::generate() }}",
		container: '#dropin-container',
		paypal: {
			flow: 'vault'
		}
	}, function(createErr, instance) {
		if (createErr) {
			// An error in the create call is likely due to
			// incorrect configuration values or network issues.
			// An appropriate error will be shown in the UI.
			error_alert(createErr);
			return;
		}

		instance.on('paymentMethodRequestable', function (event) {
			if(event.type == "PayPalAccount") {
				ajax_call();
			}
			button.removeAttribute('disabled');
		});

		instance.on('noPaymentMethodRequestable', function () {
			button.setAttribute('disabled', true);
		});

		button.addEventListener('click', function() {
			ajax_call();
		});

		function ajax_call() {
			instance.requestPaymentMethod(function(err, payload) {
				if (err) {
					// Handle error
					error_alert(err);
					return;
				} else {
				altair_helpers.content_preloader_show();
				$('#submit-button').hide();
				$.get('{{ route('theme-course-payment-process', [$data['course']->id, Str::slug($data['course']->title, '-')]) }}', {
						payload
					},
					function(response) {
						altair_helpers.content_preloader_hide();
						if (response.redirect) {
							location.reload();
						} else if (response.success) {
							success_alert(response.message);
							$('#submit-button').hide();
						} else {
							error_alert(response.message);
							$('#submit-button').show();
						}
					}, 'json');
				}
			});
		}
	});
</script>

@endpush
@push('metainfo')
<title>Payment | {{ $data['course']->title }}</title>
<meta name="description" content="{{ $data['course']->short_info }}" />
@endpush