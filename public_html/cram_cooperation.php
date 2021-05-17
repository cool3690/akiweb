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
			text-justify: inter-word;
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
	</style>
	<?php include_once ("navbar_cramy.php"); ?>
	<div class="container">
		<h4 class="text-center mt-5 mb-5">合作企業及作品</h4>	
		<div class="row">				
			<div class="col-sm-9 col-md-9 col-lg-6">
				<img src="images/banner5.jpg" width="100%;" class="animated fadeInDown">
				<ul class="nav nav-pills pills2 justify-content-center mt-3" role="tablist">
					<li class="nav-item">
					  <a class="nav-link active link2" data-toggle="pill" href="#shome">企業教育合作</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link link2" data-toggle="pill" href="#smenu1">企業商品合作</a>
					</li>
				</ul>
			  <!-- Tab panes -->
				<div class="tab-content">
					<div id="shome" class=" tab-pane active"><br>
						<p class="ml-5 mr-5" style="line-height:50px;letter-spacing:3px;">
							亞紀塾日本語提供學員乾淨舒適的學習環境，日本老師皆為已任教十年以上並受過日本語教學認証通過，為打造有效率的學習方式，除了<b>小班制的的團體班</b>之外，並設置有<b>家教專班</b>，<b>商用班</b>和<b>會話專班</b>。彈性的上課方式及專業的教學模式，獲得學員不錯的評佳。目前也有與企業進行教育合作。<br>

							如：
							<div style="padding-left:100px;">
								<img src="images/cooperation1.gif" style="width:200px;padding-bottom:30px;"><br>
								<img src="images/cooperation2.png" style="width:80px;">　(旭硝子)
							</div>
							
							<br>

							<div class="animated headShake pl-5 mt-5">歡迎有興趣的學員，來電冾詢。</div><br>
						</p>
					</div>
					<div id="smenu1" class=" tab-pane fade"><br>
						<div type="button" class="btn text-center animated fadeInUp" data-toggle="modal" data-target="#myModal">
							<img src="images/cooperation/logo_vorwerk.png" style="width:150px;">　(免費體驗卷索取)
						</div>
						


						<div class="modal" id="myModal">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">

								  <!-- Modal Header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

								  <!-- Modal body -->
									<div class="modal-body">

										<div class="text-center animated fadeInUp mt-5">
											<a href="images/cooperation/vorwerk_product.pdf" target="_blank" style="color:#019858;font-size:20px;padding-bottom:20px;">
												<span><b>HERA空氣清淨機 (實用型)簡介</b></span>
											</a><br>
											<a href="http://www.kobold-vorwerk.tw/product/hera/" target="_blank" style="color:#019858;font-size:14px;">
												<span><b>http://www.kobold-vorwerk.tw/product/hera/</b></span>
											</a>										
										</div>
						
						
										<div class="text-center animated fadeInUp mt-3" style="line-height:40px;letter-spacing:5px;">
											超強濾淨效果<br>打造最純淨的居家生活<br>
											使用獨創的HEPA-AKTIV科技<br>5個步驟淨化空氣中的懸浮微粒<br>
											在家也能享有森林浴般的清淨享受<br>
										</div>
										<iframe width="100%" height="300" src="https://www.youtube.com/embed/Lahs607I6uY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="mt-3text-center animated fadeInUp mt-5 mb-5"></iframe>
									</div>

      <!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>

								</div>
							</div>						
						</div>			
					</div>
				</div>						
			</div>	
			<div class="col-sm-9 col-md-9 col-lg-6 text-center">
				<img src="images/banner7.png" width="100%;"class="animated fadeInDown">
				<p class="mt-5 ml-5 mr-5" style="line-height:50px;letter-spacing:3px;">
				*故宮南院日文導覽手冊<br>
				*高雄觀光局 導覽手冊<br>
				*Live ABC 日文雜誌編輯<br>
				*延伸日語會話力 著作<br> (大新書局出版)<br><br>
				<img src="images/cram/cooperation/jp_book.jpg">	<br>	
				</p>							
			</div>					
		</div>					
	</div>
	<?php include_once ("footer1.php"); ?>	
</body>
</html>
