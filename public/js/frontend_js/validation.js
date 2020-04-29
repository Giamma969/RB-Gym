$(document).ready(function(){
    
	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/check-user-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
			if(resp=="false"){
					$("#chkPwd").removeClass("fa fa-check-circle").addClass("fa fa-times-circle");
				}else if(resp=="true"){
					$("#chkPwd").removeClass("fa fa-times-circle").addClass("fa fa-check-circle");
				}
			}, error:function(){
				alert("error");
			}
		});
    });

    //min 6 chars
    $("#new_pwd").keyup(function(){
		var new_pwd = $("#new_pwd").val();
        if(new_pwd.length < 6 ){
            $("#nPwd").removeClass("fa fa-check-circle").addClass("fa fa-times-circle");
        }else{
            $("#nPwd").removeClass("fa fa-times-circle").addClass("fa fa-check-circle");
        }	
    });

    $("#confirm_pwd").keyup(function(){
        var confirm_pwd = $("#confirm_pwd").val();
        var new_pwd = $("#new_pwd").val();
        if(confirm_pwd===new_pwd){
            $("#confirmPwd").removeClass("fa fa-times-circle").addClass("fa fa-check-circle");
        }else{
            $("#confirmPwd").removeClass("fa fa-check-circle").addClass("fa fa-times-circle");
        }
    });

   
});