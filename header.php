<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.15/swiper-bundle.min.css">
		 	<link rel="stylesheet" href="../package/swiper-bundle.min.css">
		 	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	</head>
	<body>	 	
		<div class="header-section">
			<div class="container">
				<a href="/sagar/index.php"><input type="button" name="home" value="Home"></a>
				<?php 
				if(isset($_SESSION['email'])){ ?>
					<a href='/sagar/logout.php'><button name="logout">Logout</button></a>
    				<?php
    				if($_SESSION['role'] == 'teacher'){
    				?>
    				<a href="/sagar/createquiz.php"><button name="createquiz">Create quiz</button></a>
    				<?php
    				}else{
    				?> 
    				    <a href="/sagar/attemptquiz.php"><button name="attemptquiz">Attempt quiz</button></a>
    				<?php
    				}
    				?>
				<?php }else{ ?>
					<a href="/sagar/login.php"><input type="button" value="login"></a>

				<?php }
				include "upload.php";
				?>
				
			</div>
	  	</div>

  <!-- Demo styles -->
   