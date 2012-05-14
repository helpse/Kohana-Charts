# Kohana Charts

Модуль для построния графиков (HTML5 charts), основан на http://www.amcharts.com/

## Настройка

#### Модуль необходимо подключить в `bootstrap.php`

	...
	'chart'	=> MODPATH.'chart', // Chart class
	...


#### Конфиг файл: `config/chart.php`

	'javascripts' => array( // Пути до javascript файлов библиотеки
		'modules/chart/vendors/amcharts/raphael.js',
		'modules/chart/vendors/amcharts/amcharts.js'
	),
	'images' => '/modules/chart/vendors/amcharts/images/',
	'width' => '100%', // Ширина блока по умолчанию
	'height' => '300px', // Высота блока по умолчанию
	'template_folder' => 'chart', // Папка с шаблоном
	'class' => '', // Классы добавляемые для блока
	'cache' => TRUE,
	'cache_lifetime' => '600'


## Пример использования

Модуль основан на использовании моделей для графиков. Для каждого графика создается своя модель и вызывается в нужном месте:

	<?php echo Chart::factory('test'); ?>


	<?php echo Chart::factory('test', array(
		'width' => '100px', // Ширина блока для графика
		'height' => '300px' // Высота блока для графика
	); ?>

	
Модели храняться в папке `/classes/chart/model/`. 

	Chart::factory('test') - /classes/chart/model/test.php
	Chart::factory('news/stat') - /classes/chart/model/news/stat.php

	
### Пример модели

	class Chart_Model_Test extends Chart {
	
		protected function _build_data() 
		{
			$orm_data = ORM::factory('news')
					->select(
						array(DB::expr('COUNT(`id`)'), 'total_news'),
						array(DB::expr('DATE(`created_on`)'), 'date')
					)
					->group_by(DB::expr('DATE(`created_on`)'))
					->order_by('created_on', 'ASC')
					->find_all();
		
			$data = array();
			foreach ($orm_data as $row) 
			{
				$data[] = array('date' => $row->date, 'count' => $row->total_news);
			}
		
			$this->_data = $data;
		
			unset($data, $orm_data);
		}
	
		protected function _build_chart() 
		{
			$chart = AmChart::type('serial');
			$chart->dataProvider = $this->_data;
			$chart->categoryField = 'date';
			$chart->marginTop = 22;
			$chart->marginLeft = 120;

			$graph = new Chart_Module_Graph;
			$graph->valueField = "summ";
			$graph->type = "column";
			$graph->title = "Новостей за день";
			$graph->bullet = "round";
			$graph->balloonText = "[[value]]";
			$graph->valueField = "count";
			$graph->type = "line";
			$graph->lineThickness = 2;
			$graph->fillAlphas = 0.3;
			$chart->addGraph($graph);

			$axis = new Chart_Module_ValueAxis;
			$axis->axisAlpha = 0.5;
			$axis->dashLength = 10;
			$chart->addValueAxis($axis);
		
			$catAxis = new Chart_Module_CategoryAxis;
			$catAxis->parseDates = true;
			$chart->addCategoryAxis($catAxis);

			$cursor = new Chart_Module_Cursor;
			$chart->addChartCursor($cursor);
		
			$chart->write($this->_id);

			$this->_chart = $chart->render();
		}
	}


Названия параметров аналогичны тем, что в документации:
http://blog.amcharts.com/2011/03/amcharts-javascript-tutorials-part-1.html
http://www.amcharts.com/docs/v.2/bundle/javascript_reference
