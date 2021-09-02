<nav class="navbar navbar-expand-xl navbar-dark" id="navbar">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded=	"false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class='text-right' id="logiin2">
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

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto" style="font-size:14px;letter-spacing:3px;" id="navbar_carmn">
	
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
								<a class="nav-link" id="navbardrop" href="會員資料">會員資料</a>
							</li>	
						';	
				}else{	
//未登入				
					echo '
						<li class="nav-item active dropdown">
							<a class="nav-link" id="navbardrop" href="教師團隊">教師團隊</a>
						</li>
						
						<li class="nav-item dropdown">
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
						
					';	
				}
				?>	

		</ul>
<!--		<div class='text-right' id="logiin1">
			<?php
				if(@$_SESSION['account']==null){						
					echo '
						<a id="top_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
						   
						<a id="top_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
						   
					';	
					echo $_SESSION['name'].'，您好';					
					echo '
						<a id="top_a" href="登出"><span id="navbar_member">登出</span></a>
					';	
				}
			?>
		</div>-->
	</div>
</nav>