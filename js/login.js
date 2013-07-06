$(document).ready(function(){
	var ROOT = '50.62.102.1';
	var WEB = document.location.host;
	$('input#UserLogin').click(function(){
		var username = $('input#username').val();
		var password = $('input#password').val();
		var ip = $('input#ip').val();
		$.post(ROOT,{AJAX:'UserLogin',username:username,password:password,ip:ip},function(data){
			if(data == ''){
				$('input#username').attr('class','alert');
				$('input#password').attr('class','alert');
				$('span#Alert').css('display','block');
			}else{
				window.location.href = 'http://'+WEB+'/dashboard/';
			}
		});
	});
});