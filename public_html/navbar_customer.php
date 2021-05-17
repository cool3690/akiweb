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

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto" style="font-size:14px;letter-spacing:3px;">
			<form action="商品列表" method="post">
			<div class="input-group pt-3 pl-5">
				<input type="text" class="form-control" placeholder="商品名稱" name="goods">
				<button class="btn btn-secondary" type="submit">搜尋</button> 
			</div>
			</form>
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
						echo '
								<a id="navbar_goods" href="商品列表"><span class="align-middle text-secondary">商品列表</span></a>　
								<a id="navbar_goods" href="商品購物車"><span class="align-middle text-secondary">購物車</span></a>　
								<a id="navbar_goods" href="商品訂單"><span class="align-middle text-secondary">商品訂單</span></a>　
								<a id="navbar_goods" href="商品追蹤中"><span class="align-middle text-secondary">追蹤中</span></a>				
							';
					echo '　　　<span id="navbar_name">'.$_SESSION['name'].'，您好</span>';					
					echo '
						<a id="top_a" href="登出"><span id="navbar_member">登出</span></a>
					';				
				}
			?>
		</div>
	</div>
</nav>