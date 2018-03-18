<?php
	include('connect.php');
	include('header.php');
	$flag=0;
	$result_user="";
	$row_user="";
	$meeting_res="";
	
	$sql1="";
	$result1="";
	$row_meeting=array();
	$temp=array();
	if(isset($_POST['meeting_id']))
	{
		$m_id=$_POST['meeting_id'];
		$result_user=mysqli_query($conn,"select user_id from attendance where meeting_code='$m_id'");
		
		$meeting_res=mysqli_query($conn,"select * from meeting where meeting_code='$m_id'");
		$row_meeting=mysqli_fetch_assoc($meeting_res);
		
	}
?>





<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
          	<div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="x_panel">
	              
	              	
	              			<form method="POST" class="form-group row" action="meeting_temp.php">
							  <div class="col-xs-3">
												<h3>Enter Meeting Id:</h3>
											    <input class="form-control" name="meeting_id" type="text">
											  </div>
							<div>
							<input type="submit" class="btn btn-md" name="submit" value="submit">
							</div>

						</form>
						<br>
						<br>
						
						<?php
							if(isset($_POST['meeting_id']))
								{
									echo "<h1>Meeting Details:</h1>";
							echo "<h4><strong>Title : </strong> " . $row_meeting['title'] . "</h4>";
							echo "<h4><strong>Description : </strong> " . $row_meeting['description'] . "</h4>";
							echo "<h4><strong>Date : </strong> " . $row_meeting['date'] . "</h4>";
							echo "<h4><strong>Time : </strong> " . $row_meeting['time'] . "</h4>";
						}
						?>

						
						<table class="table table-responsive table-striped table-bordered table-hover">
						<?php
							if(isset($_POST['meeting_id'])){
								echo "<tr>";
								echo "<th>User Id</th>";
								echo "<th>Name</th>";
								echo "<th>Designation</th>";
								echo "<th>Email</th>";
								echo "<th>Mobile No.</th>";
								echo "<th>State</th>";
								echo "<th>Department</th>";
								echo "<th>Attendance</th>";
								echo "<th>Password</th>";
								echo "<th>Gender</th>";
								echo "<th>Address</th>";
								echo "<th>Profile Pic</th>";
								echo "</tr>";
								while($row_user=mysqli_fetch_assoc($result_user)){
									$user_id=$row_user['user_id'];
									$sql1=mysqli_query($conn,"select * from directory where user_id='$user_id'");
									$result1=mysqli_fetch_assoc($sql1);
									
									$status=mysqli_query($conn,"select status from attendance where user_id='$user_id' and meeting_code='$m_id'");
									$res_status=mysqli_fetch_assoc($status);
									if($res_status['status']==0)
										echo "<tr class=\"danger\">";
									else
										echo "<tr class=\"success\">";
									foreach ($result1 as $key => $value) {
										echo "<td>";
										if($key=="attendance"){
											if($res_status['status']==0)
												echo "Absent";
											else 
												echo "Present";
										}
										else{											
											echo "$value";
										}
										echo "</td>";
									}
									echo "</tr>";
								  }
									
							} 
						?>
						</table>

	              			</div>
	              		</div>
	              	
	              
	      		</div>
        	</div>
    	</div>
    </div>
</div>
<?php 
include('footer.php');
?>














	