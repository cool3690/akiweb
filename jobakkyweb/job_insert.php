<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
<body>
	<style>
		body {
			background-image: url("images/00.jpg");
			background-repeat: repeat;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<?php include_once ("navbar_job.php"); ?>
	<div class="container">
		<?php
			if(isset($_POST['submit'])){
				require 'db_login.php';		
				$name=$_POST['name'];
				$requirement=$_POST['requirement'];
				$hire_type=$_POST['hire_type'];
				$price=$_POST['price'];
				$bouns=$_POST['bouns'];
				$place=$_POST['place'];
				$allowance=$_POST['allowance'];
				$insurance=$_POST['insurance'];
				$code=$_POST['code'];
					
				$sql = "INSERT INTO `findjob`(`name`, `requirement`, `hire_type`, `price`, `bouns`, `place`, `allowance`, `insurance`, `code`) VALUES ('$name', '$requirement', '$hire_type', '$price', '$bouns', '$place', '$allowance', '$insurance', '$code')";
				//echo $sql;
				if (mysqli_query($db, $sql)) {
					echo '  <div class="alert alert-primary alert-dismissible fade show mt-5" style="margin-left:280px;margin-right:280px;">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>新增成功</strong>
					  </div>';				
				}else{
					echo '<script language="javascript">';
					echo 'alert("新增失敗！請重新操作");';
				//	echo 'window.location.href = "job_insert.php";';
					echo '</script>';
				}
			}
		?>
	  <h2 class="mt-4 mb-2 text-center">募集</h2>
	  <form action="job_insert.php" method="post"> 
		<div class="form-group row">		

			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
				<div class="row">
					<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
						<label>招募職缺：</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
						<div class="form-group">
							<label for="code">職缺類別：</label>
							<select class="form-control" id="code" name="code">
								<option value="S">業務，服務人員</option>
								<option value="F">財務</option>
								<option value="M">製造</option>
								<option value="C">資訊</option>
							</select>
						</div>
					</div>
				</div>	
			</div>	
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>	
			
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
				<div class="form-group">
				  <label for="comment">工作內容：</label>
				  <textarea class="form-control" rows="5" id="comment" name="requirement"></textarea>
				</div>	
			</div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			
			
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
				<div class="form-group">
				  <label for="comment">招募條件：</label>
				  <textarea class="form-control" rows="5" id="comment" name="hire_type"></textarea>
				</div>	
			</div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>

			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
			  <label>薪資待遇：</label>
			  <input type="text" class="form-control" name="price">
			</div>	
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>				
			
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
				<div class="row">
					<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
						<label>獎金制度：</label>
						<input type="text" class="form-control" name="bouns">
					</div>
					<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
						<label>工作地點：</label>
						<input type="text" class="form-control" name="place">
					</div>	
				</div>	
			</div>	
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			
			
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
				<div class="form-group">
				  <label for="comment">各種津貼：</label>
				  <textarea class="form-control" rows="5" id="comment" name="allowance"></textarea>
				</div>	
			</div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
				<div class="form-group">
				  <label for="comment">保險福利：</label>
				  <textarea class="form-control" rows="5" id="comment" name="insurance"></textarea>
				</div>	
			</div>
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3"></div>
			
		</div>
		<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-12 text-center mt-5 mb-5">
		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</div>
	  </form>
	</div>

</body>
</html>
