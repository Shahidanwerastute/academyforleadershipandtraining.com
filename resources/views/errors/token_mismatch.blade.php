@extends('auth.layouts.master')

@section('content')
    <div class="page404">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <div class="card box">
                <br>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        {{ HTML::image('theme/images/404.png', 'Session Expired!', array('style' => 'width:200px;margin-bottom:20px;')) }}
                        <h1>Session Expired!</h1>
                        <h2>You page session expired. Please reload page again!</h2>
                        <div class="image404"></div>
                        <h1>
                            <a href="{{ route('auth.login') }}">
                                Take me back to the homepage                                    
                            </a>
                        </h1>
                    </div>
                </div>
            </div>   
        </div>
    </div>
@endsection

@push('js')
	<script>
		new WOW().init();
		// Centering Div Vertically and Horizontally Code
		 jQuery.fn.center = function () {
		
		  this.css("position","absolute");
		  this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
					 $(window).scrollTop()) + "px");
		  this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
					 $(window).scrollLeft()) + "px");
		  return this;
		 }
		 
		 $('#dvDemo').center();
			$(window).resize(function() {
			$('#dvDemo').center();
		 });

		 $('#dvDemo').show("scale", 1000
			,function() {
				}
		 );
		 var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
		 if(is_chrome != true)
		 {
			document.getElementById('detect_chrome').innerHTML = 'Application best works with chrome.';
		 }
		// Centering Div Vertically and Horizontally Code End
	</script>
@endpush

@push('metaInfo')
	<title>Session Expired! </title>
@endpush