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

	<div class="collapse navbar-collapse pl-3" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto mt-3" style="font-size:14px;letter-spacing:3px;">
	
			<?php		
//管理者登入										

//使用者登入												
				echo '	
					<li class="nav-item active dropdown" id="nav_c">
						<a class="nav-link dropdown-toggle text-center" href="#" id="dropdown" data-toggle="dropdown">50音</a>
						<div class="dropdown-menu">
							<a class="nav-link" id="navbardrop" href="平假名">平假名</a>
							<a class="nav-link" id="navbardrop" href="片假名">片假名</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" id="navbardrop" href="初級一練習">初級一練習</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" id="navbardrop" href="初級二練習">初級二練習</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" id="navbardrop" href="進階一練習">進階一練習</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" id="navbardrop" href="進階二練習">進階二練習</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" id="navbardrop" href="課本聽力練習" style="width:150px;">課本聽力練習</a>
					</li>
				';
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

<script src="images/akkyschool.js" /></script>
<div class="mt-3 mb-5" id="exam_banner">
	<img src="images/banner6.png"  id="exam_banner" class="rounded mx-auto d-block">
</div>
<style>

		body {
			background-image: url("images/exam_bg.png");
			background-repeat: birepeat;
    background-size:cover;
		}
@media (min-width: 0px) and (max-width: 1000px) { 
	#exam_banner{
		display: none;
	}
}
@media (min-width: 1000px) and (max-width: 1600px) { 
	#exam_banner{
		height:80px;
	}
}
@media (min-width: 1600px) and (max-width: 2000px) { 
	#exam_banner{
		height:100%;
	}
}

</style>

