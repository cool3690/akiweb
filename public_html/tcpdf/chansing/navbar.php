<nav class="navbar navbar-expand-xl navbar-dark">
	<div class="container mt-1">
	<a class="navbar-brand justify-content-center text-dark" href="index.php"><img src="image/logos5.png" width="110%"></a>
		<div>
			<div class="short-div text-right">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				   <span class="navbar-toggler-icon"></span>
			   </button>
			</div>
		</div>
		<div class="collapse navbar-collapse flex-column align-items-end navbar1" id="navbarCollapse">			
			<!-- navbar1 -->
			<div class="navbar-nav mb-lg-0" style="font-size:14px;letter-spacing:3px;" id="language_b">
				<?php
					session_start();

					if(@$_SESSION['name']==null){						
						echo '
							<a class="nav-link" id="navbardrop" href="member_registered.php">註冊帳號</a>
							<a class="nav-link" id="navbardrop" href="login.php">登入會員</a>
							
						';
					}else{						
						echo '<div class="nav-link" id="navbardrop" >'.$_SESSION['name'].'，您好</div>
							<a class="nav-link" id="navbardrop" href="logout.php">登出</a>
						';	
					}
				?>				
			</div>
		<div class="collapse navbar-collapse flex-column align-items-end navbar1" id="navbarCollapse">
			<ul class="navbar-nav mt-3" style="border-bottom:2px solid #f9b608;letter-spacing:5px;">
				<li class="nav-item active dropdown" id="nav_c">
					<a class="nav-link dropdown-toggle text-dark" href="#" data-toggle="dropdown">CLSM</a>
					<div class="dropdown-menu">
						<a class="nav-link" id="navbardrop" href="clsm.php">CLSM報價單</a>
						<a class="nav-link" id="navbardrop" href="clsm_select.php">查詢報價單</a>
					</div>
				</li>
				
				<li class="nav-item active dropdown" id="nav_c">
					<a class="nav-link dropdown-toggle text-dark" href="#" data-toggle="dropdown">混凝土</a>
					<div class="dropdown-menu">
						<a class="nav-link" id="navbardrop" href="premixed.php">混凝土報價單</a>
						<a class="nav-link" id="navbardrop" href="premixed_select.php">查詢報價單</a>
					</div>
				</li>
				
				<li class="nav-item active dropdown" id="nav_c">
					<a class="nav-link dropdown-toggle text-dark" href="#" data-toggle="dropdown">合約</a>
					<div class="dropdown-menu">
						<a class="nav-link" id="navbardrop" href="contract.php">合約報價單</a>
						<a class="nav-link" id="navbardrop" href="contract_select.php">查詢報價單</a>
					</div>
				</li>
				
			</ul>
		</div>
	</div>
</nav>	