<nav class="navbar navbar-expand-xl navbar-dark" id="navbar">
	<a class="navbar-brand justify-content-center text-dark" href="首頁">LOGO</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded=	"false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="text-right min">
		<?php
			if(@$_SESSION['account']==null){						
				echo '
					<a class="text_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
					   
					<a class="text_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
					   
				';
			}
			if(@$_SESSION['account']!=null){	
				echo $_SESSION['name'].'，您好';					
				echo '
					<a class="text_a" href="登出"><span id="navbar_member">登出</span></a>
				';	
			}
		?>
	</div>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto" style="font-size:14px;letter-spacing:3px;">

		</ul>
		<div class="text-right max">
			<?php

				if(@$_SESSION['account']==null){						
					echo '
						<a class="text_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
						   
						<a class="text_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
						   
					';
				}
			?>
		</div>
	</div>
</nav>