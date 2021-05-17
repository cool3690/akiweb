<nav class="navbar navbar-expand-xl navbar-dark" id="navbar">
	<a class="navbar-brand justify-content-center text-dark" href="首頁">LOGO</a>
	<div class='text-right text-dark min' id="logiin2">
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
    <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
    </button>
 	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto text-right">
		</ul>
		<div class="navbar-nav text-right mt-4">
			<?php
				if(@$_SESSION['account']!=null){
					if($_SESSION['admin']=="Y"){	
						echo '
							<a id="item_a" id="navbar_goods" href="商品登錄"><span class="align-middle text-secondary">{{ $t("goods_login")}}</span></a>
							<a id="item_a" id="navbar_goods" href="商品編輯"><span class="align-middle text-secondary">{{ $t("goods_edit")}}</span></a>
							<a id="item_a" id="navbar_goods" href="管理訂單"><span class="align-middle text-secondary">{{ $t("manage_orders")}}</span></a>
						';
					}else{
						echo '<script language="javascript">';
						echo 'alert("尚未有權限，請進行登入！");';
						echo "window.location.href='登入會員'";
						echo '</script>';	
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("尚未有權限，請進行登入！");';
					echo "window.location.href='登入會員'";
					echo '</script>';	
				}
			?>
			<select class="custom-select w-auto ml-3 mr-3" v-model="locale">
				<option>日語</option>
				<option>繁中</option>
			</select>	
		
		</div>
		<div class="text-right">
			<?php

				if(@$_SESSION['account']==null){						
					echo '
						<a id="text_a" href="註冊帳號"><span id="navbar_member">{{ $t("register")}} |</span></a>
						   
						<a id="text_a" href="登入會員"><span id="navbar_member">{{ $t("login")}}</span></a>
						   
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
</nav>
<script src="images/akkyschool.js" /></script>