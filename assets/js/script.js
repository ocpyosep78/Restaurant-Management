$(document).ready(function(){

	$('#category').change(function(){
		if($('#category').val()=='0'){
		} else {
		$.post('home/menu', { 
			data: $('#category').val()},
				function(result){
					$('#menu-panel').html(result);
				}
		);
		}
	});
					
	$('.discount').change(function(){
        calculator();

	});	
	
	$('input.cash').keyup(function(){
        calculator();
	});
	
	$('button#save').click(function(){
		if($('select#queue').val()=='0')
		{
			alert('กรุณาเลือกป้ายคิว');
		} else {
			var postData={
				queue:$('select#queue').val(),
				mid:[],
				number:[],
				note:[],
			}
			var mid = [];
			$('input[name="order-mid[]"]').each(function() {
			   postData.mid.push($(this).val());
			});
			var number = [];
			$('input[name="order-number[]"]').each(function() {
			   postData.number.push($(this).val());
			});
			var note = [];
			$('input[name="order-note[]"]').each(function() {
			   postData.note.push($(this).val());
			});		
				
			$.ajax({ 
					url:"home/save_menu" ,
					type:"POST",
					dataType:"json",
					data:'data='+JSON.stringify(postData),
					success:$('tr.order-list').remove()+$('select#queue').val('0')+$('span.total').text('')+$('select.discount').val('0')+$('span.totaldiscount').text('')+$('span.cashback').text('')+$('input.cash').val(''),
				});
		}
	});	

	$('button#paid').click(function(){
		if($('select#queue').val()=='0')
		{
			alert('กรุณาเลือกป้ายคิว');
		} else {
			var postData={
				queue:$('select#queue').val(),
				total:$('span.total').text(),
				discount:$('select.discount').val(),
				totaldiscount:$('span.totaldiscount').text(),
				cash:$('input.cash').val(),
				cashback:$('span.cashback').text(),
				mid:[],
				number:[],
				price:[],
			}
			var mid = [];
			$('input[name="order-mid[]"]').each(function() {
			   postData.mid.push($(this).val());
			});
			var number = [];
			$('input[name="order-number[]"]').each(function() {
			   postData.number.push($(this).val());
			});
			var price = [];
			$('input[name="order-price[]"]').each(function() {
			   postData.price.push($(this).val());
			});		
				
			$.ajax({ 
					url:"home/paid_home" ,
					type:"POST",
					dataType:"json",
					data:'data='+JSON.stringify(postData),
					success:$('tr.order-list').remove()+$('select#queue').val('0')+$('span.total').text('')+$('select.discount').val('0')+$('span.totaldiscount').text('')+$('span.cashback').text('')+$('input.cash').val(''),

				});
		}
	});			

});


$(document).on('click','button#add-menu',function(){
	var $tr = $(this).closest('tr');
	var menu = $tr.find('#menu-name').val();
	var mid = $tr.find('#mid').val();
	var number = $tr.find('#number').val();
	var price = $tr.find('#price').val();
	var note = $tr.find('#note').val();
	$('<tr align="center" class="order-list"><td>'+menu+'<input name="order-mid[]" id="order-mid" type="hidden" value="'+mid+'" /><input name="order-menu-name[]" id="order-menu-name" type="hidden" value="'+menu+'" /></td><td class="order-number">'+number+'<input name="order-number[]" id="order-number" type="hidden" value="'+number+'" /></td><td class="order-price">'+price+'<input name="order-price[]" id="order-price" type="hidden" value="'+price+'" /><input name="order-note[]" id="order-note" type="hidden" value="'+note+'" /></td><td><button id="order-delete" class="btn btn-danger glyphicon glyphicon-trash">ลบ</button></td></tr>').appendTo('#order-panel').data('total', (parseFloat(number) * parseFloat(price)) || 0);
	calculator()
});

$(document).on('click','button#order-delete',function(){
	$(this).parents("tr").remove();
	calculator();
});	

function calculator()
{
	var total = 0;
    $('#order-panel').find('tr.order-list').each(function () {
           total += ($(this).data('total') || 0)
    });

	$('.total').text(total);
		
	if($('.discount').val().length !== 0 )
	{
		var discount=$('.discount').val();
		$('.totaldiscount').text(total-(parseFloat(total)*parseFloat(discount)/100));
	} else {
		$('.totaldiscount').text(total);
	}
	
	if($('input.cash').val()!==null)
	{
		$('.cash').each(function(){
			var cash = $('input.cash').val();
			var totaldiscount = $('span.totaldiscount').text();
			$('span.cashback').text(cash-totaldiscount);
		});
	}	
}

$(document).on('change','#bill-discount',function(){
	bill();
});	

$(document).on('keyup','#bill-cash',function(){
	bill();
});	

function bill()
{
	var total = $('#total').val();
	if($('#bill-discount').val().length !== 0 )
	{
		var discount=$('#bill-discount').val();
		$('span#bill-totaldiscount').text(total-(parseFloat(total)*parseFloat(discount)/100));
		$('input#bill-totaldiscount').val(total-(parseFloat(total)*parseFloat(discount)/100));
	} else {
		$('span#bill-totaldiscount').text(total);
		$('input#bill-totaldiscount').val(total);
	}
	if($('#bill-cash').val()!==null)
	{
		var cash = $('input#bill-cash').val();
		var totaldiscount = $('#bill-totaldiscount').text();
		$('span#bill-cashback').text(cash-totaldiscount);
		$('input#bill-cashback').val(cash-totaldiscount);
	}
}

$(function() {
    $( "#startdate" ).datepicker({dateFormat : 'yy-mm-dd'}); ;
});


$(function() {
	$( "#enddate" ).datepicker({dateFormat : 'yy-mm-dd'}); ;
});