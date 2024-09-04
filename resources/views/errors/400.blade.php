<!doctype html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no"/>
	{{ HTML::favicon('public/assets/assets/img/favicon-16x16.png') }}
	{{ Html::favicon('public/assets/assets/img/favicon-32x32.png') }}
    <title>400 Bad Request! | {{ config('app.name') }}</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- uikit -->
	{{ Html::style('public/assets/bower_components/uikit/css/uikit.almost-flat.min.css',array('media'=>'all')) }}
    <!-- altair admin error page -->
    {{ Html::style('public/assets/assets/css/error_page.min.css',array('media'=>'all')) }}
</head>
<body class="error_page">
    <div class="error_page_header">
        <div class="uk-width-8-10 uk-container-center">
            400 Bad Request!
        </div>
    </div>
    <div class="error_page_content">
        <div class="uk-width-8-10 uk-container-center">
            <p class="heading_b">Oops! Something went wrong...</p>
            <p class="uk-text-large">
                There was an error. Please try again later.
            </p>
            <a href="#" onclick="history.go(-1);return false;">Go back to previous page</a>
        </div>
    </div>
    <script>
        // check for theme
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>
</body>
</html>