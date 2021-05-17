<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<style>
		body {
			background-image: url("images/00.jpg");
			background-repeat: repeat;
			text-align: justify;
		}
		.link1{
			color:#003366;
		}
		.link1.active {
			background-color: #009999!important;
			color:#ffffff;
		}
		.pills1:hover .link1:hover {
			color:#000000;
		}
		
		.link2{
			color:#003366;
		}
		.link2.active {
			background-color: #0072E3!important;
			color:#004B97;
		}
		.pills2:hover .link2:hover {
			color:#000000;
		}
		.study_abroad_item{
			font-weight:bold;font-size:22px;border-left:5px solid #DC6D4E;padding-left:30px;margin-bottom:20px;
		}
		@media (min-width: 0px) and (max-width: 1000px) { 
			.FJLS{
				background-image: url("images/study_abroad/bg/study_abroad_bg01.png");
				background-repeat: repeat;
				text-align: justify;
			}
			.KMJLS_winter{
				background-image: url("images/study_abroad/bg/study_abroad_bg01.png");
				background-repeat: repeat;
				text-align: justify;
			}
			.KMJLS_summer{
				background-image: url("images/study_abroad/bg/study_abroad_bg01.png");
				background-repeat: repeat;
				text-align: justify;
			}
			.h-mahoroba{
				background-image: url("images/study_abroad/bg/study_abroad_bg01.png");
				background-repeat: repeat;
				text-align: justify;
			}
			.a-j-academy{
				background-image: url("images/study_abroad/bg/study_abroad_bg01.png");
				background-repeat: repeat;
				text-align: justify;
				padding-bottom:200px;
			}
			
			#KMJLS_summer_context,#KMJLS_winnter_context{
				margin-top:50px;
				margin-left:10px;
				margin-right:10px;
			}
		}
		@media (min-width: 1000px) and (max-width: 2000px) { 
			.FJLS{
				background-image: url("images/study_abroad/bg/study_abroad_bg01.png");
				background-repeat: repeat;
				text-align: justify;
				line-height:40px;
				letter-spacing:3px;
			}
			.KMJLS_winter{
				background-image: url("images/study_abroad/bg/study_abroad_bg02.png");
				background-repeat: repeat;
				text-align: justify;
				padding-bottom:150px;
			}
			.KMJLS_summer{
				background-image: url("images/study_abroad/bg/study_abroad_bg03.jpg");
				background-repeat: repeat;
				text-align: justify;
				text-justify: inter-word;
			}
			.h-mahoroba{
				background-image: url("images/study_abroad/bg/study_abroad_bg01.png");
				background-repeat: repeat;
				text-align: justify;
			}
			.a-j-academy{
				background-image: url("images/study_abroad/bg/study_abroad_bg04.png");
				background-repeat: repeat;
				text-align: justify;
				padding-bottom:280px;
			}

			#KMJLS_summer_context{
				margin-top:100px;
				margin-left:130px;
				margin-right:130px;
			}
			#KMJLS_winnter_context{
				margin-left:130px;
				margin-right:130px;
			}
		}
	</style>
	<?php include_once ("navbar_cramy.php"); ?>
	<div class="container" style="letter-spacing:3px;line-height:30px;">
	<ul class="nav nav-pills mt-5 red justify-content-center pills1">
		<li class="nav-item">
			<a class="nav-link active link1" data-toggle="pill" href="#home"><i class="fas fa-school fa-lg"></i> 富士山國際學院</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link1" data-toggle="pill" href="#menu1"><i class="fas fa-school"></i> 京都民際日本語學校</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link1" data-toggle="pill" href="#menu2"><i class="fas fa-school"></i> アジア日本語學校</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link1" data-toggle="pill" href="#menu3"><i class="fas fa-school"></i> 打工度假及工作情報</a>
		</li>
	</ul>

	  <!-- Tab panes -->
	 <div class="tab-content">
		<div id="home" class="container tab-pane active"><br>
			<?php include_once ("cram_study_abroad_FJLS.php"); ?>	
		</div> 
		<div id="menu1" class="container tab-pane fade"><br>
			  <ul class="nav nav-pills pills2 justify-content-center" role="tablist">
				<li class="nav-item">
				  <a class="nav-link active link2" data-toggle="pill" href="#shome">冬季短期遊學</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link link2" data-toggle="pill" href="#smenu1">春季短期遊學</a>
				</li>
				<!--     <li class="nav-item">
					  <a class="nav-link" data-toggle="pill" href="#smenu2">Menu 2</a>
					</li>-->
			  </ul>
			  <!-- Tab panes -->
			  <div class="tab-content">
				<div id="shome" class=" tab-pane active"><br>
						<?php include_once ("cram_study_abroad_KMJLS_winter.php"); ?>
				</div>
				<div id="smenu1" class=" tab-pane fade"><br>
						<?php include_once ("cram_study_abroad_KMJLS_summer.php"); ?>
				</div>
			<!--     <div id="menu2" class="container tab-pane fade"><br>
				  <h3>Menu 2</h3>
				  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>-->
			  </div>		
			  
		</div>	
		<div id="menu2" class="container tab-pane fade"><br>
			<?php include_once ("cram_study_abroad_a-j-academy.php"); ?>
		</div>		
		<div id="menu3" class="container tab-pane fade"><br>
			<?php include_once ("cram_study_abroad_h-mahoroba.php"); ?>
		</div>					
	</div>				
	</div>
	<?php include_once ("footer1.php"); ?>	
</body>
</html>