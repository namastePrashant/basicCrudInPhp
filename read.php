
<?php 
include_once 'model.php';
$readInstantiate = new Crud;
$getData = $readInstantiate->read();
//var_dump($getData);
if(isset($_REQUEST['del_id'])){
	$readInstantiate->delete($_REQUEST['del_id']);
	header("location : read.php");
}
?>
<table>
	<tr>
		<td>S.No.</td>
		<td>Name</td>
		<td>Address</td>
		<td>Phone</td>
		<td>Gender</td>
	</tr>
	<?php $i = 1; ?>
	<?php foreach($getData as $key => $value): ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $value["name"]; ?></td>
		<td><?php echo $value["address"]; ?></td>
		<td><?php echo $value["phone"]; ?></td>
		<td><?php echo $value["gender"]; ?></td>
		<td><a href="update.php?id=<?php echo $value["id"] ;?>" >Edit</a></td>
		<td><a href="read.php?del_id=<?php echo $value["id"] ;?>" >Delete</a></td>
	</tr>
<?php endforeach; ?>
</table>