<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_Baloon extends Chart_Module {

	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/amballoon
	 * 
	 */
	
	protected $_properties = array(
		'adjustBorderColor', 'borderAlpha', 'borderColor', 'borderThickness', 
		'color', 'cornerRadius', 'fillAlpha', 'fillColor', 'fontSize', 
		'horizontalPadding', 'pointerWidth', 'textShadowColor', 
		'verticalPadding',
	);
	
	protected $_methods = array(
		'hide', 'setBounds', 'setPosition', 'show',
	);
}
	