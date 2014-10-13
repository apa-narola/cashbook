<div class="transactionTypes form">
	<?php echo $this->Form->create('TransactionType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transaction Type'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id', array('type' => 'select', 'options' => $activeParentTransactionTypesList));
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('status');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TransactionType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TransactionType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transaction Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transaction Types'), array('controller' => 'transaction_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Transaction Type'), array('controller' => 'transaction_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
