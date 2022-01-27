<?php include 'header.php';
include 'database/user_data.php';

$errorF = $errorL = $errorP = $errorE = $errorPr=$flag="";

if(isset($_POST['submit'])){
	if(isset($_POST['uname'])){
		$errorF = $_POST['uname'];
	}
	if(isset($_POST['password'])){
		$errorP= $_POST['password'];
	}
	if(isset($_POST['confirmPass'])){
		$errorPr=$_POST['confirmPass'];
		if($errorP!=$errorPr){
			echo "Passwords not match";
		}
	}
	if(isset($_POST['email'])){
		$errorE=$_POST['email'];
		if (!filter_var($errorE, FILTER_VALIDATE_EMAIL)) {
  			echo("Email is not valid");
		}
	}

	$userFN=$_POST['uname'];
	$userE=$_POST['email'];
	$pass=$_POST['password'];
	$userP=md5($_POST['password']);
	$userPr=md5($_POST['confirmPass']);
	$userR=$_POST['roles'];

	if(! $conn ) {
	  die('Could not enter data: ' . mysqli_error());
	}
	$sql = "SELECT email FROM user_data WHERE email='$userE'";
	$result =mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	$uppercase = preg_match('@[A-Z]@', $pass);
	$lowercase = preg_match('@[a-z]@', $pass);
	$number    = preg_match('@[0-9]@', $pass);
	$specialChars = preg_match('@[^\w]@', $pass);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
	if(($userP == $userPr) && ($num == 0 )){
		$sql = "INSERT INTO userdata (username, email, role, password) VALUES ( '$userFN','$userE','$userR','$userP')";
	   	if (mysqli_query($conn, $sql)) {
	        echo "New user created successfully";
	    } else {
	        echo "Error: " . $sql . "" . mysqli_error($conn);
	    }
	}  
}}?>
<div class="container">
<form method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">
	<div class="form-item">
		<label>Name</label>
		<input type="text" name="uname" placeholder="User Name">
	</div>
	<div class="form-item">
		<label>Email</label>
			<input type="text" name="email" placeholder="Email">
		</div>
	<div class="form-item">
		<label>Password</label>
		<input type="password" name="password" placeholder="password">
	</div>
	<div class="form-item">
		<label>Confirm password</label>
			<input type="password" name="confirmPass" placeholder="Confirm password">
		</div>
	<select name="roles">
		<option selected value="student">Student</option>
		<option value="teacher">Teacher</option>
	</select>
	<input type="submit" type="submit" name="submit" value="Signup">
</form>
</div>

<?php 
if(isset($_POST['submit'])){
	if($errorF == '') {
		echo "First name required";
	}
	if($errorP == ''){
		echo "Password field empty";
	}
}

include 'footer.php'; ?>
