<div class="transactionTypes index">
	<h2><?php echo __('Transaction Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort('description'); ?></th>
				<th><?php echo $this->Paginator->sort('status'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($transactionTypes as $transactionType): ?>
				<tr>
					<td><?php echo h($transactionType['TransactionType']['id']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($transactionType['ParentTransactionType']['title'], array('controller' => 'transaction_types', 'action' => 'view', $transactionType['ParentTransactionType']['id'])); ?>
					</td>
					<td><?php echo h($transactionType['TransactionType']['title']); ?>&nbsp;</td>
					<td><?php echo h($transactionType['TransactionType']['description']); ?>&nbsp;</td>
					<td><?php
						$status = $transactionType['TransactionType']['status'] == 1 ? __('Active') : __('Inactive');
						echo h($status);
						?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $transactionType['TransactionType']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transactionType['TransactionType']['id'])); ?>
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transactionType['TransactionType']['id']), array(), __('Are you sure you want to delete # %s?', $transactionType['TransactionType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transaction Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
	</ul>
</div>
