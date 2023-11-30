<html>
	<form action="signup.php">
        <input type="submit" value="signup">
    </form>
    
    
    <?php
        session_start();
        if(!isset($_SESSION['nickname'])){
            ?>

            <form action="login.php">
                <input type="submit" value="login">
            </form>
            
            <?php
            print "not login";
        }else{
            ?>

            <form action="logout.php">
                <input type="submit" value="logout">
            </form>

            <?php
            print "hello,".$_SESSION['nickname'];
        }
    ?>

</html>