<?php 
include_once 'model.php';
$id = $_REQUEST['id'];
$updateInstantiate = new Crud();
$getValue = $updateInstantiate->getValueById($id);
extract($getValue);
//var_dump($getValue);
if ( isset ( $_POST['update'])):
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];

			$updateInstantiate->update($id,$name, $address, $phone, $gender);
			header("Location: read.php");
		endif;
?>

<form action="" method="POST">
		<div>
			<label>Name :</label>
			<input type="text" name="name" value="<?php echo $name; ?>" />
		</div>
		<div>
			<label>Address:</label>
			<input type="text" name="address" value="<?php echo $address; ?>" />
		</div>
		<div>
			<label>Phone:</label>
			<input type="text" name="phone" value="<?php echo $phone; ?>" />
		</div>
		<div>
			<label>Gender:</label>
			<?php $maleSelected = ($gender == "male") ? "Selected" : ""; ?>
			<?php $femaleSelected = ($gender == "female") ? "Selected" : ""; ?>
			<select type="select" name="gender" />
				<option <?php echo $maleSelected; ?> value="male">Male</option>
				<option <?php echo $femaleSelected; ?> value="female">Female</option>
			<select>
		</div>
		<input type="submit" name="update" value="update" />
	</form>