<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <link rel="icon" type="image/png" href="favicon.jpeg">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
	<link rel="stylesheet" href="registerform.css?v=<?php echo time(); ?>">


</head>
<body>
	<div class="main">
		<nav>
		  <button class="button"><a href="index.php"><b>Go Back</b></a></button>
		</nav>
	<div class="box">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				
				<form method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name_signup" placeholder="Name" required="">
					<input type="text" name="username_signup" placeholder="UserName" required="">
					<input type="email" name="email_signup" placeholder="Email" required="">
					<input type="password" name="password_signup" placeholder="Password" required="">
					<input type="Submit" class="btn" value="Sign up" name="register" />
				</form>

			</div>
			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="Email" placeholder="Email" required="">
					<input type="password" name="Password" placeholder="Password" required="">
					<input type="Submit" class="btn" value="Login" name="login_button"/>
				</form>
				<?php  
				if(isset($_POST['login_button'])){
						// Connecting to database
						// $server_name = "localhost";
						// $mysql_username = "id18865561_chefs_maaz";
						// $mysql_password = "Nni]w*9rqV#52F6Q";
						// $mysql_database = "id18865561_chefs";
						$server_name = "localhost";
						$mysql_username = "id18865561_chefs_maaz";
						$mysql_password = "Nni]w*9rqV#52F6Q";
						$mysql_database = "id18865561_chefs";

						// Connecting to dbms
						$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $mysql_database);



						$email = $_POST['Email'];
						$password = $_POST['Password'];
						$sql = "SELECT * FROM Accounts WHERE email = '$email' and password = '$password'";
						$result = mysqli_query($conn, $sql);

						$total_rows = mysqli_num_rows($result);
						if($total_rows>0){
							while($row = mysqli_fetch_assoc($result)){
								// setcookie("username", $row[""]);
								// setcookie("email", $row[""]);
								$name = $row["Name"];
								$user = $row["Username"];
								$mail = $row["Email"];
					
							  // echo "<script type=\"text/javascript\">
				// 				localStorage.setItem('name', '$name');
    //                         localStorage.setItem('user', '$user');
    //                         localStorage.setItem('email', '$mail');
    //   </script> ";
    
    echo("<script>window.location.href = 'mainpage.php?name=$name&user=$user&email=$mail';</script>");
						
							}
						
                            
							}
							
							else{

								echo "Credential not found";

							}	
							}
					

					if(isset($_POST['register'])){
						$server_name = "localhost";
						$mysql_username = "id18865561_chefs_maaz";
						$mysql_password = "Nni]w*9rqV#52F6Q";
						$mysql_database = "id18865561_chefs";
								
						// Connecting to dbms
						$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $mysql_database);
		  
						// Getting Data
						  
						$tab_create = "CREATE TABLE IF NOT EXISTS `Accounts` (`S.No` INT(6) NOT NULL AUTO_INCREMENT, `Name` VARCHAR(50) NOT NULL, `Username` VARCHAR(25) NOT NULL, `Email` VARCHAR(50) NOT NULL, `Password` VARCHAR(30) NOT NULL, PRIMARY KEY (`S.No`))";
						$result = mysqli_query($conn, $tab_create);
						
						
						// Inserting Data
						$name = $_POST["name_signup"];
						$username=$_POST["username_signup"];
						$email=$_POST["email_signup"];
						$password=$_POST["password_signup"];
						$user_check_query = "SELECT * FROM Accounts WHERE email = '$email' or username = '$username'";
						$res = mysqli_query($conn, $user_check_query);
						$total_rows = mysqli_num_rows($res);
						if($total_rows == 0){
							$inserting = "INSERT INTO `Accounts` (`Name`, `Username`, `Email`, `Password`) VALUES ('$name', '$username', '$email', '$password')";
						mysqli_query($conn, $inserting);
						}
						else{
							echo "Username or Email Already Taken";
						}
		
					}				
					?>
			</div>
	</div>
	</div>

</body>
</html>
