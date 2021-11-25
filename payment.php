<?php
include('db.php');
if(isset($_POST['pay_id']) && isset($_POST['amount']) && isset(['name'])){
	$pay_id=$_POST['pay_id'];
	$amount=$_POST['amount'];
	$name=$_POST['name'];
	
	$query="INSERT INTO razorpay(`name`,`amount`,`pay_id`,`pay_status`) VALUES('$name','$amount','$pay_id','Success')";
	mysqli_query($con,$query);
}
?>