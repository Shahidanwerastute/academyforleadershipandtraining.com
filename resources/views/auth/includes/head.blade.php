	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no"/>
	{{ HTML::image('public/assets/assets/img/favicon-16x16.png',null, array('rel' => 'icon','sizes' => '16x16')) }}
	{{ Html::image('public/assets/assets/img/favicon-32x32.png' ,null, array('rel' => 'icon','sizes' => '32x32')) }}
	{!! HTML::style('public/assets/bower_components/uikit/css/uikit.almost-flat.min.css') !!}
	{!! HTML::style('public/assets/assets/css/login_page.min.css') !!}
	@stack('css')
	<meta name="_token" content="{!! csrf_token() !!}"/>
	@stack('metaInfo') 