jQuery(document).ready(function($) {
	$('.js-example-basic-multiple').select2();

	/* Procedures quantity */
	$('.procedQty').on('keyup mouseup change', function(){
		var price = $(this).val() * $(this).attr('input-proc-unit');
		/* Add 30 % to price */
		// var percent = price*30/100;
		// var total = price+percent;
		
		var total = price;
		$(this).closest('tr').find('.procedTotalPrice').html(total);
		$(this).closest('tr').find('.procedTotalPriceInput').val(total);
	});
	
	/* Check procedure */
	$('.procedureCheck').change(function(){
		if($(this).is(":checked")) {
			$(this).closest('tr').addClass('active').find('input,textarea').not($(this)).removeAttr('disabled');
		} else {
			$(this).closest('tr').removeClass('active').find('input,textarea').not($(this)).attr('disabled','disabled');			
		}
		
	});
	

});