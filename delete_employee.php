<script type="text/javascript">
	if(confirm("Are you sure want to delete ?"))
	{
		document.write("<?php 
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ems");
		$query = "delete from employees where employee_id = $_POST[employee_id]";
		$query_run = mysqli_query($connection,$query);
		?>");
	 	window.location.href = "admin_dashboard.php";
	}
	else
	{
		window.location.href = "admin_dashboard.php";
	}
	
	alert("Details Deleted successfully.");
	window.location.href = "admin_dashboard.php";

</script>
