$(document).ready(function(){

	$('#category').change(function(){
		if($('#category').val()=='0'){
		} else {
		$.post('home/menu_mobile', { 
			data: $('#category').val()},
				function(result){
					$('#menu').html(result);
				}
		);
		}
	});
				
	$('input#submit-menu').click(function(){
		if($('#queue').val()=='0')
		{
			alert('กรุณาเลือกป้ายคิว');
		}
		if($('#menu').val()=='0')
		{
			alert('เลือกเมนู');
		}
		if($('#queue').val()!=='0'&&$('#menu').val()!=='0')
		{
			queue=$('#queue').val();
			mid=$('#menu').val();
			number=$('#number').val();
			note=$('#note').val();
			
			$.ajax({ 
				url:"home/save_menu" ,
				type:"POST",
				dataType:"json",
				data:'queue='+queue+'&mid='+mid+'&number='+number+'&note='+note,
				success:$('#queue').val('')+$('#category').val('')+$('#note').val(''),
			});
		}
	});
	
});

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
