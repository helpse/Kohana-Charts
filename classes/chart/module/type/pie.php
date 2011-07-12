<?php defined('SYSPATH') or die('No direct script access.');
/**
 * AmChart library. Helper class to make chart creation easier.
 *
 * @package    AmChart
 * @category   type
 * @author     ButscH
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class Chart_Module_Type_Pie extends AmChart {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/ampiechart
	 * 
	 */
	
	protected $_properties = array(
		// Field names
		'alphaField', 'colorField', 'descriptionField', 'pulledField', 
		'titleField', 'urlField', 'valueField', 'visibleInLegendField',
		
		// Other properties
		'angle', 'balloonText', 'chartData', 'colors', 'depth3D', 'gradient', 
		'gradientRatio', 'groupedAlpha', 'groupedColor', 'groupedDescription',
		'groupedPulled', 'groupedTitle', 'groupPercent', 'hideLabelsPercent', 
		'hoverAlpha', 'innerRadius', 'labelRadius', 'labelsEnabled', 'labelText', 
		'labelTickAlpha', 'labelTickColor', 'marginBottom', 'marginLeft', 
		'marginRight', 'marginTop', 'minRadius', 'outlineAlpha', 'outlineColor',
		'outlineThickness', 'pieAlpha', 'pieBaseColor', 'pieBrightnessStep',
		'pullOutDuration', 'pullOutEffect', 'pullOutOnlyOne', 'pullOutRadius', 
		'radius', 'sequencedAnimation', 'startAlpha', 'startAngle', 'startDuration',
		'startEffect', 'startRadius', 'urlTarget',
	);
	
	protected $_methods = array(
		'clickSlice', 'rollOverSlice', 'rollOutSlice', 'hideSlice', 'showSlice'
	);
	
}