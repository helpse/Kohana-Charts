<?php defined('SYSPATH') or die('No direct script access.');
/**
 * AmChart library. Helper class to make chart creation easier.
 *
 * @package    AmChart
 * @category   type
 * @author     ButscH
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class Chart_Module_Type_Serial extends Chart_Module_Type_Rectangular {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/amserialchart
	 * 
	 */
	
	protected $_local_properties_serial = array(
		'categoryAxis', 'categoryField', 'chartData', 'columnSpacing',
		'columnWidth', 'dataProvider', 'endDate', 'endIndex',
		'maxSelectedSeries', 'maxSelectedTime', 'rotate', 'startDate',
		'startIndex', 'zoomOutOnDataUpdate',
	);
	
	public function __construct($name = NULL, $type) 
	{
		$this->_properties = Arr::merge($this->_properties, $this->_local_properties_serial);
		parent::__construct($name, $type);
	}
	
}