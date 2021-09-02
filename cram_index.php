<!DOCTYPE html>
<html>
<head>
	<?php include_once ("head.php"); ?>	
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v4.0"></script>	
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row pt-3" style="height:100px;background-color:#fff3e3">
			<div class="col-sm-12 col-md-2 col-lg-3">
				<a href="首頁">
				<picture>
					<source srcset="images/logo01.webp" class="rounded float-right" type="image/webp">
					<img class="rounded float-right" src="images/logo01.gif" alt="亞紀塾">
				</picture>	
				</a>
				
			</div>
			<div class="col-sm-12 col-md-12 col-lg-7" id="top_text">		
				<span>私たちは学生一人ひとりを大事にし、学生に秘められた能力を最大限に引き出せるようお手伝いをする日本語塾です。</span>
			</div>
			<div class="col-sm-12 col-md-1 col-lg-2 mt-4" style="padding-right:20px;">		
				<div class='text-right' id="logiin1">
					<?php
						if(@$_SESSION['account']==null){						
							echo '
								<a id="top_a" href="聯絡我們"><span id="navbar_member">聯絡我們 </span></a><br>
								<a id="top_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
								<a id="top_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
								   
							';
						}
						if(@$_SESSION['account']!=null){	
						
							if($_SESSION['admin']=="Y"){						
								echo '
									<a id="top_a" href="後台管理" target="_blank"><span class="mr-3 badge badge-dark" id="navbar_admin">後台</span></a>
								';	
							}					
							echo '<span style="font-size:18px;font-weight:bold;letter-spacing: 3px;">'.$_SESSION['name'].'，您好</span>';					
							echo '
								<a id="top_a" href="登出"><span id="navbar_member" style="font-weight:bold;letter-spacing: 3px;">登出</span></a>
							';	
						}
					?>
				</div>
			</div>
		</div>
	</div>	


	
	<div class="container" id="marquee_height">	
		<div class="row" style="">
			<div class="col-sm-9 col-md-12 col-lg-12">
				<div>
					<picture>
						<source id="marquee1" class="text-center animated fadeInUp mx-auto d-block" srcset="images/topbg01.webp" type="image/webp">
						<img id="marquee1" class="text-center animated fadeInUp mx-auto d-block" src="images/topbg01.jpg" alt="亞紀塾">
					</picture>	
				<img id="marquee2" src="images/newsarea_s.png">
					<div id="marquee3">
						<marquee height="60px"  scrollamount="1" scrolldelay="15"  direction="up" onmouseover="this.stop()" onmouseout="this.start()"><a target="_blank">		
							<?php
								require 'db_login.php';
								$handbill_sql = mysqli_query($db, "SELECT * FROM news_handbill");	
								while ($handbill_row = mysqli_fetch_array($handbill_sql)) {
									echo '
											'.nl2br($handbill_row['content']).'
										';
								}			
							?>
						</marquee>
					</div>
				</div>
				<div id="marquee4">
					<a href="兒童聽力練習" target="_blank"><img src="images/child.png"></a>
				</div>
			</div>
		</div>			
	</div>	
		<div class="layer2 rellax" data-rellax-speed="-4">
			<picture>
				<source srcset="images/1906_03_2.webp" id="layer2_1" type="image/webp">
				<img src="images/1906_03_2.png" id="layer2_1" alt="亞紀塾">
			</picture>	
		</div>

	<div class="container" style="padding-top:40px;padding-bottom:20px;">	
	<?php include_once ("navbar_cramn.php"); ?>	
		<div class="row" style="margin-top:60px;margin-bottom:40px;">
			<div class="col-sm-9 col-md-9 col-lg-8">
					<?php
						//index_left_news 
						require 'db_login.php';

						$news_select = mysqli_query($db, "SELECT max(news_id) FROM news");
						$j = 6;
						while ($row = mysqli_fetch_array($news_select)) {				
							$k=	$row[0];		
							$news_select2 = mysqli_query($db, "SELECT * FROM news where news_id=$k");
							$j = 6;
							while ($row2 = mysqli_fetch_array($news_select2)) {	
								$date = $row2['date'];		
								$title = $row2['title'];	
								$text = $row2['text'];	
								echo '
									<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">	
										<div class="col-sm-12 col-md-12 col-lg-12">';
											$ndate=date("m");
											if ($ndate>1 && $ndate<5){ //春
												echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons1.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
											}else if ($ndate>4 && $ndate<8){ //夏
												echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons2.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
											}else if ($ndate>7 && $ndate<11){ //秋
												echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons3.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
											}else{ //冬
												echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons4.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
											}
											echo '
											<p class="mb-3 pl-5" style="font-size:16px;line-height:30px;letter-spacing:3px;"><b>'.$title.'</b></p>
											<p class="pl-5 ml-3" style="font-size:14px;line-height:40px;letter-spacing:3px;">'.nl2br(mb_substr($text, 0, 129, "utf-8")).'......</p>
											<p class="pl-5 ml-3" id="myBtn1" style="font-size:14px;color:#26D07C;" data-toggle="modal" data-target="#myModal'.$j.'">more >></p>
										</div>	
										<div class="modal fade" id="myModal'.$j.'">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">';
														echo '<div class="row" style="margin-top:1%">';
																$file3_webp = 'images/news/'.$k.'-1.webp'; // 'images/'.$file (physical path);
																$file3 = 'images/news/'.$k.'-1.jpg'; // 'images/'.$file (physical path);
																if (file_exists($file3)) {
																	echo '
																		<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2 text-center">
																			<a data-fancybox="gallery" href="'.$file3.'">
																					<img src="'.$file3.'"  class="mx-auto d-block" style="width:100%;" alt="亞紀塾">
																			</a>
																		 </div>
																	 ';
																}else{
																	$file3 = 'images/news/'.$k.'-1.png'; // 'images/'.$file (physical path);
																	echo '
																		<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2 text-center">
																			<a data-fancybox="gallery" href="'.$file3.'">
																					<img src="'.$file3.'"  class="mx-auto d-block" style="width:100%;" alt="亞紀塾">		
																			</a>
																		 </div>
																	 ';
																}
														echo '</div>									
														<button type="button" class="close" data-dismiss="modal">×</button>
													</div>
													<div class="modal-body">';	
														$ndate=date("m");
														if ($ndate>1 && $ndate<5){ //春
															echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons1.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
														}else if ($ndate>4 && $ndate<8){ //夏
															echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons2.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
														}else if ($ndate>7 && $ndate<11){ //秋
															echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons3.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
														}else{ //冬
															echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons4.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
														}
														
														echo '
														<p class="mb-3 pl-5" style="font-size:16px;line-height:30px;letter-spacing:3px;"><b>'.$title.'</b></p>
														<p class="pl-5 ml-3" style="font-size:14px;line-height:40px;letter-spacing:3px;">	
															'.nl2br($text).'
														</p>											
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>										
												</div>
											</div>
										</div>
									</div>';							
								echo '
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">';
										$file_webp = 'images/news/'.$k.'-1.webp'; // 'images/'.$file (physical path);
										$file = 'images/news/'.$k.'-1.png'; // 'images/'.$file (physical path);
										if (file_exists($file)) {	
											echo '
												<a data-fancybox="gallery" href="'.$file.'">
														<img src="'.$file.'" class="mx-auto d-block" id="new_img0" style="width:60%;left:65px;top:25px;" alt="亞紀塾">
												</a>';	
										} else {
											$file2 = 'images/news/'.$k.'-1.jpg'; // 'images/'.$file (physical path);
											if (file_exists($file2)) {
												echo '
													<a data-fancybox="gallery" href="'.$file2.'">
															<img src="'.$file2.'" class="mx-auto d-block" id="new_img0" style="width:60%;left:65px;top:25px;" alt="亞紀塾">
													</a>';	
											} 
										}							
								echo '</div>';
							}
						}
					?>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-4" id="cram_right">
					<p class="animated headShake">APP 下載區<span class="badge badge-pill badge-danger ml-3">New</span></p>
					<a href="https://play.google.com/store/apps/details?id=com.nihon.aki2" target="_blank"><img src="images/logo3.png" width="80px" class="mb-3"/></a>
				
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-4 mb-1">最新消息</div>
					<?php				
						require 'db_login.php';
						//index_right_news 文字
						$news_select = mysqli_query($db, "SELECT * FROM news order by news_id desc LIMIT 1, 4");
						$i = mysqli_num_rows($news_select);	
						$news_select2 = mysqli_query($db, "SELECT * FROM news order by news_id desc");
						$k = mysqli_num_rows($news_select2)-1;				
						$j = 2;
						while ($row = mysqli_fetch_array($news_select)) {
							$date = $row['date'];		
							$title = $row['title'];	
							$text = $row['text'];							
							echo '
								<div class="list-group"  data-toggle="modal" data-target="#myModal'.$j.'">
									<div class="row news_div'.$j.'" id="myBtn'.$j.'">
										<div class="col-12 col-sm-12 col-md-8 col-lg-9 mt-1 mb-1" style="font-size:15px;">
										';
										$ndate=date("m");
										if ($ndate>1 && $ndate<5){ //春
											echo '<span class="align-middle" id="index_new_p"><img src="images/seasons/seasons1.png" class="mb-1"/>　'.$title.'</span>';
										}else if ($ndate>4 && $ndate<8){ //夏
											echo '<span class="align-middle" id="index_new_p"><img src="images/seasons/seasons2.png" class="mb-1"/>　'.$title.'</span>';
										}else if ($ndate>7 && $ndate<11){ //秋
											echo '<span class="align-middle" id="index_new_p"><img src="images/seasons/seasons3.png" class="mb-1"/>　'.$title.'</span>';
										}else{ //冬
											echo '<span class="align-middle" id="index_new_p"><img src="images/seasons/seasons4.png" style="color:#FFECF5;" class="mb-1"/>　'.$title.'</span>';
										}
											
									echo'
										</div>
										<div class="col-12 col-sm-12 col-md-4 col-lg-3 mt-1 mb-1 text-right">
											<span class="align-middle" id="date'.$j.'" style="font-size:12px;">'.$date.'</span>
										</div>						
									</div>	
									<div class="modal fade" id="myModal'.$j.'">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">		
												<div class="modal-header">';
													echo '<div class="row" style="margin-top:1%">';
															$file3 = 'images/news/'.$k.'-1.jpg'; // 'images/'.$file (physical path);
															if (file_exists($file3)) {
																echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2 text-center">';
																		echo '<a data-fancybox="gallery" href="'.$file3.'">
																			<img src="'.$file3.'" class="mx-auto d-block" style="width:100%;">
																		</a>
																	  </div>';
															}else{
																$file3 = 'images/news/'.$k.'-1.png'; // 'images/'.$file (physical path);
																echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2 text-center">';
																		echo '<a data-fancybox="gallery" href="'.$file3.'">
																			<img src="'.$file3.'" class="mx-auto d-block" style="width:100%;">
																		</a>
																	  </div>';
															}
													echo '</div>													
													<button type="button" class="close" data-dismiss="modal">×</button>
												</div>
												<div class="modal-body">		
													<p id="cram_date">';	
													$ndate=date("m");
													if ($ndate>1 && $ndate<5){ //春
														echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons1.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
													}else if ($ndate>4 && $ndate<8){ //夏
														echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons2.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
													}else if ($ndate>7 && $ndate<11){ //秋
														echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons3.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
													}else{ //冬
														echo '<span class="align-middle" id="cram_date"><img src="images/seasons/seasons4.png" style="color:#FFECF5;" class="mb-1"/>　'.$date.'</span>';
													}
													
													echo '
													<p class="mb-3 pl-5" style="font-size:16px;line-height:30px;letter-spacing:3px;"><b>'.$title.'</b></p>
													<p class="pl-5 ml-3" style="font-size:14px;line-height:40px;letter-spacing:3px;">
														'.nl2br($text).'
													</p>				
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>										
											</div>
										</div>
									</div>						
								</div>
							';
							$k--;
							$j++;
							if($j>5){
								break;
							}
						}

					?>		
				<div class="fb-page mt-5" data-href="https://www.facebook.com/akischool/?epa=SEARCH_BOX" data-tabs="timeline" data-width="269" data-height="215" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
					<blockquote cite="https://www.facebook.com/akischool/?epa=SEARCH_BOX" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/akischool/?epa=SEARCH_BOX">亞紀塾</a></blockquote>
				</div>
				<div class="mt-5">
				<?php
						if(@$_SESSION['account']!=null){
							echo'
								<p>作業列表</p>
								<a href="作業列表"><img src="images/homework.png" width="70%"></a>
							';
						}
					?>
				</div>
			</div>
		</div>		
	</div>	
		
	<script src='https://cdnjs.cloudflare.com/ajax/libs/rellax/1.0.0/rellax.min.js'></script>
	<script>
		var rellax = new Rellax();
	</script>
		<?php include_once ("footer1.php"); ?>	
</body>
</html>
