<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Model_Test extends Chart {
	
	public $title = 'Test title';

	protected function _build_data() 
	{
		$orm_data = ORM::factory('inkassation')
				->select(
					array(DB::expr('SUM(summ_inkass)'), 'summ'),
					array(DB::expr('DATE(created_on)'), 'date')
				)
				->where(DB::expr('YEAR(created_on)'), '=', DB::expr('YEAR(CURDATE())'))
				->where('terminal_id', '=', $this->id)
				->group_by(DB::expr('DATE(created_on)'))
				->order_by('created_on', 'ASC')
				->find_all();
		
		$data = array();
		foreach ($orm_data as $row) 
		{
			$data[] = array('date' => $row->date, 'summ' => $row->summ);
		}
		
		$this->_data = $data;
		
		unset($orm_data);
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
		$graph->title = "Всего";
		$graph->bullet = "round";
		$graph->balloonText = "[[value]] руб.";
		$graph->valueField = "summ";
		$graph->type = "line";
		$graph->lineThickness = 2;
		$graph->fillAlphas = 0.3;
		$chart->addGraph($graph);

		$axis = new Chart_Module_ValueAxis;
		$axis->axisAlpha = 0.5;
		$axis->dashLength = 10;
		$axis->unit = " руб.";
		$chart->addValueAxis($axis);
		
		$catAxis = new Chart_Module_CategoryAxis;
		$catAxis->parseDates = true;
		$chart->addCategoryAxis($catAxis);

		$cursor = new Chart_Module_Cursor;
		$chart->addChartCursor($cursor);
		
		$scrollbar = new Chart_Module_ScrollBar;
		$scrollbar->scrollbarHeight = 30;
		$scrollbar->graphType = "line";
		$scrollbar->hideResizeGrips = false;
		$scrollbar->gridCount = 8;
		$scrollbar->color = "#E09999";
		$scrollbar->graph = $graph;
		$chart->addChartScrollbar($scrollbar);
		
		$chart->write($this->_id);
			
		$this->_chart = $chart->render();
	}
}
