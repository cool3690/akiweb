<style>
	body {
		background-image: url("images/01.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
	}
</style>
<nav class="navbar navbar-expand-xl navbar-dark" id="navbar">
	<a class="navbar-brand justify-content-center text-dark" href="首頁">LOGO</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded=	"false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
		<div class="text-right min">
		<?php
			if(@$_SESSION['account']==null){						
				echo '
					<a id="text_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
					   
					<a id="text_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
					   
				';
			}
			if(@$_SESSION['account']!=null){	
				echo $_SESSION['name'].'，您好';					
				echo '
					<a id="text_a" href="登出"><span id="navbar_member">登出</span></a>
				';	
			}
		?>
	</div>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<form action="首頁" method="post">
				<div class="input-group pt-3 pl-5">
					<input type="text" class="form-control" placeholder="商品名稱" name="goods">
					<button class="btn btn-secondary" type="submit">搜尋</button> 
				</div>
			</form>
		</ul>
		<div class="text-right mt-4">
		
			<?php
				if(@$_SESSION['account']!=null){	
					if($_SESSION['admin']=="Y"){						
						echo '
							<a id="item_a" id="navbar_goods" href="商品登錄"<span class="align-middle text-secondary">商品登錄</span></a>
							<a id="item_a" id="navbar_goods" href="商品編輯"<span class="align-middle text-secondary">商品編輯</span></a>
							<a id="item_a" id="navbar_goods" href="管理訂單"<span class="align-middle text-secondary">管理訂單</span></a>
						';	
					}else{
						echo '
							<a id="item_a" id="navbar_goods" href="商品購物車"<span class="align-middle text-secondary">購物車</span></a>
							<a id="item_a" id="navbar_goods" href="商品訂單"<span class="align-middle text-secondary">商品訂單</span></a>
							<a id="item_a" id="navbar_goods" href="追蹤中"<span class="align-middle text-secondary">追蹤中</span></a>			
						';
					}		
				}
			?>
		</div>
		<div class="text-right">
		
			<?php

				if(@$_SESSION['account']==null){						
					echo '
						<a id="text_a" href="註冊帳號"><span id="navbar_member">註冊帳號 |</span></a>
						   
						<a id="text_a" href="登入會員"><span id="navbar_member">登入會員</span></a>
						   
					';
				}
				if(@$_SESSION['account']!=null){
					echo '　　　<span id="navbar_name" class="max">'.$_SESSION['name'].'，您好</span>';					
					echo '
						<a id="text_a" href="登出"><span id="navbar_member" class="max">登出</span></a>
					';				
				}
			?>
		</div>
	</div>
</nav>