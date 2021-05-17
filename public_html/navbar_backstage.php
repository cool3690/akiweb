<nav class="navbar navbar-expand-xl navbar-dark" id="navbar">
	<a class="navbar-brand justify-content-center" href="後台管理"><img src="images/1906_01.png" width="100%"></a>
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
		<ul class="navbar-nav mr-auto mt-3 ml-5" style="font-size:14px;letter-spacing:3px;">
		
			<?php
				if(@$_SESSION['account']!=null){	
					if($_SESSION['admin']=="Y"){	
	//管理者登入		
	// 1 最高權限
	// 2 課程權限
	// 3 商品權限
						if($_SESSION['authorize']==1 || $_SESSION['authorize']==3){
							echo '	
								<li class="nav-item active dropdown" id="nav_c">
									<a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown">商品資料</a>
									<div class="dropdown-menu">
										<a class="nav-link" id="navbardrop" href="商品登錄">商品登錄</a>
										<a class="nav-link" id="navbardrop" href="商品編輯">商品編輯</a>
									</div>
								</li>
							
								<li class="nav-item dropdown text-center">
									<a class="nav-link" id="navbardrop" href="商品訂單">商品訂單</a>
								</li>
							';
						}
						if($_SESSION['authorize']==1 || $_SESSION['authorize']==2){
							echo '	
								<li class="nav-item active dropdown" id="nav_c">
									<a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown">課程資料</a>
									<div class="dropdown-menu">
									<a class="nav-link" id="navbardrop" href="課程登錄">課程登錄</a>
									<a class="nav-link" id="navbardrop" href="課程編輯">課程編輯</a>
									</div>
								</li>
								
								<li class="nav-item active dropdown" id="nav_c">
									<a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown">題庫資料</a>
									<div class="dropdown-menu">
									<a class="nav-link" id="navbardrop" href="多選題登錄">多選題登錄</a>
									<a class="nav-link" id="navbardrop" href="多選題編輯">多選題編輯</a>
									<a class="nav-link" id="navbardrop" href="重組登錄">重組登錄</a>
									<a class="nav-link" id="navbardrop" href="重組編輯">重組編輯</a>
									</div>
								</li>
							';	
						}
						if($_SESSION['authorize']==1){
							echo '	
								
								<li class="nav-item active dropdown" id="nav_c">
									<a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown">消息資料</a>
									<div class="dropdown-menu">
									<a class="nav-link" id="navbardrop" href="消息登錄">消息登錄</a>
									<a class="nav-link" id="navbardrop" href="消息編輯">消息編輯</a>
									<a class="nav-link" id="navbardrop" href="佈告欄編輯">佈告欄編輯</a>
									</div>
								</li>
							
								<li class="nav-item active dropdown" id="nav_c">
									<a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown">直播</a>
									<div class="dropdown-menu">
									<a class="nav-link" id="navbardrop" href="新增直播">新增直播</a>
									<a class="nav-link" id="navbardrop" href="直播觀看">直播觀看</a>
									</div>
								</li>	
								<li class="nav-item dropdown text-center">
									<a class="nav-link" id="navbardrop" href="會員資料">會員列表</a>
								</li>
								
								<li class="nav-item dropdown text-center">
									<a class="nav-link" id="navbardrop" href="查詢問題單" style="width:135px;">查詢問題單</a>
								</li>	
								
								<li class="nav-item dropdown text-center">
									<a class="nav-link" id="navbardrop" href="權限管理" style="width:135px;">權限管理</a>
								</li>	
							';
						}
					}
				}
				?>	

		</ul>
   </div>
</nav>
<script src="images/akkyschool.js" /></script>