<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>

	<?php include_once ("navbar_exam.php"); ?>
	<style>
		.btnstyle {
			margin-top:100px;
			background-color: #66CCCC;
			width:200px;
			height:200px;
			font-size:20px;
			color: #000000;
			border:0;
			border-radius: 180px;
			border-bottom: 6px solid #3e4caf;
			transition: 0.1s;
		}

		.btnstyle:hover{
			background-color: #009999;
			border-bottom-width: 0;
			margin-top: 3px;
			color: #fff;
			border-bottom: 3px solid #3e4caf;
		}

		.btnstyle:focus{
			outline: none;
		}
		.mcq_button {
			border-radius: 40px;
			border: none;
			color: #004b97;
			text-align: center;
			font-size: 24px;
			padding: 20px;
			width: 200px;
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
		<button type="button" class="btnstyle" data-toggle="modal" data-target="#myModal1" style="margin-right:500px;">
			單選題
		</button>

		<div class="modal mt-5" id="myModal1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="text-center mt-5 mb-5">單選題</h2>
						<div class="row mt-5 pr-3 pl-3">
							<?php
								require 'db_login.php';
								$quiz_sql = mysqli_query($db, "SELECT MAX(mych) FROM QandA");
								while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
									$max=$quiz_row[0]+1;
								}
								for($i=1;$i<$max;$i++){
									echo ' 
											<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-3"><form action="初級練習" method="POST">
												<input type="hidden" name="mych" value="'.$i.'">
												<button type="submit" class="mcq_button"><i class="fas fa-book"></i><span>　第 '.$i.' 課</span></button>  </form>
											</div>
										';
								}
							?> 						
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
		<button type="button" class="btnstyle" data-toggle="modal" data-target="#myModal2">
			重組句子
		</button>

		<div class="modal mt-5" id="myModal2">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="text-center mt-5 mb-5">重組句子</h2>
						<div class="row mt-5 pr-3 pl-3">
							<?php
								require 'db_login.php';
								$quiz_sql = mysqli_query($db, "SELECT MAX(mych) FROM bun");
								while ($quiz_row = mysqli_fetch_array($quiz_sql)) {
									$max=$quiz_row[0]+1;
								}
								for($i=1;$i<$max;$i++){
									echo ' 
											<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-3"><form action="初級練習" method="POST">
												<input type="hidden" name="mych" value="'.$i.'">
												<button type="submit" class="mcq_button"><i class="fas fa-book"></i><span>　第 '.$i.' 課</span></button>  </form>
											</div>
										';
								}
							?> 						
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
	</div>
</body>
</html>