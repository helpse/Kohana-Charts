<?php defined('SYSPATH') or die('No direct script access.');
/**
 * AmChart library. Helper class to make chart creation easier.
 *
 * @package    AmChart
 * @category   type
 * @author     ButscH
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */

class Chart_Module_Type_Coordinate extends AmChart {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/amcoordinatechart
	 * 
	 */
	
	protected $_local_properties = array(
		'colors', 'graphs', 'plotAreaBorderAlpha', 'plotAreaBorderColor', 
		'plotAreaFillAlphas', 'plotAreaFillColors', 'sequencedAnimation', 
		'startAlpha', 'startDuration', 'startEffect', 'urlTarget', 'valueAxes',
	);
	
}