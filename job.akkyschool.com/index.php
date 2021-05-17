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
		<script>
		$(document).ready(function(){
			$('select').on('change', function() {
				$('#submit').trigger('click');
			});	
		})	
	</script>
	<?php include_once ("navbar_job.php"); ?>
	
	<div class="container-fliud" style="padding-left:150px;padding-right:150px;">
		<h2 class="text-center mt-5">職缺查詢</h2>
		<form method="post" action="index.php" name="form1">
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-6 mt-2 mb-2">
				<div class="form-group">
					<label for="code" style="font-weight:bold;">職缺類別：</label>
					<select class="form-control" id="code" name="code" style="width:200px;">
						<option>請選擇</option>
						<option value="">全部</option>
						<option value="S">業務，服務人員</option>
						<option value="F">財務</option>
						<option value="M">製造</option>
						<option value="C">資訊</option>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit" id="submit" style="display: none;">完成</button>
		</form>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>招募職缺</th>
					<th>工作內容</th>
					<th>招募條件</th>
					<th>薪資待遇</th>
					<th>獎金制度</th>
					<th>工作地點</th>
					<th>各種津貼</th>
					<th>保險福利</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'db_login.php';
					error_reporting(0);
					$code=$_POST['code'];
					$job_sql = mysqli_query($db, "SELECT * FROM findjob where code LIKE '%$code%'");
											
					echo '<div class="row">';
					while ($job_row = mysqli_fetch_array($job_sql)) {
						echo '<tr>
								<td>'.$job_row['name'].'</td>
								<td>'.$job_row['requirement'].'</td>
								<td>'.$job_row['hire_type'].'</td>
								<td>'.$job_row['price'].'</td>
								<td>'.$job_row['bouns'].'</td>
								<td>'.$job_row['place'].'</td>
								<td>'.$job_row['allowance'].'</td>
								<td>'.$job_row['insurance'].'</td>
							</tr>  
						';
					}
				?>
			</tbody>
		</table>
	</div>				
</body>
</html>
