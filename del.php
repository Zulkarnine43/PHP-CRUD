			<?php
							$db = mysqli_connect('localhost', 'root', '','php');   
								$query = 'DELETE FROM register
										WHERE
										id = ' . $_GET['id'];
							$result = mysqli_query($db, $query);
							header('Location: index.php');
									
			?>
			<!-- <script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "index.php";
			</script>	 -->