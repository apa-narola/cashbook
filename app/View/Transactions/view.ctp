<div class="transactions view">
<h2><?php echo __('Transaction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['TransactionType']['title'], array('controller' => 'transaction_types', 'action' => 'view', $transaction['TransactionType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Sub Type Id'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['transaction_sub_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Date'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['transaction_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['TransactionRecipient']['username'], array('controller' => 'users', 'action' => 'view', $transaction['TransactionRecipient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Created By'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['TransactionCreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $transaction['TransactionCreatedBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created On'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['created_on']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Updated By'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['TransactionUpdatedBy']['username'], array('controller' => 'users', 'action' => 'view', $transaction['TransactionUpdatedBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated On'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['updated_on']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction'), array('action' => 'edit', $transaction['Transaction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction'), array('action' => 'delete', $transaction['Transaction']['id']), array(), __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Types'), array('controller' => 'transaction_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Type'), array('controller' => 'transaction_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Created By'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
