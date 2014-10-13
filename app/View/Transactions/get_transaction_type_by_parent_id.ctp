<!-- file path View/Transactions/get_by_transaction_type.ctp -->
<select name="data[Transaction][transaction_sub_type_id]" id="TransactionTransactionSubTypeId">
		<?php foreach ($subTransactionTypes as $key => $value): ?>
		<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
</select>