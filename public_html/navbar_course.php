<nav class="navbar navbar-expand-xl navbar-dark" id="navbar">
	<a class="navbar-brand justify-content-center" href="首頁"><img src="images/1906_01.png" width="100%"></a>
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

	<div class="collapse navbar-collapse mt-3 ml-5" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto" style="font-size:14px;letter-spacing:3px;">
	
			<?php
				if(@$_SESSION['account']!=null){	
//使用者登入											
						echo '	
			
						<li class="nav-item active dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="課程列表">課程列表</a>
						</li>
						
			
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="課程購物車" style="width:150px;">課程購物車</a>
						</li>
						
						<li class="nav-item dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="課程訂單查詢" style="width:150px;">課程訂單查詢</a>
						</li>
						';	
				}else{	
//未登入				
					echo '
						<li class="nav-item active dropdown" id="nav_c">
							<a class="nav-link" id="navbardrop" href="課程列表">課程列表</a>
						</li>
						
					';		
				}
				?>	
		</ul>
		<div class='text-right' id="logiin1">
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
	</div>
</nav>
<img src="images/banner2.jpg" width="100%">