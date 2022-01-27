<?php 
	include 'header.php';
	include 'database/user_data.php';

	if(isset($_POST['submit'])){
	    if(isset($_SESSION['uname'])){
			$author_name = $_SESSION['uname'];
		}
		if(isset($_POST['quiztitle'])){
			$title = $_POST['quiztitle'];
		}
		if(isset($_POST['subject'])){
			$subject = $_POST['subject'];	
		}
		if(isset($_POST['publish'])){
			$publish_status = $_POST['publish'];
		}
		if(isset($_POST['end-date'])){
			$end_date = $_POST['end-date'];
		}
		if(! $conn ) {
		  die('Could not enter data: ' . mysqli_error());
		}else{
			$sql = "SELECT * FROM quizdata WHERE quiztitle='$title'";
			$result =mysqli_query($conn, $sql);
			$num = mysqli_num_rows($result);
			if(empty($num)){
				$sql = "INSERT INTO quizdata (quiztitle, subject, status, end_date, author) VALUES ( '$title','$subject','$publish_status','$end_date','$author_name')";
			   	if (mysqli_query($conn, $sql)) {
			        echo "New quiz created successfully";
			        header("location: /sagar/quizdata.php/?quiz=$title");
			    } else {
			        echo "Error: " . $sql . "" . mysqli_error($conn);
			    }			
			}else{
				echo "Quiz name already exist";
			}			
		}								
	}

?>

<div class="container">
	<form method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">
		<div class="form-item">
			<label>Quiz title</label>
			<input type="text" name="quiztitle" placeholder="Quiz title">
		</div>
		<div class="form-item">
			<label>Subject</label>
			<input type="text" name="subject" placeholder="Subject">
		</div>
		<div class="form-item">
			<label>Publish</label>
			<input type="checkbox" name="publish" value="published">
		</div>
		<div class="form-item">
			<label>End date</label>
			<input type="date" name="end-date">
		</div>
		<input type="submit" type="submit" name="submit" value="createquiz">
	</form>
</div>

<?php 
	include 'footer.php';
?>
