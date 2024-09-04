<?php
return array(
    'pdf' => array(
        'enabled' => true,
        //'binary'  => base_path().'/public/assets/library/wkhtmltox/64/wkhtmltopdf',
		'binary'  => 'C:\xampp\htdocs\academy_for_leadership\assessment\public\assets\library\wkhtmltox\64\wkhtmltopdf.exe',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => base_path().'/public/assets/library/wkhtmltox/64/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
);
