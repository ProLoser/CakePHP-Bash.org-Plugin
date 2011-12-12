<div class="quotes form">
<?php echo $this->Form->create('Quote');?>
	<fieldset>
		<legend><?php echo __('Edit Quote'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Quote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Quote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
