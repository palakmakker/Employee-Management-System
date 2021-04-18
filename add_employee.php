<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"ems");
	$query = "insert into employees values('',$_POST[employee_id],'$_POST[name]','$_POST[father_name]',$_POST[department],'$_POST[mobile]','$_POST[email]','$_POST[password]','$_POST[salary]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Employee added successfully.");
	window.location.href = "admin_dashboard.php";
</script>
