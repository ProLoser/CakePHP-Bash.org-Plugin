<div class="quotes view">
<h2><?php  echo __('Quote');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bash Id'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['bash_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quote'); ?></dt>
		<dd>
			<?php echo $quote['Quote']['quote']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['rank']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quote'), array('action' => 'edit', $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quote'), array('action' => 'delete', $quote['Quote']['id']), null, __('Are you sure you want to delete # %s?', $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('action' => 'add')); ?> </li>
	</ul>
</div>