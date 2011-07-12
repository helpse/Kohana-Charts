<?php defined('SYSPATH') or die('No direct script access.');

/**
 * AmChart library. Helper class to make chart creation easier.
 *
 * @package    AmChart
 * @author     ButscH
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */

class AmChart extends Chart_Module {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/amchart
	 * 
	 */
	
	protected static $_types = array(
		'pie', 'coordinate', 'rectangular', 'serial',
	);
	
	protected $_properties = array(
		'backgroundAlpha', 'backgroundColor', 'balloon', 'borderAlpha', 
		'borderColor', 'color', 'dataProvider', 'fontFamily', 'fontSize', 
		'height', 'numberFormatter', 'panEventsEnabled', 'percentFormatter', 
		'prefixesOfBigNumbers', 'prefixesOfSmallNumbers', 'usePrefixes', 'width',
		'pathToImages'
	);

	protected $_local_properties = array();
	
	protected $_object_data = array();

	protected $_methods = array(
		'addLabel', 'addLegend', 'addGraph', 'addValueAxis', 'addChartCursor',
		'addChartScrollbar', 'addCategoryAxis', 'clear', 'clearLabels', 
		'removeLegend', 'validateData', 'validateNow', 'write',
	);

	public static function type($type, $name = NULL)
	{
		if(in_array(strtolower($type), self::$_types))
		{
			$class = 'Chart_Module_Type_'.ucfirst($type);
			return new $class($name, $type);
		}
		
		throw new Kohana_Exception('Chart type :type not found', array(':type' => $type));
	}

	public function __construct($name = NULL, $type) 
	{
		$this->_type = 'Am'.ucfirst($type).'Chart';
		$this->_properties = Arr::merge($this->_properties, $this->_local_properties);
		
		$this->_object_data['pathToImages'] = '"'.Kohana::config('chart')->images.'"';
	
		parent::__construct($name);
	}
}