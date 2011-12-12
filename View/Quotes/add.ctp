<div class="quotes form">
<?php echo $this->Form->create('Quote');?>
	<fieldset>
		<legend><?php echo __('Add Quote'); ?></legend>
	<?php
		echo $this->Form->input('bash_id', array('type' => 'number'));
		echo $this->Form->input('quote');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Quotes'), array('action' => 'index'));?></li>
	</ul>
</div>
