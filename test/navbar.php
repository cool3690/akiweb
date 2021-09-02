<nav class="navbar navbar-expand-xl mb-3">
	<a class="navbar-brand" href="#"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded=	"false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto" style="font-size:14px;letter-spacing:3px;">
	
			<?php
				if(@$_SESSION['account']!=null){	
					if(@$_SESSION['admin']=='N'){							
						echo '	
							<li class="nav-item active dropdown" id="nav_c">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">線上選課</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="course_select.php"><span class="align-middle">課程資料</span></a>
									<a class="dropdown-item" href="course_cart.php"><span class="align-middle">已選課程資料</span></a>
									<a class="dropdown-item" href="course_order.php"><span class="align-middle">課程訂單查詢</span></a>
								</div>
							</li>	
							
							<li class="nav-item active dropdown" id="nav_c">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">精緻小品</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="goods_select.php"><span class="align-middle">商品列表</span></a>
									<a class="dropdown-item" href="goods_cart.php"><span class="align-middle">購物車</span></a>
									<a class="dropdown-item" href="goods_order.php"><span class="align-middle">商品訂單查詢</span></a>
								</div>
							</li>	
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="member_select.php">查詢會員資料</a>
							</li>
			
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="activity_photo.php">學員活動剪影</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="study_abroad.php">代辦留學</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="cooperation.php">合作企業</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="contact.php">聯絡我們</a>
							</li>
						';		
					}else{								
						echo '	
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="goods.php">商品登錄</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="course.php">課程登錄</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="goods_select.php">精緻小品</a>
							</li>
								
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="course_select.php">課程資料</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="member_aselect.php">查詢會員資料</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="order.php">訂單查詢</a>
							</li>
							
							<li class="nav-item dropdown" id="nav_c">
								<a class="nav-link" id="navbardrop" href="contact_select.php">查詢問題單</a>
							</li>	
						';
					}
				}else{						
					echo '
						<li class="nav-item active dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="environment.php">環境介紹</a>
						</li>
						
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="course_select.php">課程資料</a>
						</li>
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="goods_select.php">精緻小品</a>
						</li>
			
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="activity_photo.php">學員活動剪影</a>
						</li>
						
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="study_abroad.php">代辦留學</a>
						</li>
						
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="cooperation.php">合作企業</a>
						</li>
						
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="contact.php">聯絡我們</a>
						</li>
					';		
				}
				?>	

		</ul>
		<div class='text-right'>
			<?php

				if(@$_SESSION['account']==null){						
					echo '
						<a id="top_a" href="member_registered.php"><span id="navbar_member">註冊帳號 |</span></a>
						   
						<a id="top_a" href="login.php"><span id="navbar_member">登入會員</span></a>
						   
					';
				}
				if(@$_SESSION['account']!=null){	
					echo $_SESSION['name'].'，您好';					
					echo '
						<a id="top_a" href="logout.php"><span id="navbar_member">登出</span></a>
					';	
				}
			?>
		</div>
	</div>
</nav>