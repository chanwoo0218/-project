<html>
	<head>
		<meta charset="UTF-8">
		<title> 회원가입 </title>
		<style>
			<?PHP include("./login_form.css"); ?>
			.box-container{
				width: 350px;
				height: 410px;
				border: 2px solid #000000;
				background-color:lightgrey;
				position: fixed;
				left:50%; top:50%;
				margin-left: -175px; margin-top: -230px;
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

	<div class="box-container">
		<div id="txt">
			<p style="font-size:20px">회원가입</p>
		</div>
		<div id="login">
		<form action="signup_check.php" method="post" id="login-form">
			<input type="varchar" name="nickname" placeholder="닉네임"><br>
			<input type="varchar" name="email" placeholder="이메일"><br>
			<input type="varchar" name="ID" placeholder="아이디"><br>
			<input type="varchar" name="password" placeholder="비밀번호"><br>
			<input type="submit" value="회원가입">
		</form>
		</div>		
	</div>

</html>