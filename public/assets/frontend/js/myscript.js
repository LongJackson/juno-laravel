$(document).ready(function(){

	function loadproduct(that)
	{
		$('input[name="prod_id"]').val(that.data('product').prod_id);
		$('.code span').html(that.data('product').prod_code);
		let price = new Intl.NumberFormat('vi', { maximumSignificantDigits: 3 }).format(that.data('product').prod_price)
		$('.price span').html(price);
		
		$.ajax({
			url: 'http://localhost:8000/slide',
			data: { id: that.data('product').prod_id }
		}).done(function(data){
			$('.demo').html(data);
		});
	}

	$('.list__radio.color input').click(function(){
		loadproduct($(this))
	});
	 $('.list__radio').find('input:first').prop('checked', true);
	loadproduct($('.list__radio.color').find('input:checked'));
	

});