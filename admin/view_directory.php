<?php //include('header.php');
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
   $sql="select * from directory where 1=1";
  if(isset($_POST['search']))
  {
    @$department=$_POST['department'];
    @$designation=$_POST['designation'];
    if(!empty($designation))
    {
      $sql.= " and designation = '$designation'";
    }
    if(!empty($department))
    {
      $sql.= " and department = '$department'";
    }
    echo $sql;
  }

    $result=mysqli_query($conn,$sql);

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
                  <form method="post">
                   <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select class="select2_group form-control" name="department">

                                  <option value="" disabled selected>Select Department</option>
                                  <option value="IT">Information Technology</option>
                                  <option value="Agriculture">Agriculture</option>
                                  <option value="Communication">Communication</option>
                              </select>
                              <select class="select2_group form-control" name="designation">

                                  <option value="" disabled selected>Select Designation</option>
                                  <option value="Directorate">Directorate</option>
                                  <option value="Commissionarate">Commissionarate</option>
                                  <option value="Corporate">Corporate</option>
                              </select>
                            </br>
                              <input type="submit" name="search" value="Search" class="btn-success">

                            </div>
                          </div>
                        </form>

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

                                while($row=mysqli_fetch_assoc($result))
                                {
                              ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo @$row['name']; ?></td>
                            <td class=" "><?php echo @$row['email']; ?></td>
                            <td class=" "><?php echo @$row['mobile']; ?></td>
                            <td class=" "><?php echo @$row['department']; ?></td>
                            <td class=" "><?php echo @$row['designation']; ?></td>
                            <td class=" last"><a href="#"class="fa fa-eye">&nbsp;View &nbsp;&nbsp;</a><a href="#" class="fa fa-edit">&nbsp;update&nbsp;&nbsp;</a><a href="#"class="fa fa-trash">&nbsp;delete</a></td>
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
