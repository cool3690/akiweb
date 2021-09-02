<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>

	<?php include_once ("navbar_exam.php"); ?>
	<style>
		.mcq_button {
			border-radius: 40px;
			border: none;
			color: #004b97;
			text-align: center;
			font-size: 28px;
			padding: 20px;
			width: 240px;
			transition: all 0.5s;
			margin: 5px;
			background: -webkit-linear-gradient(270deg,#ffe66f,#ffd9ec);
			background: -o-linear-gradient(270deg,#ffe66f,#ffd9ec);
			background: -moz-linear-gradient(270deg,#ffe66f,#ffd9ec);
			background: linear-gradient(270deg,#ffe66f,#ffd9ec);
		}

		.mcq_button span {
			cursor: pointer;
			display: inline-block;
			position: relative;
			transition: 0.5s;
		}

		.mcq_button span:after {
			content: '\00bb';
			position: absolute;
			opacity: 0;
			top: 0;
			right: -20px;
			transition: 0.5s;
		}

		.mcq_button:hover span {
			padding-right: 15px;
		}

		.mcq_button:hover span:after {
			opacity: 1;
			right: 0;
		}

		.mcq_button:hover {
			background: -webkit-linear-gradient(90deg,#ffe66f,#ffd9ec);
			background: -o-linear-gradient(90deg,#ffe66f,#ffd9ec);
			background: -moz-linear-gradient(90deg,#ffe66f,#ffd9ec);
			background: linear-gradient(90deg,#ffe66f,#ffd9ec);
			box-shadow: 0 5px #ffe6ff;
		}
	</style>

	<div class="container">
		<h2 class="text-center mt-5 mb-5">單選題</h2>
		<div class="row mt-5">
			<?php
				require 'db_login.php';
				$quiz_sql = mysqli_query($db, "SELECT MAX(mych) FROM QandA");
				while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
					$max=$quiz_row[0]+1;
				}
				for($i=1;$i<$max;$i++){
					echo ' <form action="初級練習" method="POST">
							<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-3">
								<input type="hidden" name="mych" value="'.$i.'">
								<button type="submit" class="mcq_button"><i class="fas fa-book"></i><span>　第 '.$i.' 課</span></button>
							</div>
						  </form>';
				}
			?> 
		</div>
		
		<h2 class="text-center" style="padding-top:100px;">重組句子</h2>
		<div class="row mt-5">
			<?php
				require 'db_login.php';
				$quiz_sql = mysqli_query($db, "SELECT MAX(mych) FROM bun");
				while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
					$max=$quiz_row[0]+1;
				}
				for($i=1;$i<$max;$i++){
					echo ' <form action="句子重組" method="POST">
							<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-3">
								<input type="hidden" name="mych" value="'.$i.'">
								<button type="submit" class="mcq_button"><i class="fas fa-book"></i><span>　第 '.$i.' 課</span></button>
							</div>
						  </form>';
				}
			?> 
		</div>		
		
	</div>
</body>
</html>