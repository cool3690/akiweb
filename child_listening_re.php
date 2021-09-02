<?php 
	require 'db_login.php';
    $value = $_POST["value"];  
	if ($value == 1){
echo'

				<div class="row justify-content-center mt-5">
					<ul class="nav nav-pills pills2 text-center">
						<li class="nav-item">
							<a class="nav-link active link2 ml-2 mr-2" data-toggle="tab" href="#shome" style="width:100px;">1 - 10</a>
						</li>
';					  
							for($i=11;$i<62;$i+=10){
								$max=$i+9;
								echo'
									<li class="nav-item">
										<a class="nav-link link2 ml-2 mr-2" data-toggle="tab" href="#smenu'.$i.'" style="width:100px;">'.$i.' - '.$max.'</a>
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
									$fileList = glob('images/listening/child_1/*');
									$filenum=count(glob('images/listening/child_1/*'));
									// echo $filenum;

										$filedir='images/listening/child_1/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:20px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第一冊
											</div>
										';
										


								
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';
											if($key<10){
											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5 text-center" style="padding-top:8px;">
													<div class="pt-3" style="font-size:16px;">
														<i class="fas fa-headphones"></i>　'.substr($datetime, 25,30).'								
													</div>
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
							for($i=11;$i<70;$i=$i+10){
								$max=$i+9;
								$min=$i-2;
								echo'
								<div class="tab-pane container fade" id="smenu'.$i.'">
									<div class="row">
								'; 
										$fileList = glob('images/listening/child_1/*');
										$filenum=count(glob('images/listening/child_1/*'));
									

										$filedir='images/listening/child_1/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:20px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第一冊
											</div>
										';
										
										if($i!=61){
											foreach($fileList2 as $key => $datetime){
												// echo $key .'=>'. $datetime.'<br>';
								
												if($key>$min && $key<$max){
												echo '
													<div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5 text-center" style="padding-top:8px;">
														<div class="pt-3" style="font-size:16px;">
															<i class="fas fa-headphones"></i>　'.substr($datetime, 25,30).'								
														</div>
														<div class="pt-3">
															<audio controls="controls" controlsList="nodownload">
																<source src="'.$datetime.'" type="audio/wav">
															</audio>
														</div>										
													</div>
												';
												}
											}
										}else{
											// echo $key .'=>'. $datetime.'<br>';
								
											if($key>$min && $key<$max){
											echo '
												<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-5 text-center" style="padding-top:8px;">
													<div class="pt-3" style="font-size:16px;">
														<i class="fas fa-headphones"></i>　'.substr($datetime, 25,30).'								
													</div>
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
											}
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
							<a class="nav-link active link2 ml-2 mr-2" data-toggle="tab" href="#s2home" style="width:100px;">1 - 10</a>
						</li>
';					  
							for($i=11;$i<62;$i+=10){
								$max=$i+9;
								echo'
									<li class="nav-item">
										<a class="nav-link link2 ml-2 mr-2" data-toggle="tab" href="#s2menu'.$i.'" style="width:100px;">'.$i.' - '.$max.'</a>
									</li>
								';
							}
echo'							
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="s2home">
							<div class="row">
';
								$fileList = glob('images/listening/child_2/*');
								$filenum=count(glob('images/listening/child_2/*'));
								// echo $filenum;

								$filedir='images/listening/child_2/*';
								// echo $filedir.'<br>';
								$fileList2 = glob("$filedir");
								
								echo '
									<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:20px;border-bottom:#ffcccc solid 4px;">
										<i class="fas fa-book-reader" style="color:#D9006C"></i>　第二冊
									</div>
								';
								


								
								foreach($fileList2 as $key => $datetime){
									// echo $key .'=>'. $datetime.'<br>';
									if($key<10){
									echo '
										<div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5 text-center" style="padding-top:8px;">
											<div class="pt-3" style="font-size:16px;">
												<i class="fas fa-headphones"></i>　'.substr($datetime, 25,30).'								
											</div>
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
						for($i=11;$i<70;$i=$i+10){
							$max=$i+9;
							$min=$i-2;
							echo'
							<div class="tab-pane container fade" id="s2menu'.$i.'">
								<div class="row">
							'; 
									$fileList = glob('images/listening/child_2/*');
									$filenum=count(glob('images/listening/child_2/*'));
								

									$filedir='images/listening/child_2/*';
									// echo $filedir.'<br>';
									$fileList2 = glob("$filedir");
									
									echo '
										<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:20px;border-bottom:#ffcccc solid 4px;">
											<i class="fas fa-book-reader" style="color:#D9006C"></i>　第二冊
										</div>
									';
									
								
									foreach($fileList2 as $key => $datetime){
										// echo $key .'=>'. $datetime.'<br>';
						
										if($key>$min && $key<$max){
										echo '
											<div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5 text-center" style="padding-top:8px;">
												<div class="pt-3" style="font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 25,30).'								
												</div>
												<div class="pt-3">
													<audio controls="controls" controlsList="nodownload">
														<source src="'.$datetime.'" type="audio/wav">
													</audio>
												</div>										
											</div>
										';
										}
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
							<a class="nav-link active link2 ml-2 mr-2" data-toggle="tab" href="#s3home" style="width:100px;">1 - 10</a>
						</li>
';					  
							for($i=11;$i<62;$i+=10){
								$max=$i+9;
								echo'
									<li class="nav-item">
										<a class="nav-link link2 ml-2 mr-2" data-toggle="tab" href="#s3menu'.$i.'" style="width:100px;">'.$i.' - '.$max.'</a>
									</li>
								';
							}
echo'							
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="s3home">
							<div class="row">
';
									$fileList = glob('images/listening/child_3/*');
									$filenum=count(glob('images/listening/child_3/*'));
									// echo $filenum;

									$filedir='images/listening/child_3/*';
									// echo $filedir.'<br>';
									$fileList2 = glob("$filedir");
									
									echo '
										<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:20px;border-bottom:#ffcccc solid 4px;">
											<i class="fas fa-book-reader" style="color:#D9006C"></i>　第三冊
										</div>
									';
									


								
									foreach($fileList2 as $key => $datetime){
										// echo $key .'=>'. $datetime.'<br>';
										if($key<10){
										echo '
											<div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5 text-center" style="padding-top:8px;">
												<div class="pt-3" style="font-size:16px;">
													<i class="fas fa-headphones"></i>　'.substr($datetime, 25,30).'								
												</div>
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
							for($i=11;$i<73;$i=$i+10){
								$max=$i+9;
								$min=$i-2;
								echo'
								<div class="tab-pane container fade" id="s3menu'.$i.'">
									<div class="row">
								'; 
										$fileList = glob('images/listening/child_3/*');
										$filenum=count(glob('images/listening/child_3/*'));
									

										$filedir='images/listening/child_3/*';
										// echo $filedir.'<br>';
										$fileList2 = glob("$filedir");
										
										echo '
											<div class="col-sm-12 col-md-12 col-lg-12 mt-3 pt-5 pb-2 mb-3" style="font-size:20px;border-bottom:#ffcccc solid 4px;">
												<i class="fas fa-book-reader" style="color:#D9006C"></i>　第三冊
											</div>
										';
										
									
										foreach($fileList2 as $key => $datetime){
											// echo $key .'=>'. $datetime.'<br>';
							
											if($key>$min && $key<$max){
											echo '
												<div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5 text-center" style="padding-top:8px;">
													<div class="pt-3" style="font-size:16px;">
														<i class="fas fa-headphones"></i>　'.substr($datetime, 25,30).'								
													</div>
													<div class="pt-3">
														<audio controls="controls" controlsList="nodownload">
															<source src="'.$datetime.'" type="audio/wav">
														</audio>
													</div>										
												</div>
											';
											}
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
