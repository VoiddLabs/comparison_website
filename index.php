<?php

require 'connect_db.php';

if(isset($_GET["p1"]) && isset($_GET["p2"]) )
{
	$prod_1 = $_GET["p1"];
	$prod_2 = $_GET["p2"];
}
else
{
	$prod_1 = "mi";
	$prod_2 = "sam";
}


$query1 = "SELECT id,ProductName,Chipset,RAM,ROM,OS,Price,img_url FROM mobiledb WHERE id LIKE '".$prod_1."%'";
$query2 = "SELECT id,ProductName,Chipset,RAM,ROM,OS,Price,img_url FROM mobiledb WHERE id LIKE '".$prod_2."%'";
$response1 = mysqli_query($connect,$query1);
$response2 = mysqli_query($connect,$query2);

$row1 = mysqli_fetch_array($response1);
$row2 = mysqli_fetch_array($response2);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Compare Dunia</title>

	<link rel="stylesheet" type="text/css" href="styler.css">
</head>
<body>

	<div class="container">
		
		<!-- Title Section-->
			<div> 
				<div class="header">
					<section class="content">
						<header>
							<h1><span id="title_part_one">Compare </span><span id="title_part_two">Dunia</span></h1>
						</header>
					</section>
				</div>
				<div class="navigation_bar">
					<nav>
						<section class="content">
							<section class="nav_element">
								<ul id="nav_list">
									<li><a href="#">Home</a></li>
									<li><a href="#">Compare</a></li>
									<li><a href="#">News</a></li>
									<li><a href="#">Forum</a></li>
								</ul>
							</section>
						</section>
					</nav>
				</div>
			</div>
		 <!-- End of Title Section-->
		<div  >
			<div class="input_section">
				<form action="index.php" method="get" >
						<?php
								//query to include the id and product name so that we can identify the decision
								$list_query = "SELECT id,ProductName FROM mobiledb";

								$list_response = mysqli_query($connect,$list_query);
								echo "<select name='p1'>";
									while ($item = mysqli_fetch_array($list_response))
										{
											echo "<option value=".$item["id"];
											if($item["id"] == $row1["id"])
											{
												echo ' selected = "selected"';
											}
											echo ">".$item["ProductName"]."</option>";
										}
								echo "</select>";


								?>	
						<input type="submit" value="Compare" id="btn">
						<?php
										//query to include the id and product name so that we can identify the decision
										$list_query = "SELECT id,ProductName FROM mobiledb";

										$list_response = mysqli_query($connect,$list_query);
										echo "<select name='p2'>";
											while ($item = mysqli_fetch_array($list_response))
												{
													echo "<option value=".$item["id"];
													if($item["id"] == $row2["id"])
													{
														echo ' selected = "selected"';
													}
													echo ">".$item["ProductName"]."</option>";
												}
										echo "</select>";


						?>
					</form>
			</div>
			<div class="output_section">
					<section class="Context">
						<div class="prod_img">
							<section class="prod">
								<?php
								echo '<image src='.
								$row1['img_url'].">";
							?>
							</section>
							<section id="prod">
								<?php
								echo '<image src='.
								$row2['img_url'].">";
							?>
							</section>
						</div>
						<div class="compare_data">
								<div class="det_title">
									<ul>
										<li >Product Name</li>
										<li>Chipset</li>
										<li>RAM</li>
										<li>ROM</li>
										<li>Operating System Version</li>
										<li>Price</li>
									</ul>
								</div>
								<section class="product_det">	
								<ul>
									<?php
										echo "<li>".$row1['ProductName']."</li>";
										echo "<li>".$row1['Chipset']."</li>";
										echo "<li>".$row1['RAM']."</li>";
										echo "<li>".$row1['ROM']."</li>";
										echo "<li>".$row1['OS']."</li>";
										echo "<li>".$row1['Price']."</li>";
									?>
								</ul>
							</section>
							<section class="product_det">
								<ul>
									<?php
										echo "<li>".$row2['ProductName']."</li>";
										echo "<li>".$row2['Chipset']."</li>";
										echo "<li>".$row2['RAM']."</li>";
										echo "<li>".$row2['ROM']."</li>";
										echo "<li>".$row2['OS']."</li>";
										echo "<li>".$row2['Price']."</li>";
									?>
								</ul>
							</section>
						</div>

		</div>
	</div>
</div>


</body>

</html>
