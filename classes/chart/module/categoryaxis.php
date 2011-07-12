<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_CategoryAxis extends Chart_Module_AxisBase {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/categoryaxis
	 * 
	 */
	
	protected $_local_properties = array(
		'dateFormats', 'equalSpacing', 'gridPosition', 'minPeriod', 
		'parseDates', 'startOnAxis',  
	);
	
	protected $_methods = array(
		'categoryToCoordinate', 'coordinateToDate', 'dateToCoordinate',
	);
	
	protected $_type = 'CategoryAxis';
}
	