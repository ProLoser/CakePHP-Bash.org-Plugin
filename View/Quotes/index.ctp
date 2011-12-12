<div class="quotes index">
	<h2>
		<?php echo __('Quotes');?>
		<?php if (isset($this->request->params['named']['search'])): ?>
			matching: "<?php echo $this->request->params['named']['search']; ?>"
		<?php endif; ?>
	</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('bash_id');?></th>
			<th><?php echo $this->Paginator->sort('quote');?></th>
			<th><?php echo $this->Paginator->sort('rank');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($quotes as $quote): ?>
	<tr>
		<td><?php echo h($quote['Quote']['id']); ?>&nbsp;</td>
		<td><?php echo h($quote['Quote']['bash_id']); ?>&nbsp;</td>
		<td><?php echo $quote['Quote']['quote']; ?>&nbsp;</td>
		<td><?php echo h($quote['Quote']['rank']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quote['Quote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quote['Quote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quote['Quote']['id']), null, __('Are you sure you want to delete # %s?', $quote['Quote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Quote'), array('action' => 'add')); ?></li>
	</ul>
	<?php echo $this->Form->create('Quote'); ?>
		<?php echo $this->Form->input('Quote.search'); ?>
		<?php echo $this->Form->submit('Go'); ?>
	<?php echo $this->Form->end(); ?>
</div>
