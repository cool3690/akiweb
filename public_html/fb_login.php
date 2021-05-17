 <!DOCTYPE html>
    <html>
    <head>
	<?php include_once ("head.php"); ?>	
    </head>
    <body>
			<div class="row mt-3">
				<div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-8">
				</div>
				<div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-1 text-right">
					<span id="login">
						<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
						</fb:login-button>
					</span>
					<span id="username">
					</span>
					<span  id="logout" style="display:none;">
					<button  type="button" class="btn btn-primary btn-sm" onclick="logout()">登出</button>
					</span>
				</div>
				<div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-1">
					<img src="" id="profileImage"/ width="50px">
				</div>
			</div>
    </body>
    </body>
    <script>
        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
				var login = document.getElementById("login");
				login.style.display = "none";
				var logout = document.getElementById("logout");
				logout.style.display = "block";
                testAPI();
            } else if (response.status === 'not_authorized') {
                // The person is logged into Facebook, but not your app.
                document.getElementById('status').innerHTML = 'Please log ' +
                        'into this app.';
            } else {
                // The person is not logged into Facebook, so we're not sure if
                // they are logged into this app or not.
                document.getElementById('status').innerHTML = 'Please log ' +
                        'into Facebook.';
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
		window.fbAsyncInit = function() {
		FB.init({
		  appId      : '2947608075315779',
		  cookie     : true,                     // Enable cookies to allow the server to access the session.
		  xfbml      : true,                     // Parse social plugins on this webpage.
		  version    : 'v7.0'           // Use this Graph API version for this call.
		});

            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });

        };

        // Load the SDK asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Successful login for: ' + response.name);
                console.log('Successful login for: ' + response.id);
                console.log('Successful login for: ' + response.email);
                var im = document.getElementById("profileImage").setAttribute("src", "http://graph.facebook.com/" + response.id + "/picture?type=normal");
                document.getElementById('username').innerHTML =response.name+'，您好';
            });
        }
        function logout() {
			FB.logout(function (response) {
				console.log('res when logout', response);
				window.location.replace(window.location.href);
			})
		}
    </script>
    </html>