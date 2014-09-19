<?php defined('SYSPATH') or die('No direct script access.');

/**
 * AmChart library. Helper class to make chart creation easier.
 *
 * @package    AmChart
 * @category   model
 * @author     ButscH
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class Chart {
	
	public static $init = FALSE;
	
	public static function get_meta()
	{
		$js = "";
		
		if(Chart::$init === TRUE)
		{
			$javascripts = Kohana::$config->load('chart')->javascripts;
			foreach ($javascripts as $script) {
				$js .= "\t".Html::script($script)."\n";
			}
		}

		return $js;
	}


	protected $_config = array();

	public static function factory($name, $config = NULL)
	{
		$class = 'Chart_Model_'.$name;
		return new $class($config);
	}
	
	public $title = '';
	
	protected $_chart = '';
	protected $_data = array();
	protected $_object_data = array();


	protected $_id;
	protected $_tempalte_folder;
	protected $_template;
	
	public function __construct($config = NULL) 
	{
		if(Chart::$init === FALSE)
		{
			Chart::$init = TRUE;
		}
		
		$config_file = Kohana::$config->load('chart')->as_array();
		$this->_config = Arr::merge($this->_config, $config_file);
		
		if(is_array($config))
		{
			$this->_config = Arr::merge($this->_config, $config);
		}
		
		$id = Text::random('alpha');
		$this->_id = $id;
		
		unset($config_file);
	}
	
	public function data_count()
	{
		return count($this->_data);
	}
	
	protected function _build_data() {}
	protected function _build_chart() {}
	
	public function render()
	{
		if(Kohana::$profiling)
		{
			$benchmark = Profiler::start("Chart", 'Build data');
		}
		
		$class = get_called_class();
		$hash = md5(serialize($this->_object_data));
		
		$this->_data = Cache::instance()->get('chart_'.$class.$hash);
		
		if($this->_data === NULL OR (Kohana::$caching === FALSE  OR $this->_config['cache'] === FALSE))
		{
			$this->_build_data();
		}
		
		if(Kohana::$caching === TRUE AND $this->_config['cache'] === TRUE)
		{
			Cache::instance()->set('chart_'.$class.$hash, $this->_data, $this->_config['cache_lifetime']);
		}
		
		if (isset($benchmark))
		{
			Profiler::stop($benchmark);
		}
		
		if(Kohana::$profiling)
		{
			$benchmark = Profiler::start("Chart", 'Build chart');
		}
		
		$this->_build_chart();
		
		if (isset($benchmark))
		{
			Profiler::stop($benchmark);
		}
		
		$this->_tempalte_folder = $this->_config['template_folder'];
		
		$class_name = strtolower(substr(get_class($this), 12));
		$this->_template = str_replace('_', '/', $class_name);
		
		$view = View::factory($this->_tempalte_folder.'/global');
		$view->config = $this->_config;
		$view->title = $this->title;
		$view->id = $this->_id;
		$view->content = $this->_chart;

		unset($class_name);
		
		return $view->render();
	}
	
	public function __get($name)
	{
		if(isset($this->_object_data[$name]))
		{
			return $this->_object_data[$name];
		}
		
		throw new Exception('Property not found');
	}
	
	public function __set($name, $value)
	{
		$this->_object_data[$name] = $value;
		return $this;
	}
	
	public function set($name, $value)
	{
		return $this->__set($name, $value);
	}
	
	public function __toString()
	{
		//return $this->render();
		try
		{
			return $this->render();
		}
		catch (Exception $e)
		{
			/**
			 * Display the exception message.
			 *
			 * We use this method here because it's impossible to throw an
			 * exception from __toString().
			 */
			$error_response = Kohana_Exception::_handler($e);

			return $error_response->body();
		}
	}
}
