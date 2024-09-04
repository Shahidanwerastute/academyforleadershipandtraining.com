<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-md-5 mb-xl-0 text-center text-md-left">
                <img src="{{URL::to('/')}}/public/assets/theme/images/logo-white.png" alt="image" class="img-fluid mb-4">

                <p>The Academy for Leadership &amp; Training.</p>
                <h5 class="mb-4">Contact Details</h5>
                <p>Fort Lauderdale, Florida</p>
                <p><span>Phone :</span> <a href="tel:310-988-8727">310 988 8727</a></p>
                <p><span>Email :</span> <a href="mailto:jim@taflat.com">jim@taflat.com</a></p>
				
				<ul class="list-inline">
					<li>
						<a href="https://www.facebook.com/AcademyforLeadershipandTraining/" target="_blank">
							<span class="fab fa-facebook-f"></span>
						</a>
					</li>
					<li>	
						<a href="https://twitter.com/JimGlantz" target="_blank">
							<span class="fab fa-twitter"></span>
						</a>
					</li>
					<li>	
						<a href="https://www.linkedin.com/in/jimglantz07/" target="_blank">
							<span class="fab fa-linkedin-in"></span>
						</a>
					</li>
				</ul>
            </div>
            <div class="col-md-4 mb-md-5 mb-xl-0 pl-5 Ftrnav">
                <h5 class="mb-5 text-center text-md-left">quick links</h5>
                <ul class="footer-links">
                    <li><a href="{{route('theme-index')}}" class="{{Route::is('theme-index') ? 'active' : ''}}">Home</a></li>
                    <li><a href="{{route('theme-about')}}" class="{{Route::is('theme-about') ? 'active' : ''}}">About TAFLAT</a></li>
                    <li><a href="{{route('theme-leadership-training')}}" class="{{Route::is('theme-leadership-training') ? 'active' : ''}}">Leadership Training</a></li>
                    <li><a href="{{route('theme-executive-coaching')}}" class="{{Route::is('theme-executive-coaching') ? 'active' : ''}}">Executive Coaching</a></li>
                    <li><a href="{{route('theme-consulting')}}" class="{{Route::is('theme-consulting') ? 'active' : ''}}">Consulting</a></li>
                    <li><a href="{{route('theme-clients')}}" class="{{Route::is('theme-clients') ? 'active' : ''}}">Current Clients</a></li>
                    <li><a href="{{route('theme-contact')}}" class="{{Route::is('theme-contact') ? 'active' : ''}}">Contact</a></li>
                    <li><a href="{{route('theme-tos')}}" class="{{Route::is('theme-tos') ? 'active' : ''}}">Terms & Conditions</a></li>
                    <li><a href="{{route('theme-privacy-policy')}}" class="{{Route::is('theme-privacy-policy') ? 'active' : ''}}">Privacy Policy</a></li>
                </ul>
            </div>
			@if($data["recent_blogs"])
				<div class="col-md-4 text-center text-md-left RecentBlog">
					<h5 class="mb-5">RECENT blogs</h5>
					<ul>
						@foreach($data["recent_blogs"] as $row)
							<li>
								<a href="{{route('theme-blog-detail', [$row->id, str_replace(' ', '-', $row->title)])}}">{{$row->title}}</a>
								<span>{{$carbon::parse($row->created_at)->format('m/d/Y')}}</span>
							</li>
						@endforeach
					</ul>
				</div>
			@endif
           <!--  <div class="col-xl-3 col-lg-6 col-md-6 text-center text-md-left Newsletter">
                <h5 class="mb-5">Newsletter</h5>
                <p>Subscribe to our newsletter, you
                    receive all the important news.</p>
                <form action="">
                    <input type="text" id="" name="" placeholder="Enter your Email Address ...">
                    <input type="submit" value="Send" class="btn btn-primary"/>
                </form>
            </div> -->
        </div>
        <div class="w-100 CopyRight pt-5 mt-5 text-center">© {{date('Y')}} | The Academy For Leadership And Training</div>
    </div>
</footer>

<script>
	$(document).ready(function ($) {
		$(".video-img-click").click(function () {
			iframe_url = $(this).data('iframe');
			$(this).html(iframe_url);
		});
	});
</script>
<script type="text/javascript"> _linkedin_partner_id = "1287732"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1287732&fmt=gif" /> </noscript>