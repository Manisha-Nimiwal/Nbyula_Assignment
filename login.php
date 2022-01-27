<?php 
include 'header.php';

if(isset($_POST['login'])){
	include 'database/user_data.php';
	$getEmail =$_POST["email"];
	$getPass =md5($_POST["psw"]);
	$sql = "SELECT * FROM userdata WHERE email= '$getEmail' AND password='$getPass'";
	$result =mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if($num > 0){
		$output = mysqli_fetch_all($result);
		foreach ($output as $key => $value) {
			
			$id=$value[0];
			$fName=$value[1];
			$PW=$value[4];
			$Roles=$value[3];
		}
   		
		$login=true;
		session_start();
		$_SESSION['uid']=$id;
		$_SESSION['uname']=$fName;
		$_SESSION['password']=$PW;
		$_SESSION['role']=$Roles;
		$_SESSION['email'] =$getEmail;
	}
	if($num !=0){
   		//print_r ($_SESSION);
   		//exit();
		header("location: /sagar/index.php");
	}
	else{
		echo "Wrong credentials or Create account";
	}
}?>
<div class="container">
	<div class="form-outer">
		<div class="form-wrapper left-section">
			<h2>Login Form</h2>
			<form method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">
				<div class="form-item">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email" required="email">
				</div>
				<div class="form-item">
					<label>Password</label>
					<input type="password" name="psw" placeholder="password" required="password">
				</div>
				<a href="/sagar/index.php"><input name="login" type="submit" value="Login"></a>
			</form>
		</div>
		<div class="form-wrapper right-section">
			<h5>New user?</h5>
			<a href="/sagar/signup.php"><button name="signup">Signup</button></a>
		</div>
	</div>
</div>
<?php 
include 'footer.php';?>