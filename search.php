<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	<div class="content-wrapper">
		<div class="container">

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-sm-9">
						<?php
							try {
								// Set up a secure PDO connection with error mode exception
								$conn = $pdo->open();
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								// Validate and sanitize user input
								$keyword = htmlspecialchars($_POST['keyword']);
								if (!preg_match("/^[a-zA-Z0-9\s]+$/", $keyword)) {
									throw new Exception("Invalid keyword input");
								}

								$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
								$stmt->execute(['keyword' => '%'.$keyword.'%']);
								$row = $stmt->fetch();
								if($row['numrows'] < 1){
									echo '<h1 class="page-header">No results found for <i>'.htmlspecialchars($keyword).'</i></h1>';
								}
								else{
									echo '<h1 class="page-header">Search results for <i>'.htmlspecialchars($keyword).'</i></h1>';
									try{
										$inc = 3;	
										$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
										$stmt->execute(['keyword' => '%'.$keyword.'%']);
								
										foreach ($stmt as $row) {
											// Highlight the matched keyword securely
											$highlighted = preg_replace('/' . preg_quote($keyword, '/') . '/i', '<b>$0</b>', htmlspecialchars($row['name']));
											$image = (!empty($row['photo'])) ? 'images/'.htmlspecialchars($row['photo']) : 'images/noimage.jpg';
											$inc = ($inc == 3) ? 1 : $inc + 1;
											if($inc == 1) echo "<div class='row'>";
											echo "
												<div class='col-sm-4'>
													<div class='box box-solid'>
														<div class='box-body prod-body'>
															<img src='".$image."' width='100%' height='230px' class='thumbnail'>
															<h5><a href='product.php?product=".htmlspecialchars($row['slug'])."'>".$highlighted."</a></h5>
														</div>
														<div class='box-footer'>
															<b>&#36; ".number_format($row['price'], 2)."</b>
														</div>
													</div>
												</div>
											";
											if($inc == 3) echo "</div>";
										}
										if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
										if($inc == 2) echo "<div class='col-sm-4'></div></div>";
										
									}
									catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}
								}

								$pdo->close();
							} catch (Exception $e) {
								// Handle exceptions like invalid input or database errors
								echo '<h1 class="page-header">Error: ' . htmlspecialchars($e->getMessage()) . '</h1>';
							}
						?> 
					</div>
					<div class="col-sm-3">
						<?php include 'includes/sidebar.php'; ?>
					</div>
				</div>
			</section>
			
		</div>
	</div>
	
	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
