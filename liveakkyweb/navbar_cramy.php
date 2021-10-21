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
						echo '	
							<li class="nav-item active dropdown">
								<a class="nav-link" id="navbardrop" href="live_select.php">上課時數</a>
							</li>
						';	
				}
				?>	

		</ul>
   </div>
</nav>
<script src="images/akkyschool.js" /></script>