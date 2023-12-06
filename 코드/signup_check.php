
<html>
	<?php
		include("./config.php");
		function is_valid($txt){
			return $txt!=NULL;
		}

		function new_user($nickname,$ID,$password,$email,$con){
			
			$query="SELECT * from users where nickname='$nickname' or ID='$ID' or email='$email'";
			
			if (mysqli_connect_errno()) {
				printf("%s \n", mysqli_connect_error());
				exit;
			}
			$result=mysqli_query($con,$query);

			$row=mysqli_fetch_row($result);
			if($row!=NULL){return FALSE;}

			$query="INSERT INTO users VALUES ('".$nickname."','".$ID."','".$password."','".$email."')";
			print $query."<br>";
			mysqli_query($con,$query);
			mysqli_close($con);
			return TRUE;
		}

		function is_email_valid($email) {
			return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
		}

		$nickname=$_POST['nickname'];
		$ID=$_POST['ID'];
		$password=$_POST['password'];
		$email=$_POST['email'];

		if(!is_valid($nickname) or !is_valid($ID) or !is_valid($password) or !is_valid($email)){
			echo("<script> 
			window.alert('빈칸을 채워주세요.'); 
			history.go(-1);
			</script>");
		}elseif(!is_email_valid($email)){
			echo("<script> 
			window.alert('이메일이 올바르지 않습니다.'); 
			history.go(-1);
			</script>");
		}
		elseif(!new_user($nickname,$ID,$password,$email,$con)){
			echo("<script> 
			window.alert('똑같은 닉네임 또는 아이디 또는 이메일이 이미 존재합니다.'); 
			history.go(-1);
			</script>");
		}else{
			echo("<script> 
			window.alert('회원가입을 축하합니다.'); 
			location.href='list.php'
			</script>");
		}

	?>
</html>