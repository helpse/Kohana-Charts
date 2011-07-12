<?php defined('SYSPATH') or die('No direct script access.');
/**
 * AmChart library. Helper class to make chart creation easier.
 *
 * @package    AmChart
 * @category   module
 * @author     ButscH
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */

class Chart_Module {

	protected $_properties = array();
	protected $_local_properties = array();
	protected $_methods = array();
	protected $_object_data = array();
	protected $_object_methods = array();

	protected $_name;
	protected $_template = 'amchart';
	protected $_view;
		
	protected $_type = NULL;
	
	protected $_benchmark;

	public function __construct($name = NULL) 
	{
		$class_name = strtolower(substr(get_class($this), 13));
		
		if(Kohana::$profiling)
		{
			$this->_benchmark = Profiler::start("Chart Module Init", ucwords(preg_replace('/[\W_]+/', ' ', $class_name)));
		}
		
		$this->_properties = Arr::merge($this->_properties, $this->_local_properties);
		
		if($name === NULL)
		{
			$this->_name = Text::random('alpha');
		}
		else
		{
			$this->_name = $name;
		}
		
		if($this->_template === NULL)
		{
			$this->_template = str_replace('_', '/', $class_name);
		}
		
		if($this->_type === NULL)
		{
			$this->_type = 'Am'.ucfirst($class_name);
		}
		
		$this->_view = View::factory('chart/module/'.$this->_template);
		$this->_view->data = $this;
	}
	
	public function __call($name, $arguments)
	{
		if(in_array($name, $this->_methods))
		{
			$args = array();
			foreach ($arguments as $arg)
			{
				if( $arg instanceof Chart_Module)
				{
					$args[] = $arg;
				}
				else {
					$arg = $this->quote($arg);
					$args[] = $arg;
				}
			}
			$this->_object_methods[$name][] = $args;
		}
		else
		{
			throw new Exception('Method not found');
		}
		
		return $this;
	}

	public function __set($name, $value)
	{
		if($value instanceof Chart_Module)
		{
			$this->_object_data[$name] = $value;
		}
		elseif(in_array($name, $this->_properties))
		{
			$this->_object_data[$name] = $this->quote($value);
		}
		else
		{
			throw new Kohana_Exception('Property :name not found', array(':name' => $name));
		}

		return $this;
	}
	
	public function set($name, $value)
	{
		return $this->__set($name, $value);
	}
	
	public function quote($value)
	{
		if(is_bool($value) OR is_array($value))
		{
			$value = json_encode($value);
		}
		elseif(!Valid::numeric($value))
		{
			$value = '"'.$value.'"';
		}
		
		return $value;
	}
	
	public function __get($name)
	{
		if(isset($this->_object_data[$name]))
		{
			return $this->_object_data[$name];
		}
		
		throw new Exception('Property not found');
	}
	
	public function get($name)
	{
		return $this->__get($name);
	}
	
	public function getData()
	{
		return $this->_object_data;
	}
	
	public function getMethods()
	{
		return $this->_object_methods;
	}

	public function getType()
	{
		return $this->_type;
	}
	
	public function getProperties()
	{
		return $this->_properties;
	}

	public function __toString() 
	{
		return $this->_name;
	}
	
	public function render()
	{
		$view = $this->_view->render();
				
		if (isset($this->_benchmark))
		{
			Profiler::stop($this->_benchmark);
		}
		
		return $view;
	}
}