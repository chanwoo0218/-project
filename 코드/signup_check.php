
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
			window.alert('Please fill in the fields.'); 
			history.go(-1);
			</script>");
		}elseif(!is_email_valid($email)){
			echo("<script> 
			window.alert('Email is not valid.'); 
			history.go(-1);
			</script>");
		}
		elseif(!new_user($nickname,$ID,$password,$email,$con)){
			echo("<script> 
			window.alert('Same nickname or ID or email already exists.'); 
			history.go(-1);
			</script>");
		}else{
			echo("<script> 
			window.alert('Signup succeed.'); 
			location.href='list.php'
			</script>");
		}

	?>
</html>