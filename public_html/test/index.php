<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
<body>
	<script>
		$(document).ready(function(){
			$("#myBtn1").click(function(){
				$("#myModal1").modal();
			});
		});
		
		$(document).ready(function(){
			$("#myBtn2").click(function(){
				$("#myModal2").modal();
			});
		});
		
		$(document).ready(function(){
			$("#myBtn3").click(function(){
				$("#myModal3").modal();
			});
		});
		
		$(document).ready(function(){
			$("#myBtn4").click(function(){
				$("#myModal4").modal();
			});
		});
		
		$(document).ready(function(){
			$("#myBtn5").click(function(){
				$("#myModal5").modal();
			});
		});		
		
		$(document).ready(function(){
			$("#myBtn6").click(function(){
				$("#myModal6").modal();
			});
		});	
		
		$(document).ready(function(){
			$("#myBtn7").click(function(){
				$("#myModal7").modal();
			});
		});		
		
		$(document).ready(function(){
			$("#myBtn8").click(function(){
				$("#myModal8").modal();
			});
		});	
		
		$(document).ready(function(){
			$("#myBtn9").click(function(){
				$("#myModal9").modal();
			});
		});	
	</script>
	<div class="container-fluid text-center pt-3 pb-3" style="background-image: url('images/background.png');">	
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3"></div>	
			<div class="col-sm-12 col-md-3 col-lg-1">		
				<img class="rounded float-center" src="images/logo01.gif">
			</div>
			<div class="col-sm-12 col-md-9 col-lg-6 mt-5" style="padding-right:80px;">		
				<span class="">私たちは学生一人ひとりを大事にし、学生に秘められた能力を最大限に引き出せるようお手伝いをする日本語塾です。</span>
			</div>
			<div class="col-sm-12 col-md-3 col-lg-2"></div>	
		</div>
	</div>	
	<?php include_once ("navbar.php"); ?>	
	
	<div class="container">	
		<div class="row" style="">
			<div class="col-sm-9 col-md-9 col-lg-12">
				<img class="text-center" src="images/topbg01.jpg" width="80%">
				<div id="news_marq">
					<div id="marquee_div">
						<marquee height="68px"  scrollamount="1" scrolldelay="15"  direction="up" onmouseover="this.stop()" onmouseout="this.start()"><a target="_blank">		
							新開課"基礎五十音班"<br />
							歡迎對日文有興趣的新同學報名參加<br />
							予計9/19(三)開課<br />
							上課時間：19：00-20：30<br />
							授課老師：沈佩燕<br /><br />
							"歡迎來電詢問"</a><br />
						</marquee>
					</div>
				</div>
				<div id="news_marq2"><a href="#"><img src="images/course_floaticon.png" width="164" height="82" /></a></div>
			</div>
		</div>			
	</div>	
		
	<div class="container">	
		<div class="row" style="">
			<div class="col-sm-9 col-md-9 col-lg-9">

         <div class="contect_list_date">一月 26, 2019
         </div>
        <div class="contect_list_title">2019年春節休假公告
        </div>
         <div class="contect_list_detail">
            【春節的休假如下：】<br />
             2/4(除夕)–2/10(初四)<br />
           2/11(初五)正常上課)<br />
           <p><img src="images/happy_new_year_2019_01.jpg" width="60%" alt="2019年1~2月課表" /></p>
           <p>Happy New Year 2019 greeting card</p>
         </div>
      
			
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
			<div style="position:absolute;left:20%;top:7%;">
			<table width="230px" border="0" cellspacing="0" cellpadding="0" style="z-index:0;">
			  <tr>
				<td height="1"></td>
			  </tr>
			  <tr>
				<td><a href="#">2019年3、4月課程情報</a></td>
			  </tr>
			  <tr>
				<td height="15"></td>
			  </tr>
			  <tr>
				<td><a href="#">2019年春節休假公告</a></td>
			  </tr>
			  <tr>
				<td height="13"></td>
			  </tr>
			  <tr>
				<td><a href="#">2019年1、2月新課程表</a></td>
			  </tr>
			  <tr>
				<td height="11"></td>
			  </tr>
			  <tr>
				<td><a href="#">2018年11月，12月課程情報!!!!!</a></td>
			  </tr>
			  <tr>
				<td height="12"></td>
			  </tr>
			  <tr>
				<td><a href="#">2018年9，10月課程情報</a></td>
			  </tr>
			</table>
			</div>
				<img class="" src="images/news.png" style="z-index:-1;">
				<img class="mt-3" src="images/ffblinkbg.jpg">
			</div>
		</div>		
	</div>	
		<?php include_once ("footer.php"); ?>
</body>
</html>
