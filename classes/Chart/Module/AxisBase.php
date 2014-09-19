<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_AxisBase extends Chart_Module {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/axisbase
	 * 
	 */
	
	protected $_properties = array(
		'autoGridCount', 'axisAlpha', 'axisColor', 'axisThickness', 'color', 
		'dashLength', 'fillAlpha', 'fillColor', 'fontSize', 'gridAlpha', 
		'gridColor', 'gridCount', 'gridThickness', 'guides', 'inside', 
		'labelFrequency', 'labelRotation', 'labelsEnabled', 'offset', 
		'position', 'showFirstLabel', 'showLastLabel',
	);
	
	protected $_methods = array(
		'addGuide', 'removeGuide'
	);
}
	