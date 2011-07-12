<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_Cursor extends Chart_Module {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/chartcursor
	 * 
	 */
	
	protected $_properties = array(
		'bulletsEnabled', 'bulletSize', 'categoryBalloonAlpha', 
		'categoryBalloonColor', 'categoryBalloonDateFormat', 
		'categoryBalloonEnabled', 'color', 'cursorAlpha', 'cursorColor', 
		'cursorPosition', 'pan', 'valueBalloonsEnabled', 'zoomable', 
		'zooming',
	);
	
	protected $_methods = array(
		'hideCursor',
	);
	
	protected $_type = 'ChartCursor';
}
	