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
	
	<?php include_once ("navbar_cramy.php"); ?>
			
	<div class="container" style="padding-bottom:8%">
		<div class="row mt-5">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="text-center"><i class="fas fa-square fa-rotate-45 mr-3" style="font-size:10px;"></i><span class="ml-3 mr-4" style="font-size:26px;font-weight:bold;">課程剪影</span><i class="fas fa-square fa-rotate-45 mr-3" style="font-size:10px;"></i></div>
			</div>

			<?php				
				$id = $_POST['id'];
				
				switch ($id) {
					case 1:
						$text='<p class="mt-2 text-center">2020/04/23</p>
							   <p class="mt-3 text-center">
									鯉魚旗手作活動
							   </p>';
						break;
					case 2:
						$text='<p class="mt-2 text-center">2020/04/23</p>
							   <p class="mt-3 text-center">
									紙芝居
							   </p>';
						break;
					case 3:
						$text='<p class="mt-2 text-center">2020/07/30</p>
							   <p class="mt-3 text-center">
									<a href="images/activity_photo/classroom/3/0.pdf" target="_blank">福笑</a>
							   </p>';
					case 4:
						// $text='<p class="mt-2 text-center">2019/05/12</p><p class="mt-3 text-center">公關企劃人員與台中特教學校師生至日本大阪，參訪特教學校及交流</p>';
						break;
				}				
				echo '
					<div class="col-sm-12 col-md-12 col-lg-12 mt-3">
							<h5 class="card-title"><p class="text-center" style="font-size:20px;">'.$text.'</p></h5>
					</div>';
	
				$i=1;
				$j=2;
				$z=1001;
				$directory ='images/activity_photo/classroom/'.$id.'/';
				$filenum=count(glob($directory . "*.{jpg,png,gif,mp3}",GLOB_BRACE));	

				for ($i=1;$i<=$filenum;$i++){
					$file = $directory.''.$i.'.jpg';
					$img = imagecreatefromjpeg($file);
					$imgx = imagesx($img);
					$imgy = imagesy($img);	
					if (file_exists($file)) {
						echo '<div class="mr-3 ml-4 mt-5" id="p1_ds2">';	
						if($imgx > $imgy){
						echo '<div class="align-items-end">
								<a data-fancybox="gallery" href="'.$file.'">
									<img src="'.$file.'" class="mr-4 ml-4 rounded mx-auto d-block" style="width:300px;height:200px;margin-top:70px;">
								</a>
							  </div>';
						}else{
						echo '
							<a data-fancybox="gallery" href="'.$file.'">
								<img src="'.$file.'" class="mt-4 mr-4 ml-4 rounded mx-auto d-block" style="width:200px;height:300px;">
							</a>';
						}
						echo '</div>';
					}else{
						break;
					}				
				}
				$id="2";
				foreach (glob($directory ."*.mp4") as $filename2) {
					echo '
						<div class="mr-3 ml-4 mt-5" id="p1_ds2">
							<video width="100%" height="70%" controls class="mt-5">
							  <source src="'.$filename2.'" type="video/mp4">
							</video>		
						 </div>
					';
				}
			
			?>
						
		</div>
	</div>
	
	
	<?php include_once ("footer1.php"); ?>
	
</body>
</html>
