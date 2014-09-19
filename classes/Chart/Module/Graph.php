<?php defined('SYSPATH') or die('No direct script access.');

class Chart_Module_Graph extends Chart_Module {
	
	/*
	 * @see http://www.amcharts.com/docs/v.2/bundle/javascript_reference/amgraph
	 * 
	 */
	
	protected $_properties = array(
		// Fields
		'alphaField', 'bulletField', 'bulletSizeField', 'closeField', 'colorField',
		'customBulletField', 'descriptionField', 'fillColorsField',
		'highField', 'lowField', 'openField', 'urlField', 'valueField',
		
		// Colors, bullets & appearance properties
		'balloonColor', 'bullet', 'bulletAlpha', 'bulletBorderAlpha', 'bulletBorderColor',
		'bulletBorderThickness', 'bulletColor', 'bulletOffset', 'bulletSize', 'color', 
		'cornerRadiusTop', 'cursorBulletAlpha', 'customBullet', 'dashLength',
		'fillAlphas', 'fillColors', 'fontSize', 'gradientOrientation',
		'hideBulletsCount', 'labelPosition', 'legendAlpha', 'legendColor',
		'lineAlpha', 'lineColor', 'lineThickness', 'negativeFillAlphas',
		'negativeFillColors', 'negativeLineColor',
		
		// Other properties
		'connect', 'balloonText', 'hidden', 'includeInMinMax', 'labelText',
		'legendValueText', 'markerType', 'negativeBase', 'numberFormatter',
		'pointPosition', 'showAllValueLabels', 'showBalloon', 'showBalloonAt',
		'stackable', 'type', 'title', 'valueAxis', 'visibleInLegend',
	);
	
	protected $_methods = array(
		'hideBullets', 'showBullets'
	);
}
	