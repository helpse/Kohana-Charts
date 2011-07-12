<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
	'javascripts' => array(
		'modules/chart/vendors/amcharts/raphael.js',
		'modules/chart/vendors/amcharts/amcharts.js'
	),
	'images' => '/modules/chart/vendors/amcharts/images/',
	'width' => '100%',
	'height' => '300px',
	'template_folder' => 'chart',
	'class' => '',
	'cache' => TRUE,
	'cache_lifetime' => '600'
);