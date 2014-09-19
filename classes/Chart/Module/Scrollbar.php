<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_ScrollBar extends Chart_Module {
	
	/*
	 * @see http://amcharts.com/docs/v.2/bundle/javascript_reference/chartscrollbar
	 * 
	 */
	
	protected $_properties = array(
		'autoGridCount', 'backgroundAlpha', 'backgroundColor', 'categoryAxis',
		'color', 'graph', 'graphType', 'graphFillAlpha', 'graphFillColor',
		'graphLineAlpha', 'graphLineColor', 'gridAlpha', 'gridColor', 'gridCount',
		'hideResizeGrips', 'resizeEnabled', 'scrollbarHeight', 'scrollDuration',
		'selectedBackgroundAlpha', 'selectedBackgroundColor', 
		'selectedGraphFillAlpha', 'selectedGraphFillColor', 'selectedGraphLineAlpha',
		'selectedGraphLineColor', 'updateOnReleaseOnly'
	);
	
	protected $_type = 'ChartScrollbar';
}
	