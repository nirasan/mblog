<div class="words form">
<?php echo $this->Form->create('Word'); ?>
	<fieldset>
		<legend><?php echo __('Add Word'); ?></legend>
	<?php
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
