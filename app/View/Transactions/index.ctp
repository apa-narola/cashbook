<div class="transactions index">
	<h2><?php echo __('Transactions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_sub_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_amount','Amount'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_date'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Recipient'); ?></th>
	
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
//	pr($transactions);
	foreach ($transactions as $transaction): ?>
	<tr>
		<td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaction['TransactionType']['title'], array('controller' => 'transaction_types', 'action' => 'view', $transaction['TransactionType']['id'])); ?>
		</td>
		<td><?php echo h($transaction['TransactionSubType']['title']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['title']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['description']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['transaction_amount']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['transaction_date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaction['TransactionRecipient']['username'], '/viewUser/'. $transaction['TransactionRecipient']['id']); ?>
		</td>
	
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), array(), __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transaction Types'), array('controller' => 'transaction_types', 'action' => 'index')); ?> </li>
	</ul>
</div>
