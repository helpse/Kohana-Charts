<?php defined('SYSPATH') or die('No direct script access.');
/**
 * AmChart library. Helper class to make chart creation easier.
 *
 * @package    AmChart
 * @category   type
 * @author     ButscH
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class Chart_Module_Type_Rectangular extends Chart_Module_Type_Coordinate {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/amrectangularchart
	 * 
	 */
	
	protected $_local_properties_rect = array(
		'chartCursor', 'chartScrollbar', 'zoomOutButton', 'zoomOutText', 
		'angle', 'depth3D', 'marginBottom', 'marginLeft', 'marginRight', 
		'marginTop',
	);
		
	public function __construct($name = NULL, $type) 
	{
		$this->_properties = Arr::merge($this->_properties, $this->_local_properties_rect);
		parent::__construct($name, $type);
	}
}