<?php 
	require 'db_login.php';
    $value = $_POST["value"];  
	if ($value == 1){
echo'

				<div class="row justify-content-center mt-5">
					<ul class="nav nav-pills pills2 text-center">
						<li class="nav-item">
							<a class="nav-link active link2 ml-2 mr-2" data-toggle="tab" href="#shome">1</a>
						</li>
';					  
							for($i=2;$i<13;$i++){
								echo'
									<li class="nav-item">
										<a class="nav-link link2 ml-2 mr-2" data-toggle="tab" href="#smenu'.$i.'">'.$i.'</a>
									</li>
								';
							}
echo'							
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="shome">
							<div class="row">
';							
									$fileList = glob('images/listening/初級一/*');
									$filenum=count(glob('images/listening/初級一/*'));

									for($i=1;$i<2;$i++){
										$filedir='images/listening/初級一/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										


								
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';

											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, -7).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}					
									}
echo'									
							</div>
						</div>
';
							for($i=2;$i<13;$i++){
								echo'
								<div class="tab-pane container fade" id="smenu'.$i.'">
									<div class="row">
								'; 
										$fileList = glob('images/listening/初級一/*');
										$filenum=count(glob('images/listening/初級一/*'));
							
										$filedir='images/listening/初級一/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										
									
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';
							
											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, -7).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}	
							echo '
									</div>
								</div>
							';
						  }
				echo'		  
					</div>		
				';			
	}else if ($value == 2){
echo'
				<div class="row justify-content-center mt-5">
					<ul class="nav nav-pills pills2 text-center">
						<li class="nav-item">
							<a class="nav-link active link2 ml-2 mr-2" data-toggle="tab" href="#shome">13</a>
						</li>
					  
';
							for($i=14;$i<26;$i++){
								echo'
									<li class="nav-item text-center">
										<a class="nav-link link2 ml-2 mr-2" data-toggle="tab" href="#smenu'.$i.'">'.$i.'</a>
									</li>
								';
							}
echo'
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="shome">
							<div class="row">
';
									$fileList = glob('images/listening/初級二/*');
									$filenum=count(glob('images/listening/初級二/*'));

									for($i=13;$i<14;$i++){
										$filedir='images/listening/初級二/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										


								
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';

											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 36,20).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}					
									}
echo'
							</div>
						</div>
';
							for($i=14;$i<26;$i++){
								echo'
								<div class="tab-pane container fade" id="smenu'.$i.'">
									<div class="row">
								'; 
										$fileList = glob('images/listening/初級二/*');
										$filenum=count(glob('images/listening/初級二/*'));
							
										$filedir='images/listening/初級二/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										
									
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';
							
											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 36,20).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}	
							echo '
									</div>
								</div>
							';
						  }
echo'
					</div>	
				</div>	
';
	}else if ($value == 3){
echo'

				<div class="row justify-content-center mt-5">
					<ul class="nav nav-pills pills2 text-center">
						<li class="nav-item">
							<a class="nav-link active link2 ml-2 mr-2" data-toggle="tab" href="#shome">26</a>
						</li>
					  
';
							for($i=27;$i<39;$i++){
								echo'
									<li class="nav-item">
										<a class="nav-link link2 ml-2 mr-2" data-toggle="tab" href="#smenu'.$i.'">'.$i.'</a>
									</li>
								';
							}
echo'
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="shome">
							<div class="row">
';
									$fileList = glob('images/listening/進階一/*');
									$filenum=count(glob('images/listening/進階一/*'));

									for($i=26;$i<27;$i++){
										$filedir='images/listening/進階一/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										


								
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';

											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 36,20).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}					
									}
echo'
							</div>
						</div>
';
							for($i=27;$i<39;$i++){
								echo'
								<div class="tab-pane container fade" id="smenu'.$i.'">
									<div class="row">
								'; 
										$fileList = glob('images/listening/進階一/*');
										$filenum=count(glob('images/listening/進階一/*'));
							
										$filedir='images/listening/進階一/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										
									
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';
							
											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 36,20).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}	
							echo '
									</div>
								</div>
							';
						  }
echo'
					</div>	
				</div>
';
	}else{
echo'
				<div class="row justify-content-center mt-5">
					<ul class="nav nav-pills pills2 text-center">
						<li class="nav-item">
							<a class="nav-link active link2 ml-2 mr-2" data-toggle="tab" href="#shome">39</a>
						</li>
					  
';
							for($i=40;$i<51;$i++){
								echo'
									<li class="nav-item">
										<a class="nav-link link2 ml-2 mr-2" data-toggle="tab" href="#smenu'.$i.'">'.$i.'</a>
									</li>
								';
							}
echo'
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="shome">
							<div class="row">
';
									$fileList = glob('images/listening/進階二/*');
									$filenum=count(glob('images/listening/進階二/*'));

									for($i=39;$i<40;$i++){
										$filedir='images/listening/進階二/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										


								
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';

											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 36,20).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}					
									}
echo'
							</div>
						</div>
';
							for($i=40;$i<51;$i++){
								echo'
								<div class="tab-pane container fade" id="smenu'.$i.'">
									<div class="row">
								'; 
										$fileList = glob('images/listening/進階二/*');
										$filenum=count(glob('images/listening/進階二/*'));
							
										$filedir='images/listening/進階二/第'.$i.'課/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:16px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第'.$i.'課
											</div>
										';
										
									
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';
							
											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4 pl-3" style="padding-top:8px;font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 36,20).'
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
										}	
							echo '
									</div>
								</div>
							';
						  }
echo'
					</div>	
				</div>	
';
	}
	?>
