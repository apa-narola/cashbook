jQuery(document).ready(function() {

	// load sub transaction dropdown - controller : transactions, action : add/edit
	
	jQuery(document).on("change", "#TransactionTransactionTypeId", function() {
		var parentTransactionTypeId = $(this).val();
		jQuery(document).trigger("getSubTransactionTypes", [this, parentTransactionTypeId]);
	});
	// load sub transaction dropdown - controller : transactions, action : add/edit
	jQuery(document).on("getSubTransactionTypes", function(event, obj, ptt_id) {
		$('#TransactionTransactionSubTypeId').load(site_url + '/transactions/getTransactionTypeByParentId/' + ptt_id);
	});

});


