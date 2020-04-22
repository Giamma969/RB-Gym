$(document).ready(function(){
    //generate random product code
	$("#makeProductCode").click(function(){
		var length = 8;
		var result = '';
		var characters = '0123456789';
		var charactersLength = characters.length;
		for ( var i = 0; i < length; i++ ) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
		}
		var product_code = document.getElementById('product_code');
		product_code.setAttribute('value',result);
	});

	//generate random product code
	$("#makeCouponCode").click(function(){
		var length = 16;
		var result = '';
		var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		var charactersLength = characters.length;
		for ( var i = 0; i < length; i++ ) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
		}
		var coupon_code = document.getElementById('coupon_code');
		coupon_code.setAttribute('value',result);
	});
});