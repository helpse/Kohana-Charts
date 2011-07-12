<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_ValueAxis extends Chart_Module_AxisBase {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/valueaxis
	 * 
	 */
	
	protected $_local_properties = array(
		'baseCoord', 'baseValue', 'includeGuidesInMinMax', 'includeHidden', 
		'integersOnly', 'logarithmic', 'max', 'maximum', 'min', 'minimum',
		'recalculateToPercents', 'reversed', 'synchronizationMultiplyer', 
		'stackType', 'step', 'unit', 'unitPosition', 'usePrefixes', 
		'useScientificNotation',
	);
	
	protected $_methods = array(
		'coordinateToValue', 'getCoordinate', 'synchronizeWithAxis',
	);
	
	protected $_type = 'ValueAxis';
}
	