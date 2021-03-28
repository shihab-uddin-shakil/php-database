<!DOCTYPE html>
<html>

<head>
    <title>Registration Form </title>
</head>

<body>

    <?php 

		$firstName = $lastName = $email=  $remail=$gender=$password=$userName=$msg="";
		$firstNameErr = $lastNameErr = $emailErr = $remailErr=$genderErr=$passwordErr=$userNameErr="";

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			if(empty($_POST['fname'])) {
				$firstNameErr = "Please fill up the firstname";
			}
			else {
				$firstName = $_POST['fname'];
			}

			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the lastname";
			}
			else {

				$lastName = trim($_POST['lname']);
				$lastName = htmlspecialchars($_POST['lname']);
			}

			if(empty($_POST['email'])) {
				$emailErr = "Please fill up the website";
			}
			
			else {
				$email = $_POST['email'];
            
			}

          if(!isset($_POST['gender'])) {
               
				$genderErr = "Please cheked  the Gender";
			}
			else {
				$gender = $_POST['gender'];
			}
            if(empty($_POST['userName'])) {
				$userNameErr = "Please fill up the firstname";
			}
			else {
				$userName= $_POST['userName'];
			}
       
        if(empty($_POST['password'])) {
            $passwordErr = "Please fill up the firstname";
        }
        else {
            $password= $_POST['password'];
        }

        if(empty($_POST['remail'])) {
            $remailErr = "Please fill up the website";
        }

         else {
            
            $remail = $_POST['remail'];
           }
          
        
      
            



			if($firstNameErr == "" && $lastNameErr == "" && $emailErr == "" && $passwordErr == "" && $remailErr == ""&& $userNameErr == "") {

                if( $remail==$email){

                   // $arr1 = array('userId' => $userName, 'password' => $password, 'fname' => $firstName,'lname' =>  $lastName ,'email' => $email,'gender'=> $gender );
                    $host = "localhost";
                    $user = "user";
                    $pass = "12345";
                    $db = "task";
                
                    // Mysqli object-oriented
                    $con = new mysqli($host, $user, $pass,$db);
                
                    if($con -> connect_error) {
                        echo "Database Connection Failed!";
                        echo "<br>";
                        echo $con -> connect_error;
                    }
                    else{


                        // $sql = "insert into users (fname,lname,gender,email,username, password) values ('.$firstName.','.$lastName.','.$gender.','.$email.','.$userName.','.$password+')";
		                // if($conn1->query($sql)) {
			            // $msg= "Registration Successful.";
		                //        }
	                    //  	else {
		                //  	echo "Failed to Insert Data.";
		             	// echo "<br>";
		               	// echo $conn1->error;
	                    //  	}
                        $stmt = $con->prepare("insert into user (fname, lname,gender,email,username,password) VALUES (?, ?, ?, ? ,?,?)");
                       // $stmt = $con -> prepare( "INSERT INTO user values( ?,?,?,?,?,?)");
                
                        //Binding values to the parameter markers
                       $stmt -> bind_param("ssssss", $fname,$lname,$genderD,$emailD,$username,$passwordD);
                        
                        $firstName=$fname;
                        $lastName=$lname;
                        $gender=$genderD;
                        $email=$emailD;
                        $userName=$username;
                        $password=$passwordD;
                        //Executing the statement
                        $stmt->execute();
                        //Closing the statement
                        $stmt->close();
                        //Closing the connection
                        $con->close();
                        $msg="successfully registration";
                    }
                   
                
                }
                else{
                    echo "<br>";
                   $msg=  "email not valid please check mail..!!";
                }
                
			}

            else{
                echo "<br>";
                $msg=   "Invalid  registered. Please try again!!" ;
            }
		}
    
	?>

    <h1>Registration Form </h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="fname" value="<?php echo $firstName ?>">
        <p><?php echo $firstNameErr; ?></p>

        <br>

        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lname" value="<?php echo $lastName ?>">
        <p><?php echo $lastNameErr; ?></p>

        <br>
        <br>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
        <p><?php echo $genderErr; ?></p>
        <br>
        <br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $email ?>">
        <p><?php echo $emailErr; ?></p>

        <br>


        <label for="userName">User Name</label>
        <input type="text" id="userName" name="userName" value="<?php echo $userName ?>">
        <p><?php echo $userNameErr; ?></p>

        <br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo $password ?>">
        <p><?php echo $passwordErr; ?></p>

        <br>

        <label for="remail">Email</label>
        <input type="email" id="remail" name="remail" value="<?php echo $remail ?>">
        <p><?php echo $remailErr; ?></p>

        <br>

        <br>
        <p><?php echo $msg; ?></p>


        <input type="submit" value="SignUp">

    </form>

    <div>
        <a href='Login.php'>
            <h5>Click here for login..</h5>
    </div>

</body>

</html>