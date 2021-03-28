<?php 
    
    $passworde=$userNamee="";
    $passwordErre=$userNameErre="";
    $Erre="";
    if(isset($_POST['login'])){
       

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            if(empty($_POST['userNamee'])) {
                $userNameErre = "Please fill up the username";
            }
            else {
                $userNamee = $_POST['userNamee'];
            }
        
            if(empty($_POST['passworde'])) {
                $passwordErre = "Please fill up the password";
            }
            else {
                $passworde=$_POST['passworde'];
            }
            if($passwordErre == "" && $userNameErre == ""){
                
                $host = "localhost";
	$user = "user";
	$pass = "123";
	$db = "task";

	// Mysqli object-oriented
	$conn1 = new mysqli($host, $user, $pass, $db);

	if($conn1->connect_error) {
		echo "Database Connection Failed!";
		echo "<br>";
		echo $conn1->connect_error;
	}
    else {
		
		$sql = "select * from user";
		$res1 = $conn1->query($sql);
		if($res1->num_rows > 0) {
			while($row = $res1->fetch_assoc()) {
				if($userNamee== $row['username'] && $passworde==$row['password']){
            
                    header("location:http://localhost/successful.html");
                    die();
                 
               }
              
               else{
                $Erre="Unable login ..UserName Or Passwor Invalid please Try again..!!";
               }      
			}
		}
                  
                
            }
            
        
      }

    }
}
    


    
	?>

<html>

<head>
    <title>Login</title>
</head>

<body>



    <h1>Login</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">



        <label for="userNamee">User Name</label>
        <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
        <p><?php echo $userNameErre; ?></p>

        <br>

        <label for="passworde">Password</label>
        <input type="password" id="passworde" name="passworde" value="<?php echo $passworde ?>">
        <p><?php echo $passwordErre; ?></p>

        <br>
        <br>

        <p><?php echo $Erre; ?></p>


        <input type="submit" name="login" value="Login">

    </form>


</body>

</html>
