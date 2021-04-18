<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
	
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
		}
		#left_side{
			height: 75%;
			width: 15%;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
		}
	</style>
	<?php
		session_start();
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ems");
	?>
</head>
<body>
	<div id="header"><br>
	
		<center>Employee Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
		<a href="logout.php">Logout</a>
		</center>
		
	</div>
	
	
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<input type="submit" name="search_employee" value="Search employee">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="edit_employee" value="Edit employee">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="add_new_employee" value="Add New employee">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="delete_employee" value="Delete employee">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show managers" value="Show Managers">
					</td>
				</tr>
			</table>
		</form>
	</div>
	
	<div id="right_side"><br><br>
	
	
	
		<div id="demo">
		

		<!-- #Code for search employee---Start-->
			<?php
				if(isset($_POST['search_employee']))
				{
					?>
					<center>
						
					<form action="" method="post">
					&nbsp;&nbsp;<b>Enter Employee ID:</b>&nbsp;&nbsp; <input type="text" name="employee_id">
					<input type="submit" name="search_by_employee_id_for_search" value="Search">
					</form><br><br>
					<h4><b><u>Employee Details</u></b></h4><br><br>
					</center>
					
					<?php
					
				}
				if(isset($_POST['search_by_employee_id_for_search']))
				{
					$query = "select * from employees where employee_id = '$_POST[employee_id]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<table>
							<tr>
								<td>
									<b>Employee ID:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['employee_id']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Father's Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['father_name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Department:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['department']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Mobile:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['mobile']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['email']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Password:</b>
								</td> 
								<td>
									<input type="password" value="<?php echo $row['password']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Salary:</b>
								</td> 
								<td>
									<textarea rows="3" cols="40" disabled><?php echo $row['salary']?></textarea>
								</td>
							</tr>
						</table>
						<?php
					}
				}
			?>
		<!-- #Code for edit employee details---Start-->
		<?php
			if(isset($_POST['edit_employee']))
			{
				?>
				<center>
				<form action="" method="post">
				&nbsp;&nbsp;<b>Enter Employee ID:</b>&nbsp;&nbsp; <input type="text" name="employee_id">
				<input type="submit" name="search_by_employee_id_for_edit" value="Search">
				</form><br><br>
				<h4><b><u>Employee Details</u></b></h4><br><br>
				</center>
				<?php
			}
			if(isset($_POST['search_by_employee_id_for_edit']))
			{
				$query = "select * from employees where employee_id = '$_POST[employee_id]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="admin_edit_employee.php" method="post">
						<table>
						<tr>
							<td>
								<b>Employee ID:</b>
							</td> 
							<td>
								<input type="text" name="employee_id" value="<?php echo $row['employee_id']?> " >
							</td>
						</tr>
	
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Department:</b>
							</td> 
							<td>
								<input type="text" name="department" value="<?php echo $row['department']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
							<b>Salary:</b>
							</td> 
							<td>
								<input type="salary" name="salary" value="<?php echo $row['salary']?>">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="edit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
		?>
		<!-- #Code for Delete employee details---Start-->
		<?php
			if(isset($_POST['delete_employee']))
			{
				?>
				<center>
				<form action="delete_employee.php" method="post">
				&nbsp;&nbsp;<b>Enter Employee ID:</b>&nbsp;&nbsp; <input type="text" name="employee_id">
				<input type="submit" name="search_by_employee_id_for_delete" value="Delete">
				</form><br><br>
				</center>
				<?php
			}
			?>

			<?php 
				if(isset($_POST['add_new_employee'])){
					?>
					<center><h4>Fill the given details</h4></center>
					<form action="add_employee.php" method="post">
						<table>
						<tr>
							<td>
								<b>Employee ID:</b>
							</td> 
							<td>
								<input type="text" name="employee_id" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Department:</b>
							</td> 
							<td>
								<input type="text" name="department" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Salary:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" placeholder="Optional" name="salary"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><br><input type="submit" name="add" value="Add Employee"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
			<?php
				if(isset($_POST['show_managers']))
				{
					?>
					<center>
						<h5>Mmanagers's Details</h5>
						<table>
							<tr>
								<td id="td"><b>ID</b></td>
								<td id="td"><b>Name</b></td>
								<td id="td"><b>Mobile</b></td>
								<td id="td"><b>Department</b></td>
							
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from managers";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td id="td"><?php echo $row['id']?></td>
								<td id="td"><?php echo $row['name']?></td>
								<td id="td"><?php echo $row['mobile']?></td>
								<td id="td"><?php echo $row['department']?></td>
								
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>
		</div>
	</div>
</body>
</html>