<?php

 include('header.php');
  include('connect.php');


  if(isset($_POST['Invite']))
  {
  	$meeting_date=$_POST['meeting_date'];
  	$meeting_start_time=$_POST['meeting_start_time'];
  	$meeting_title=$_POST['meeting_title'];
  	$meeting_description=$_POST['meeting_description'];
  	$meeting_keypoints=$_POST['meeting_keypoints'];
  	$place=$_POST['place'];
  	$state=$_POST['state'];
  	$city=$_POST['city'];
     $date=date("Y-m-d");
   $expire_time = strtotime($date);
  $today_time = strtotime($meeting_date);
  	if($today_time < $expire_time)
  	{
  		$status="Completed";
  	}
  	else {
  		$status="Upcoming";
  	}
  	 $sql="insert into meeting(title,description,date,time,status,keypoint)values('$meeting_title','$meeting_description','$meeting_date','$meeting_start_time','$status','$meeting_keypoints')";
  	$result=mysqli_query($conn,$sql) or die("error in insert");
  }
?>


        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>User Directory</h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Search By </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                   <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Grouped</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select class="select2_group form-control">
                                <optgroup label="DEPARTMENT OF ADHAR">
                                  <option value="AK">head</option>
                                  <option value="HI">member</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                  <option value="CA">California</option>
                                  <option value="NV">Nevada</option>
                                  <option value="OR">Oregon</option>
                                  <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                  <option value="AZ">Arizona</option>
                                  <option value="CO">Colorado</option>
                                  <option value="ID">Idaho</option>
                                  <option value="MT">Montana</option>
                                  <option value="NE">Nebraska</option>
                                  <option value="NM">New Mexico</option>
                                  <option value="ND">North Dakota</option>
                                  <option value="UT">Utah</option>
                                  <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                  <option value="AL">Alabama</option>
                                  <option value="AR">Arkansas</option>
                                  <option value="IL">Illinois</option>
                                  <option value="IA">Iowa</option>
                                  <option value="KS">Kansas</option>
                                  <option value="KY">Kentucky</option>
                                  <option value="LA">Louisiana</option>
                                  <option value="MN">Minnesota</option>
                                  <option value="MS">Mississippi</option>
                                  <option value="MO">Missouri</option>
                                  <option value="OK">Oklahoma</option>
                                  <option value="SD">South Dakota</option>
                                  <option value="TX">Texas</option>
                                  <option value="TN">Tennessee</option>
                                  <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                  <option value="CT">Connecticut</option>
                                  <option value="DE">Delaware</option>
                                  <option value="FL">Florida</option>
                                  <option value="GA">Georgia</option>
                                  <option value="IN">Indiana</option>
                                  <option value="ME">Maine</option>
                                  <option value="MD">Maryland</option>
                                  <option value="MA">Massachusetts</option>
                                  <option value="MI">Michigan</option>
                                  <option value="NH">New Hampshire</option>
                                  <option value="NJ">New Jersey</option>
                                  <option value="NY">New York</option>
                                  <option value="NC">North Carolina</option>
                                  <option value="OH">Ohio</option>
                                  <option value="PA">Pennsylvania</option>
                                  <option value="RI">Rhode Island</option>
                                  <option value="SC">South Carolina</option>
                                  <option value="VT">Vermont</option>
                                  <option value="VA">Virginia</option>
                                  <option value="WV">West Virginia</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>


                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Phone_no</th>
                            <th class="column-title">Department</th>
                            <th class="column-title">Designation</th>
                            <th class="column-title no-link last">Action
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                              $sql=mysqli_query($conn,"select * from directory")or die("Error in Select Query1");

                                while($row=mysqli_fetch_assoc($sql))
                                {
                              ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo $row['name']; ?></td>
                            <td class=" "><?php echo $row['email']; ?></td>
                            <td class=" "><?php echo $row['mobile']; ?></td>
                            <td class=" "><?php echo $row['department']; ?></td>
                            <td class=" "><?php echo $row['designation']; ?></td>
                            <td class=" last">
                            <a href="view_profile.php?id=<?php echo $row['user_id'];?>" class="fa fa-eye">&nbsp;View &nbsp;&nbsp;</a>
                            <a href="view_profile.php?id=<?php echo $row['user_id'];?>" class="fa fa-edit">&nbsp;Update&nbsp;&nbsp;</a>
                            <a href="view_directory.php?delete_id=<?php echo $row['user_id']?>" onclick="return confirm('Are you sure?')" class="fa fa-trash">&nbsp;Delete</a>
                            </td>
                            </td>
                          </tr>
                          <?php
                            }
                          
                          ?>
                        </tbody>
                      </table>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include('footer.php'); ?>
<?php
if(isset($_GET['delete_id']))
{
        $id=$_GET['delete_id'];
        $result=mysqli_query($conn,"delete from directory where user_id='$id'");
        header("location:view_directory.php");
   

}

?>