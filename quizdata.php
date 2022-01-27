<?php 
	include 'header.php';
	include 'database/user_data.php';

	if(isset($_POST['submit'])){
        
		if(isset($_POST['question'])){
			$question = $_POST['question'];
		}
		if(isset($_POST['option'])){
			$option = serialize($_POST['option']);	
		}
		if(isset($_POST['answer'])){
			$answer = $_POST['answer'];			
		}
		if(isset($_POST['refrence'])){
			$refrence = $_POST['refrence'];
		}		
		if(! $conn ) {
		  die('Could not enter data: ' . mysqli_error());
		}else{
			$sql = "INSERT INTO quiz_que_ans (question, options, answer, refrence_quiz) VALUES ( '$question','$option','$answer','$refrence')";
		   	if (mysqli_query($conn, $sql)) {
		        echo "Question created successfully";
		    } else {
		        echo "Error: " . $sql . "" . mysqli_error($conn);
		    }					
		}								
	}

?>

<div class="container">
	<form method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">
		<div class="form-item">
			<label>Question</label>
			<input type="text" name="question" placeholder="Question">
		</div>
		<div class="form-item">
			<label>option</label>
			<input type="text" name="option[]" placeholder="Option value"><br>
			<button class="add-more-opt">+</button>
		</div>
		<div class="form-item">
			<label>Correct opttion</label>
			<input type="text" name="answer" placeholder="Correct answer">
		</div>
		<input type='hidden' name="refrence" value="<?php echo $_GET['quiz'] ?>">
		<input type="submit" type="submit" name="submit" value="add question">
	</form>
</div>

<?php 
	include 'footer.php';
?>
