<?php if($data->getType() != 'CategoryAxis'): ?>
	<?php echo "\n\t"; ?>var <?php echo $data; ?> = new AmCharts.<?php echo $data->getType(); ?>();
<?php endif; ?>

<?php
foreach($data->getData() as $key => $value) 
{
	echo "\t".$data.'.'.$key.' = '.$value.";\n";
}

foreach($data->getMethods() as $method => $rows) 
{
	if($method == 'addCategoryAxis')
	{
		echo "\t".$rows[0][0].' = '.$data.".categoryAxis;\n";
		echo $rows[0][0]->render();
	}
	else
	{
		foreach($rows as $arguments) 
		{
			$args = array();

			foreach ($arguments as $arg)
			{
				if( $arg instanceof Chart_Module)
				{
					echo $arg->render();
				}

				$args[] = $arg;
			}

			echo "\t".$data.'.'.$method.'('.implode(',', $args).')'.";\n";
		}
	}

}
?>