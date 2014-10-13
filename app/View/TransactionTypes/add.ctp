<div class="transactionTypes form">
<?php echo $this->Form->create('TransactionType',array("novalidate")); ?>
	<fieldset>
		<legend><?php echo __('Add Transaction Type'); ?></legend>
	<?php
		echo $this->Form->input('parent_id',array('type'=>'select','options'=>$activeParentTransactionTypesList));
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
		<li><?php echo $this->Html->link(__('List Transaction Types'), array('controller' => 'transaction_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
	</ul>
</div>
