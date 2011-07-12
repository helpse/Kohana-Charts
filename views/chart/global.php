<script type="text/javascript"> 
$(document).ready(function() {
<?php echo $content; ?>
});
</script>

<div class="<?php echo $config['class']; ?>" style="width: <?php echo $config['width']; ?>">
	<?php if (!empty($title)): ?>
	<h1><?php echo __($title); ?></h1>
	<?php endif; ?>
	<div id="<?php echo $id; ?>" style="height: <?php echo $config['height']; ?>;"></div>
</div>
