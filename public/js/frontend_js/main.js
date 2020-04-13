/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});






$(document).ready(function(){
	$(".changeImage").click(function(){
		var img = $(this).attr('src');
		$(".mainImage").attr("src",img);
	});
	
});


$().ready(function(){
	$("#registerForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			surname:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			username:{
				required:true,
				minlength:6,
				remote:"/check-username"
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
			password:{
				required:true,
				minlength:6
			},
			confirm_password:{
				required:true,
				minlength:6
			}
			
		},

		messages:{
			name:{
				required:"Inserisci il tuo nome",
				minlength:"Il nome deve contenere almeno 2 caratteri",
				lettersonly:"Il nome deve contenere soltanto lettere"
			},
			surname:{
				required:"Inserisci il tuo cognome",
				minlength:"Il cognome deve contenere almeno 2 caratteri",
				lettersonly:"Il cognome deve contenere soltanto lettere"
			},
			username:{
				required:"Inserisci un username",
				minlength:"l'username deve contenere almeno 6 caratteri",
				remote:"Username non disponibile!"
			},			
			email:{
				required:"Inserisci il tuo indirizzo email",
				email:"inserisci un indirizzo email valido",
				remote:"Email già esistente!"
			},
			password:{
				required:"Inserisci una password",
				minlength:"La password deve contenere almeno 6 caratteri"
			},
			confirm_password:{
				required:"Ripeti la password",
				minlength:"La password deve contenere almeno 6 caratteri"
			}
			
		}
	});
	
	$("#accountForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			surname:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			username:{
				required:true,
				minlength:6,
				remote:"/check-username"
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
			country:{
				required:true
			},
			province:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			city:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			address:{
				required:true,
			},
			pincode:{
				required:true,
				number:true
			},
			mobile:{
				required:true,
				number:true
			}
			
		},

		messages:{
			name:{
				required:"Inserisci il tuo nome",
				minlength:"Il nome deve contenere almeno 2 caratteri",
				lettersonly:"Il nome deve contenere soltanto lettere"
			},
			surname:{
				required:"Inserisci il tuo cognome",
				minlength:"Il cognome deve contenere almeno 2 caratteri",
				lettersonly:"Il cognome deve contenere soltanto lettere"
			},
			username:{
				required:"Inserisci un username",
				minlength:"l'username deve contenere almeno 6 caratteri",
				remote:"Username non disponibile!"
			},			
			email:{
				required:"Inserisci il tuo indirizzo email",
				email:"inserisci un indirizzo email valido",
				remote:"Email già esistente!"
			},
			country:{
				required:"Inserisci la tua nazione"
			},
			province:{
				required:"Inserisci la tua provincia",
				minlength:"Questo campo deve contenere almeno 2 caratteri",
				lettersonly:"Questo campo deve contenere soltanto lettere"
			},
			city:{
				required:"Inserisci la tua città",
				minlength:"Questo campo deve contenere almeno 2 caratteri",
				lettersonly:"Questo campo deve contenere soltanto lettere"
			},			
			address:{
				required:"Inserisci il tuo indirizzo"
			},
			pincode:{
				required:"Inserisci il tuo CAP",
				number:"Questo campo deve contenere soltanto numeri"
			},
			mobile:{
				required:"Inserisci il tuo numero di telefono",
				number:"Questo campo deve contenere soltanto numeri"
			}
			
		}
	});
	
	$("#loginForm").validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			password:{
				required:true
			}
		},

		messages:{			
			email:{
				required:"Inserisci il tuo indirizzo email",
				email:"inserisci un indirizzo email valido"
			},
			password:{
				required:"Inserisci una password"
			}
		}
	});

	$("#passwordForm").validate({
		rules:{
		    current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$('#current_pwd').keyup(function(){
		var current_pwd=$(this).val();
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type:'post',
			url:'/check-user-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'> La password corrente non corretta </font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'> La password corrente è corretta </font>");
				}
			},error:function(resp){
				alert("Error");
			}
		});
	});

	//visual strong password script
	$('#myPassword').passtrength({
		minChars: 6,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/frontend_images/eye.svg"
	});

	$('#confirmPassword').passtrength({
		minChars: 6,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/frontend_images/eye.svg"
	});

	//copy billing address to account address script
	$('#copyAddress').on('click',function(){
		if(this.checked){
			$('#shipping_name').val($('#billing_name').val());
			$('#shipping_surname').val($('#billing_surname').val());
			$('#shipping_country').val($('#billing_country').val());
			$('#shipping_province').val($('#billing_province').val());
			$('#shipping_city').val($('#billing_city').val());
			$('#shipping_address').val($('#billing_address').val());
			$('#shipping_pincode').val($('#billing_pincode').val());
			$('#shipping_mobile').val($('#billing_mobile').val());
		}
		else{
			$('#shipping_name').val('');
			$('#shipping_surname').val('');
			$('#shipping_country').val('');
			$('#shipping_province').val('');
			$('#shipping_city').val('');
			$('#shipping_address').val('');
			$('#shipping_pincode').val('');
			$('#shipping_mobile').val('');
		}
	});

});


function selectPaymentMethod(){
	if($('#Credit-debit-card').is(':checked') || $('#COD').is(':checked') ){

	}else{
		alert("Please select payment method!");
		return false;
	}
}




/*********** RateYo - Plugin for rating in a product review    https://rateyo.fundoocode.ninja/  ****************/


$(document).ready(function(){
	//generate stairs for a new review
	$("#insert_rating").rateYo({
		rating: 0,
		starWidth: "25px",
		maxValue: 5,
		numStars: 5,
		precision: 0,
		fullStar: true
	});

	//set value in input field with rating value
	$("#insert_rating").click(function () {
		var $rateYo = $("#insert_rating").rateYo();
		var rating = $rateYo.rateYo("rating");
		var input = document.getElementById('review_rating');
		input.setAttribute('value',rating);
	});
	
	var avg = document.getElementById('avg').getAttribute("value");

	//rating avg shown on details page 
	$("#rating_avg").rateYo({
		rating: avg,
		starWidth: "25px",
		maxValue: 5,
		numStars: 5,
		precision: 5,
		readOnly: true
	});

	//return return for users review
	$(".rate").each( function() {
		var rating = $(this).text();//val("input").val();
		$(this).rateYo(
			{
				rating: rating,
				starWidth: "16px",
				maxValue: 5,
				numStars: 5,
				precision: 5,
				readOnly: true
			}
		);
	});
	
});


/******************************* End rateYo functions **************************/