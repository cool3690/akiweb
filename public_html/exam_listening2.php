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
		.link1{
			color:#003366;
			width:120px;
			letter-spacing:5px;
		}
		.link1.active {
			background-color: #0066CC!important;
			color:#FFD2D2 !important;
		}
		.pills1:hover .link1:hover {
			color:#005AB5 !important;
			background-color: #FFECEC!important;
		}
		.link2{
			color:#003366;
			width:50px;
			border-radius:50% !important;
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
	<?php include_once ("navbar_exam.php"); ?>
	<div class="container mt-5" style="line-height:35px;padding-bottom:50px;">
		<h2 class="text-center">課本聽力練習</h2>
		<div class="text-center">
		<button class="btn btn-light mt-2 mb-2 link1" id="1" name="1" value="1" style="">初級一</button>
		<button class="btn btn-light mt-2 mb-2 link1" id="2" name="2" value="2" style="">初級二</button>
		<button class="btn btn-light mt-2 mb-2 link1" id="3" name="3" value="3" style="">進階一</button>
		<button class="btn btn-light mt-2 mb-2 link1" id="4" name="4" value="4" style="">進階二</button>
		<div class="text-center"><button class="btn btn-outline-info mt-5" id="5" name="5" value="5">確定</button></div>	
		<div id="demo1" class="text-center mt-5 mb-5" style="font-size:24px;"></div>

		<script>
		$( "button" ).click(function() {
			var button = $(this).val();

			$.ajax({
				type: 'POST',
				url: 'exam_listening_re2.php',
				data: {'value': ''+button}, 
				dataType: 'text', 
				success: function(data) {
					arrList = [];
					document.getElementById('demo1').innerHTML = data
				}
			});
		});
						
		</script>	
</body>
</html>



