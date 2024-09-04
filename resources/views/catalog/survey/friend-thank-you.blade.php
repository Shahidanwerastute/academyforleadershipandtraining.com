@extends('catalog.layouts.template')
@section('content')
<div class="container form-container thank-you">
	<div class="row">
		<div class="col-xs-12">
			<div class="_f-page">
				<!--SCORING-->
				<section>
					<div class="_f-page-inner">
					<!--	<div class="_logo">
							<a target="_blank" href="{{$data['general_setting']->logo_url}}">
								{{HTML::image('public/assets/admin/images/'.$data['general_setting']->logo, null, array('class' => 'img-responisve'))}}
							</a>
						</div> -->

						<div>
						<div class="_logo" style="float: left;">
							
							
						<a href="#">
							{{HTML::image('public/assets/admin/images/omnicell_logo.png', null, array('class' => 'img-responisve'))}}
						</a>
					
						</div>
						<div class="_logo" style="float: right;">
							
							
						<a href="#">
							{{HTML::image('public/assets/admin/images/'.$data['general_setting']->logo, null, array('class' => 'img-responisve'))}}
						</a>
					
						</div>
						<div style="clear: both;"></div>
					</div>


						
						<div class="form-des">
							<div class="dear-text">
								Thank you very much. You have completed your assessment for {{$data['submission']->first_name.' '.$data['submission']->last_name}}.
							</div>
							</br>
							</br>
							</br>
						</div>

						<div class="footer">
							<div class="row">
								<div class="col-sm-3 col-sm-push-9 col-xs-12">
									<a href="" class="f-logo">
										{{HTML::image('public/assets/admin/images/logo.png', null, array('class' => 'img-responisve') )}}
									</a>
								</div>
								<div class="col-sm-9 col-sm-pull-3 col-xs-12">
									<p>© {{$carbon::now()->year.' '.$data['general_setting']->title}} - <a href="">www.TAFLAT.com</a></p>
								</div>
							</div>
						</div>
					</div>
					<!--/._f-page-inner-->
				</section>
			</div>
			<!--/._f-page-->
		</div>
	</div>
</div>
@endsection
@push('css')
@endpush
@push('js')	
@endpush
@push('metainfo')
<title>{{ 'Thank You | '.config('app.name') }}</title>
@endpush