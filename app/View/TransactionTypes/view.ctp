<div class="transactionTypes view">
<h2><?php echo __('Transaction Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transactionType['TransactionType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Transaction Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transactionType['ParentTransactionType']['title'], array('controller' => 'transaction_types', 'action' => 'view', $transactionType['ParentTransactionType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($transactionType['TransactionType']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($transactionType['TransactionType']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($transactionType['TransactionType']['status']== 1 ?  __('Active'): __('Inactive') ); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction Type'), array('action' => 'edit', $transactionType['TransactionType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction Type'), array('action' => 'delete', $transactionType['TransactionType']['id']), array(), __('Are you sure you want to delete # %s?', $transactionType['TransactionType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transaction Types'); ?></h3>
	<?php
	if (!empty($transactionType['ChildTransactionType'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php 
	
	foreach ($transactionType['ChildTransactionType'] as $childTransactionType): ?>
		<tr>
			<td><?php echo $childTransactionType['id']; ?></td>
			<td><?php echo $childTransactionType['parent_id']; ?></td>
			<td><?php echo $childTransactionType['title']; ?></td>
			<td><?php echo $childTransactionType['description']; ?></td>
			<td><?php echo $childTransactionType['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transaction_types', 'action' => 'view', $childTransactionType['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transaction_types', 'action' => 'edit', $childTransactionType['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transaction_types', 'action' => 'delete', $childTransactionType['id']), array(), __('Are you sure you want to delete # %s?', $childTransactionType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Transaction Type'), array('controller' => 'transaction_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
