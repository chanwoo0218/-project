<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title> login </title>
		<style>
			<?PHP include("./login_form.css"); ?>
			.box-container{
				width: 350px;
				height:280px;
				border: 2px solid #000000;
				background-color:lightgrey;
				position: fixed;
				left:50%; top:50%;
				margin-left: -175px; margin-top: -180px;
			}
			.box-container div{
				padding: 10px;
				margin: 0px;
			}
			#txt{
				position: static;
				width:200px;
				height:20px;
			}
			#login {
				position: static;
				width:200px;
				height:90px;
				text-align:center;
			}
		</style>
	</head>
	<body>
		
		<div class="box-container">
			<div id="txt">
				<p style="font-size:20px">Login</p>
			</div>
			<div id="login">
				<form action="login_check.php" method="post" id="login-form">
					<input type="varchar" name="ID"  placeholder="ID" ><br>
					<input type="varchar" name="password"  placeholder="password" ><br>
					<input type="submit" value="login" >
				</form>
			</div>
			
		</div>
		
	</body>
</html>
