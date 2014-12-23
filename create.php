<!DOCTYPE HTML>
<html>
	<head>
		<title>Create Php</title>
	</head>
	<body>
	<?php
		include_once 'model.php';
		if ( isset ( $_POST['submit'])):
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];

			$insertData = new Crud();
			$insertData->create($name, $address, $phone, $gender);
			header("Location: read.php");
		endif;
	?>
	<form action="" method="POST">
		<div>
			<label>Name :</label>
			<input type="text" name="name" />
		</div>
		<div>
			<label>Address:</label>
			<input type="text" name="address" />
		</div>
		<div>
			<label>Phone:</label>
			<input type="text" name="phone" />
		</div>
		<div>
			<label>Gender:</label>
			<select type="select" name="gender" >
				<option>Select</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>
		<input type="submit" name="submit" value="submit" />
	</form>
	</body>
</html>
