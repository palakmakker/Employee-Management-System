<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"ems");
	$query = "update employees set name='$_POST[name]',father_name='$_POST[father_name]',department='$_POST[department]',mobile='$_POST[mobile]',email='$_POST[email]',password='$_POST[password]',salary='$_POST[salary]' where employee_id=$_POST[employee_id]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "admin_dashboard.php";
</script>


