<div class="transactions form">
	<?php echo $this->Form->create('Transaction'); ?>
	<fieldset>
		<legend><?php echo __('Add Transaction'); ?></legend>
		<?php
		echo $this->Form->input('transaction_type_id');
		echo $this->Form->input('transaction_sub_type_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('transaction_amount');
		echo $this->Form->input('transaction_date');
		echo $this->Form->input('user_id', array("options" => $transactionRecipients, 'empty' => 'Select Recipient', 'label' => array('text' => 'Recipient')));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Transactions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transaction Types'), array('controller' => 'transaction_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Type'), array('controller' => 'transaction_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Created By'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
