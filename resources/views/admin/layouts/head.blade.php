	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no"/>
	{{ HTML::favicon('public/assets/assets/img/favicon-16x16.png') }}
	{{ Html::favicon('public/assets/assets/img/favicon-32x32.png') }}
	<!---->
	<!-- additional styles for plugins -->
	<!-- JQuery-UI -->
	{{ Html::style('public/assets/assets/skins/jquery-ui/material/jquery-ui.min.css',array('rel'=>'stylesheet')) }}
	<!-- jTable -->
	{{ Html::style('public/assets/assets/skins/jtable/jtable.min.css',array('rel'=>'stylesheet')) }}
	{{ Html::style('public/assets/bower_components/uikit/css/uikit.almost-flat.min.css',array('media'=>'all')) }}
	<!-- flag icons -->
	{{ Html::style('public/assets/assets/icons/flags/flags.min.css',array('media'=>'all','rel'=>'stylesheet')) }}
	<!-- style switcher -->
	{{ Html::style('public/assets/assets/css/style_switcher.min.css',array('media'=>'all','rel'=>'stylesheet')) }}
	<!-- altair admin -->
	{{ Html::style('public/assets/assets/css/main.min.css?v=1.1',array('media'=>'all','rel'=>'stylesheet')) }} 
	<!-- themes -->
	{{ Html::style('public/assets/assets/css/themes/themes_combined.min.css',array('media'=>'all','rel'=>'stylesheet')) }}
	{{ Html::style('public/assets/admin/css/style.css',array('media'=>'all','rel'=>'stylesheet')) }}
	@stack('css')
	@stack('metainfo')