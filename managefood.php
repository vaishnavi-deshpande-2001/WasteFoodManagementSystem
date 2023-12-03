<!DOCTYPE html>
<html>
<head>
	<title>Manage Food</title>
	<link rel="stylesheet" type="text/css" href="managefood.css">
</head>
<style type="text/css">
	body {
	background: #333;
	font-family: system-ui;
}

.table-wrapper {
	width: min(1100px, 100% - 3rem);
}

table {
	width:99rem;
	border-collapse: collapse;
	background: #444;
}

caption,
th,
td {
	padding: 1rem;
	text-align: left;
	line-height: 1.5;
	color: white;
}
tr:nth-of-type(2n) {
	background: hsl(0% 0% 05 / 0.1);
}

@media only screen and (max-width: 1000px) {
	th {
		display: none;
	}
	td {
		display: grid;
		grid-template-columns: 15ch auto;
	}

	td::before {
		content: attr(data-cell) ": ";
		font-weight: 700;
		text-transform: capitalize;
	}
}
</style>
<body>
<div class="table-wrapper">
	<div class="table-container">
		<table>
			<caption style="text-align: center; font-size: 2rem; color: white">Manage Food</caption>
			<tbody>
				<tr>
					<th>Food Item</th>
					<th>Description</th>
					<th>Pickup Date</th>
					<th>Pickup Address</th>
					<th>State</th>
					<th>City</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
				   <?php
                 
                  include 'db_connection.php';



              $selectquery="select * from   addfood";

              $query=mysqli_query($con,$selectquery);

              $nums=mysqli_num_rows($query);

              while ($res=mysqli_fetch_array($query)) {

                ?>
                <tr>
                  <td><?php echo $res['item'];?></td>
                  <td><?php echo $res['des'];?></td>
                  <td><?php echo $res['date'];?></td>
                  <td><?php echo $res['address'];?></td>
                  <td><?php echo $res['state'];?></td>
                  <td><?php echo $res['city'];?></td>
                  <td><?php echo $res['email'];?></td>
                  <td><?php echo $res['phone'];?></td>

             

                <?php

              }

               ?>
                

</div>
<script type="text/javascript">
	function AddTableARIA() {
	try {
		var allTables = document.querySelectorAll("table");
		for (var i = 0; i < allTables.length; i++) {
			allTables[i].setAttribute("role", "table");
		}
		var allCaptions = document.querySelectorAll("caption");
		for (var i = 0; i < allCaptions.length; i++) {
			allCaptions[i].setAttribute("role", "caption");
		}
		var allRowGroups = document.querySelectorAll("thead, tbody, tfoot");
		for (var i = 0; i < allRowGroups.length; i++) {
			allRowGroups[i].setAttribute("role", "rowgroup");
		}
		var allRows = document.querySelectorAll("tr");
		for (var i = 0; i < allRows.length; i++) {
			allRows[i].setAttribute("role", "row");
		}
		var allCells = document.querySelectorAll("td");
		for (var i = 0; i < allCells.length; i++) {
			allCells[i].setAttribute("role", "cell");
		}
		var allHeaders = document.querySelectorAll("th");
		for (var i = 0; i < allHeaders.length; i++) {
			allHeaders[i].setAttribute("role", "columnheader");
		}
		// this accounts for scoped row headers
		var allRowHeaders = document.querySelectorAll("th[scope=row]");
		for (var i = 0; i < allRowHeaders.length; i++) {
			allRowHeaders[i].setAttribute("role", "rowheader");
		}
	} catch (e) {
		console.log("AddTableARIA(): " + e);
	}
}

AddTableARIA();

</script>
</body>
</html>