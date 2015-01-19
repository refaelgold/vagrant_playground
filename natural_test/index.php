<?php
/**
 * Created by PhpStom* User: refaelgold
 * Date: 9/24/14
 * Time: 9:15 AM
 *
 */

?>

<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all"/>
</head>
<body>
<article id="cars_wrapper">

	<table id="cars">
		<thead>
			<tr>
				<th>Pos</th>
				<th>Model</th>
				<th>Price</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<!--data will arrived from functions.js -->
		</tbody>

	</table>

	<span class="final-price-statement">
		The Final price is :
			<span class="final-price"></span>
	</span>


</article>
<section class="big-container-filter-sorting">
	<section id="filter">
		<h2>Filter options</h2>

		<section class="checkbox-container">
			<input type="checkbox" id="asian_filter_check_box" name="is_asian">
			<label for="asian_filter_check_box">Is Asian</label>
		</section>
		<section class="checkbox-container">
			<input type="checkbox" id="american_filter_check_box" name="is_american">
			<label for="american_filter_check_box">Is American</label>
		</section>
	</section>


	<section class="sorting">
		<h2>Sorting</h2>
		<select name="sorting" id="sorting-selector">
			<option selected disabled value="default">please select a data to sort</option>
			<option value="Model">Model</option>
			<option value="Price">Price</option>
			<option value="Pos">pos</option>
		</select>
	</section>
</section>


<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/runner.js"></script>
</body>
</html>
