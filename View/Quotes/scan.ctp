<div class="quotes index">
	<h2><?php echo __('Quotes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Id</th>
			<th>Quote</th>
			<th>Rank</th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($quotes as $quote): ?>
	<tr>
		<td><?php echo h($quote['bash_id']); ?>&nbsp;</td>
		<td><?php echo $quote['quote']; ?>&nbsp;</td>
		<td><?php echo h($quote['rank']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quote['bash_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quote['bash_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quote['bash_id']), null, __('Are you sure you want to delete # %s?', $quote['bash_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Scan 1 Quote'), array($page, $page + 1)); ?></li>
		<li><?php echo $this->Html->link(__('Scan 5 Quotes'), array($page, $page + 5)); ?></li>
		<li><?php echo $this->Html->link(__('Scan 10 Quotes'), array($page, $page + 10)); ?></li>
	</ul>
</div>
