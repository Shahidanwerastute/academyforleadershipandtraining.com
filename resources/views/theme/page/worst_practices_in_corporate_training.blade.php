@extends('theme.layouts.template')
@section('content')
	<main id="main">
		<section id="CustomizedTrainingCourses" class="pt-5 pb-4 Grey">
			<div class="container">
				<div class="row mb-5">
					<div class="col-lg-3 col-md-4 col-sm-5 mb-5 mb-md-0">
						<img class="img-fluid BorderImg" src="{{URL::to('/')}}/public/assets/theme/images/img-worstpractice.png" alt="Book">
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 align-self-center">
						<h3>Worst Practices In Corporate Training</h3>
						<p class="border-bottom pb-3"><strong>Price:</strong> $15.00 <br><b>Shipping Charges billed at $3.99, domestic or international.</b></p>
						<p>Spectacular disasters... What we learned. Discover how most worst practices in corporate training can lead to developing best practices for future success.</p>
						<p>Authored by Jim Glantz Ph.D., a veteran of the corporate world, the manual is an intimate look at how corporate training failures can be turned into great learning lessons the any industry can apply. </p>

						<div class="border-bottom SocialMedia pb-3 mb-3">
							<a href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.academyforleadershipandtraining.com" target="_blank"><span
									class="fab fa-facebook-f"></span></a>
							<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fwww.academyforleadershipandtraining.com&text=Worst+Practices+In+Corporate+Training" target="_blank"><span class="fab fa-twitter"></span></a>
						</div>
						<form id="paypal_form" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" onsubmit="return calculate_price()">
						
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="jim@taflat.com">
						<input type="hidden" name="lc" value="US">
						<input type="hidden" name="item_name" value="Worst Practices In Corporate Training">
						<input type="hidden" name="amount" value="15.00">
						<input type="hidden" name="shipping" id="shipping" value="3.99">
						<input type="hidden" name="no_shipping" value="2">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="button_subtype" value="services">
						<input type="hidden" name="no_note" value="0">
						<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

						
							<img src="{{URL::to('/')}}/public/assets/theme/images/paypal-icons.png" class="img responsive" style="max-width: 300px;">
							<div class="cleaerfix"></div><br>
							<b><i>You will be automatically redirected to PayPal to complete this transaction.</i></b>
							<div class="cleaerfix"></div><br><br>
							<div class="col-6 col-sm-3 mb-4 pl-0">
								<label>Quantity</label>
								<input type="number" name="quantity" id="quantity" value="1" class="form-control">
							</div>
							<div class="col-12 pl-0">
								<button type="submit" class="btn btn-primary BtnBlue">Buy Now</button>
							</div>
						</form>
						<script type="text/javascript">				
							function calculate_price(){				
								var quantity = document.querySelector("#quantity").value;
								var shipping = document.querySelector("#shipping").value;
								var new_shipping_price = shipping;
								if(quantity > 10 && quantity <= 20){
									new_shipping_price = shipping*2;
								}else if(quantity > 20 && quantity <= 30){
									new_shipping_price = shipping*3;
								}else if(quantity > 30 && quantity <= 40){
									new_shipping_price = shipping*4;
								}else if(quantity > 40 && quantity <= 50){
									new_shipping_price = shipping*4;
								}else if(quantity > 50){
									new_shipping_price = shipping*4;
								}
								document.querySelector("#shipping").value = new_shipping_price;	
								//return false;
								document.getElementById("paypal_form").submit();
							}
						</script>
					</div>

				</div>
			</div>
		</section>
	</main>
	@include('theme.section.testimonials')
@endsection
@push('css')

@endpush
@push('js')	

@endpush
@push('metainfo')
	<title>Leadership Training and Employee Development Academy</title>
	<meta name="description" content="Our professional development training programs are designed to improve the participantâ€™s ability to lead teams by kicking off projects with clear roles and responsibilities">
@endpush