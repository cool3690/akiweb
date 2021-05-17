<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
		$(document).ready(function(){
			$(".close").click(function(){
				$("#myAlert").alert("close");
			});
		});


		$(document).ready(function(){
			$('input').on('change', function() {
				$('#submit_check').trigger('click');
			});	
		})	
		
		$(document).ready(function(){
			$('select').on('change', function() {
				$('#selectsubmit').trigger('click');
			});	
		})	
	</script>
	
	<style>
		body {
			background-image: url("images/child_bg.png")!important;
			background-repeat: repeat;
		}
		.link1{
			width:120px;
			letter-spacing:5px;
			margin-left:10px;
		}
		.link1.active {
			background-color: #0066CC!important;
			color:#FFD2D2 !important;
		}
		.link1:hover {
			color:#005AB5 !important;
			background-color: #FFECEC!important;
		}
		.link2{
			color:#003366;
			width:50px;
			border-radius:50% !important;
			font-size:16px;
		}
		.link2.active {
			background-color: #019858!important;
			color:#FFECEC !important;
		}
		.pills2:hover .link2:hover {
			color:#006030 !important;
			background-color: #D2E9FF!important;
		}
	</style>
	<?php include_once ("navbar_child.php"); ?>
	<div class="container mt-5" style="line-height:35px;padding-bottom:30px;">
		<h2 class="text-center">兒童聽力練習</h2>
		<div class="row justify-content-center mt-5 mb-2">
			<button class="btn mt-2 mb-2 link1" id="1" name="1" value="1">第一冊</button>
			<button class="btn mt-2 mb-2 link1" id="2" name="2" value="2">第二冊</button>
			<button class="btn mt-2 mb-2 link1" id="3" name="3" value="3">第三冊</button>
		</div>
		<div id="demo1" class="text-center mt-5 mb-5" style="font-size:24px;"></div>
		<div id="img" style="display:none;">
			<img src="images/listen.png" class="mx-auto d-block" style="width:80%;">
		<div>
		<script>
		$(document).ready(function(){
			$( "#img" ).show( "slow" );
		});
		$( "button" ).click(function() {
			var button = $(this).val();

			$.ajax({
				type: 'POST',
				url: 'child_listening_re.php',
				data: {'value': ''+button}, 
				dataType: 'text', 
				success: function(data) {
					arrList = [];
					document.getElementById('demo1').innerHTML = data
				}
			});
			$( "#img" ).hide( "slow" );
		});
						
		</script>	
</body>
</html>



