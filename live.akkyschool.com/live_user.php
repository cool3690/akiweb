<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
	<script src="https://unpkg.com/@daily-co/daily-js"></script>
</head>
<body>
	<?php include_once ("navbar_cramy.php"); ?>	
	<style>

		@media (min-width: 1000px) and (max-width: 1600px) {	
			#container_bottom{
				padding-bottom:100px;
			}		
			#live_title{
				padding-top:100px;
			}	
			#live_content{
				padding-top:30px;
			}
			#button{
				padding-top:112px;
				padding-bottom:100px;
			}
			
		}
		@media (min-width: 1600px) and (max-width: 2000px) { 	
			#live_title{
				padding-top:100px;
			}	
			#live_content{
				padding-top:30px;
				padding-bottom:100px;
			}
			#button{
				padding-top:212px;
				padding-bottom:314px;
			}
			#notice{
				margin-top:138px;
				margin-bottom:118px;
				background-color:#FFF3EE;
			}
		}
	</style>
	<div class="container" id="container_bottom">
	<!--
		<h2 class="text-center" id="live_title">線上課程入口</h2>
		<h4 class="text-center" id="live_content">請耐心等候，線上課程將開始</h4>
	-->
		<?php
			if(@$_SESSION['admin']=="Y" || @$_SESSION['user_authorize']=="2"){	
			echo'
					
				<div class="text-center" id="button" style="display:none;">
					<button type="button" class="btn btn-outline-info pl-5 pr-5 pt-2 pb-2 mt-5" onclick="run()" style="font-size:28px;">進入線上課程</button>
				</div>

				<div class="text-center pt-5 pb-5" id="notice">
					<strong><h4>上課需知</h4></strong> <br>
					*依電子簽到表為出席憑証<br>
					*煩請各位同學如需請假最晚於二個小時前電話連絡。<br>
					*8回上課為一個周期。於三個月內用完<br>(例：1月1日開始上課最晚3月31前需上完課)
									
					<div class="custom-control custom-checkbox mt-5 text-danger">
						<input type="checkbox" class="custom-control-input" id="checkbox" name="example1">
						<label class="custom-control-label" for="checkbox">我已完整閱讀「上課需知」，並同意所有規定事項</label>
					</div>					
					
					<button type="button" class="btn btn-outline-primary mt-3" id="readbutton">確認</button>
								
				</div>
					

				
				<script>
					$( "#readbutton" ).click(function() {
						$check=$("#checkbox").prop("checked");
						if($check==true){
							$("#notice").hide("slow");
							$("#button").show("fadeIn");
						}else{
							alert("請勾選完整閱讀「上課需知」");
						}
					});
				</script>
					
			
			
			';
			}else{
				echo '<script language="javascript">';
				echo 'alert("尚未有權限");';
				echo "window.location.href='登入會員'";
				echo '</script>';	
			}
		?>
	</div>
	<script>

		var set_sec = 0;

		function online_time() {
			set_sec = set_sec + 1;
			var time_text = document.getElementById("time_text");
			var hour = Math.floor(set_sec / 3600);
			var minute = Math.floor(Math.floor(set_sec % 3600) / 60);
			var second = set_sec % 60;
			// time_text.innerHTML = hour + " 時 " + minute + " 分 " + second + " 秒";
			
			if(set_sec%60==0){
				$.ajax({
					type: 'POST',
					url: 'stopwatch_re.php',
					data: {'minute':+minute}, 
					dataType: 'text', 
					success: function(data) {
						// $('#demo1').before(data);
					}
				});
			}
		}	
	
		function showEvent(e) { console.log('video call event -->', e); }

		async function run() {
		  // create a short-lived demo room. if you just want to
		  // hard-code a meeting link for testing you could do something like
		  // this:
		  //
			room = { url: 'https://chansing.daily.co/hello' }
		  //
		  <!-- room = await createMtgRoom(); -->

		  // create a video call iframe and add it to document.body
		  // defaults to floating window in the lower right-hand corner
		  //
		  <!-- window.callFrame = window.DailyIframe.createFrame(); -->

		 callFrame = window.DailyIframe.createFrame({
		   iframeStyle: {
			 position: 'fixed',
			 border: 0,
			 top: 0, left: 0,
			 width: '100%',
			 height: '100%'
		   }
		 });
		 callFrame.join({ url: 'https://chansing.daily.co/hello' });

		  // install event handlers that just print out event information
		  // to the console
		  //
		  callFrame.on('loading', showEvent)
				   .on('loaded', showEvent)
				   .on('started-camera', showEvent)
				   .on('camera-error', showEvent)
				   .on('joining-meeting', showEvent)
				   .on('joined-meeting', showEvent)
				   .on('left-meeting', showEvent)
				   .on('participant-joined', showEvent)
				   .on('participant-updated', showEvent)
				   .on('participant-left', showEvent)
				   .on('recording-started', showEvent)
				   .on('recording-stopped', showEvent)
				   .on('recording-stats', showEvent)
				   .on('recording-error', showEvent)
				   .on('recording-upload-completed', showEvent)
				   .on('app-message', showEvent)
				   .on('input-event', showEvent)
				   .on('error', showEvent);

		  // join the room
		  //
		  await callFrame.join({ url: 'https://chansing.daily.co/hello'});

		  console.log(' You are connected to', callFrame.properties.url, '\n',
					  'Use the window.callFrame object to experiment with', '\n',
					  'controlling this call. For example, in the console', '\n',
					  'try', '\n',
					  '    callFrame.participants()', '\n',
					  '    callFrame.setLocalVideo(false)', '\n',
					  '    callFrame.startScreenShare()');
					  
				
			var repeat = window.setInterval("online_time()", 1000);	  
					  
		}
	</script>
	<?php include_once ("footer0.php"); ?>
</body>
</html>
