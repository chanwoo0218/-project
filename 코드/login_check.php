
<html>
	<?php
		include("./config.php");
		function is_valid($txt){
			return $txt!=NULL;
		}

		$ID=$_POST['ID'];
		$password=$_POST['password'];

		if(!is_valid($password) or !is_valid($ID)){
			echo("<script> 
			window.alert('빈칸을 모두 채워주세요.'); 
			history.go(-1);
			</script>");
		}
		else{
			
			$query="SELECT * from users where password='$password' and ID='$ID'";

			$result=mysqli_query($con,$query);

			$row=mysqli_fetch_row($result);
			if($row==NULL){
				echo("<script> 
				window.alert('아이디 또는 비밀번호가 일치하지 않습니다.'); 
				history.go(-1);
				</script>");
			}else{
				session_start();
				$_SESSION['nickname']=$row[0];
				echo("<script> 
				location.href='list.php'
				</script>");
			}
			
		}
	?>
</html>