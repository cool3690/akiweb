<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<?php include_once ("navbar_null.php"); ?>
	<div class='container mb-5' style="padding-top:168px;padding-bottom:8%;padding-left:15%;padding-right:15%;">
		<img src="images/logo.png"><span class="ml-4"style="font-size:26px;font-weight:bold;">忘記密碼</span>
		<div class="form-group mt-5">
			<input type="text" class="form-control" placeholder="請輸入手機0912345678" id="account" name="account" pattern='\d{10}' title="請輸入手機0912345678" id="login_input" required>
		</div>

		<div class="form-group mt-4">
			<input type="email" class="form-control"placeholder="E-mail" id="email" name="email" id="login_input" required>
		</div>   
		
		<button type="submit" class="btn text-white mb-4" id="button" style="background-color:#ff9797;">重新申請密碼</button>
	</div>	
	<script>
		$('#button').click(function() {
			var account=$('#account').val();
						// alert(account);
			var email=$('#email').val();
						// alert(email);
			$.ajax({
				type: 'POST',
				url: 'member_forget_connect.php',
				data: { 
					"account": account,
					"email": email
				}, 
				beforeSend:function(){   
					$('#button').text('正在送出中...請稍後');
					$('#button').attr('disabled',true);
				}, 
				success:function(data){
					alert(data);
					$('#button').text('重新申請密碼');
					$('#button').removeAttr('disabled');
				} 
			});	
		});	
	</script>
	<?php include_once ("footer0.php"); ?>	
</body>
</html>