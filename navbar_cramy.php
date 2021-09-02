<nav class="navbar navbar-expand-xl navbar-dark" id="navbar">
	<a class="navbar-brand justify-content-center" href="首頁"><img src="images/1906_01.png" width="100%"></a>
    <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
    </button>
	<div class='text-right text-dark' id="logiin2">
		<?php
			if(@$_SESSION['account']==null){						
				echo '
					<a id="top_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
					   
					<a id="top_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
					   
				';
			}
			if(@$_SESSION['account']!=null){	
				echo $_SESSION['name'].'，您好';					
				echo '
					<a id="top_a" href="登出"><span id="navbar_member">登出</span></a>
				';	
			}
		?>
	</div>
    <div class="collapse navbar-collapse flex-column align-items-start ml-lg-2 ml-0" id="navbarCollapse">
		<span class="navbar-text ml-auto py-0 px-lg-2">
			<div class='text-right text-dark pt-1' id="logiin1">
				<?php
					if(@$_SESSION['account']==null){						
						echo '
							<a id="top_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
							   
							<a id="top_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
							   
						';
					}
					if(@$_SESSION['account']!=null){	
						echo $_SESSION['name'].'，您好';					
						echo '
							<a id="top_a" href="登出"><span id="navbar_member">登出</span></a>
						';	
					}
				?>
			</div>			
		</span>
		<ul class="navbar-nav mr-auto mt-3" style="font-size:14px;letter-spacing:3px;">
	
			<?php
				if(@$_SESSION['account']!=null){	
//使用者登入											
						echo '	
							<li class="nav-item active dropdown">
								<a class="nav-link" id="navbardrop" href="教師團隊">教師團隊</a>
							</li>
						
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="環境介紹">環境介紹</a>
							</li>
			
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="學員活動">學員活動</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="代辦留學">代辦留學</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="合作企業及作品" style="width:170px;">合作企業及作品</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="初級一練習" target="_blank">線上測驗</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="藝文特區">藝文特區</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="會員資料">會員資料</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link" id="navbardrop" href="聯絡我們">聯絡我們</a>
							</li>							
							
						';	
					// }else if($_SESSION['admin']=="Y"){		
//管理者登入										
					// }
				}else{	
//未登入				
					echo '
						<li class="nav-item active dropdown">
							<a class="nav-link" id="navbardrop" href="教師團隊">教師團隊</a>
						</li>
						
						<li class="nav-item active dropdown">
							<a class="nav-link" id="navbardrop" href="環境介紹">環境介紹</a>
						</li>
						
						<li class="nav-item active dropdown">
							<a class="nav-link" id="navbardrop" href="大事記要">大事記要</a>
						</li>
			
						<li class="nav-item dropdown">
							<a class="nav-link" id="navbardrop" href="學員活動">學員活動</a>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link" id="navbardrop" href="代辦留學">代辦留學</a>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link" id="navbardrop" href="合作企業及作品" style="width:170px;">合作企業及作品</a>
						</li>
							
						<li class="nav-item dropdown">
							<a class="nav-link" id="navbardrop" href="初級一練習" target="_blank">線上測驗</a>
						</li>
							
						<li class="nav-item dropdown">
							<a class="nav-link" id="navbardrop" href="藝文特區">藝文特區</a>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link" id="navbardrop" href="聯絡我們">聯絡我們</a>
						</li>
					';		
						
				}
				?>	

		</ul>
   </div>
</nav>
<script src="images/akkyschool.js" /></script>