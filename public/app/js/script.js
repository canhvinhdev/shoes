$(document).ready( function() {
    $('#myCarousel').carousel({
		interval:   4000
	});

	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});


	$('.update').click(function(){
		var rowid = $(this).attr('id');
		var qty =  $(this).parent().parent().find('#qty').val();

		var token = $("input[name='_token']").val();
	
			$.ajax({
								url: 'cap-nhat-san-pham/' + rowid + '/' + qty,
								type: 'GET',
								cache : false,
								data: {"_token": token, "id": rowid, "qty":qty},
								success: function(data){
									if(data == "oke"){
										alert('ok');
									}
								}
			});

	});





});