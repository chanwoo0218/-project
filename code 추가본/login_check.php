
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
			window.alert('Please fill in the fields.'); 
			history.go(-1);
			</script>");
		}
		else{
			
			$query="SELECT * from users where password='$password' and ID='$ID'";

			$result=mysqli_query($con,$query);

			$row=mysqli_fetch_row($result);
			if($row==NULL){
				echo("<script> 
				window.alert('Login failed.'); 
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