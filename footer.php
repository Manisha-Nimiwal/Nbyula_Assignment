<?php
//include 'upload.php';
?>
</body>
<footer>
	<div class="container">
	<?php
				if(isset($_SESSION['role'])){
					if($_SESSION['role'] == 2){ ?>
						<a href="uploadquiz.php">Upload quiz</button>
  					<?php 
  					}
  				} ?>
	
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.15/swiper-bundle.js"></script>
	<script src="/Onlinlibrary/js/custom.js"></script>
</footer>
</html>