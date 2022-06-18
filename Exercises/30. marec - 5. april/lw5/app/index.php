<!DOCTYPE html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Web technologies</title>

<header>Web technologies</header>

<div id="content1">
	<form action="add.php" method="post">
		<fieldset>
			<legend>Add a new student</legend>
			<label for="first_add">First name: </label>
			<input id="first_add" type="text" name="first" required />
			<label for="last_add">Last name: </label>
			<input id="last_add" type="text" name="last" required />
			<button>Add participant</button>
		</fieldset>
	</form>
	<form action="index.php" method="get">
		<fieldset>
			<legend>Search for students</legend>
			<label for="number_search">Number: </label>
			<input id="number_search" type="number" min="1" name="number" />
			<label for="first_search">First name: </label>
			<input id="first_search" type="text" name="first" />
			<label for="last_search">Last name: </label>
			<input id="last_search" type="text" name="last" />
			<button>Search</button>
		</fieldset>
	</form>
</div>

<div id="content2">
	<table>
		<tr>
			<th>Number</th>
			<th>First name</th>
			<th>Last name</th>
		</tr>

		<!-- 
			TODO: 
			1. Import the UserDB.php file.
			2. Use the read_from_db() function to get the users from the DB.
			3. To read parameters send in a GET request, use the $_GET superglobal, e.g.:
			      $_GET["parameter_name"]
			3. Use a loop to iterate over users and display them inside the table.
			   Use the the below row to display a user inside the table.
		-->

		<?php


		// var_dump(($_GET));
		// exit();
		require_once("UserDB.php");
		$students = UserDB::read_from_db($_GET);

		// var_dump($students);
		// exit();
		foreach ($students as $student) : ?>
			<tr>
				<td><?= $student["number"] ?></td>
				<td><?= $student["first"] ?></td>
				<td><?= $student["last"] ?></td>
			</tr>


		<?php endforeach; ?>



	</table>
</div>

<footer>Web technologies @ FRI</footer>