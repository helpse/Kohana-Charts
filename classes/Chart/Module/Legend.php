<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_Legend extends Chart_Module {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/amlegend
	 * 
	 */
	
	protected $_properties = array(
		'align', 'backgroundAlpha', 'backgroundColor', 'borderAlpha', 
		'borderColor', 'color', 'fontSize', 'horizontalGap', 'labelText', 
		'marginBottom', 'marginLeft', 'marginRight', 'marginTop', 
		'markerBorderColor', 'markerBorderThickness', 'markerDisabledColor', 
		'markerLabelGap', 'markerSize', 'markerType', 'maxColumns', 
		'negativeValueColor', 'positiveValueColor', 'position', 
		'reversedOrder', 'rollOverColor', 'rollOverGraphAlpha', 'spacing', 
		'switchable', 'switchColor', 'switchType', 'textClickEnabled', 
		'useMarkerColorForLabels', 'valueAlign', 'valueText', 'valueWidth', 
		'verticalGap',
	);
}
	