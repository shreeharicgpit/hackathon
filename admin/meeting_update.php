<?php include('header.php');
      include('connect.php');
?>
<?php
$meeting_code=$_SESSION['meeting_code'];
$sql=mysqli_query($conn,"select * from meeting where meeting_code='$meeting_code'");
$result=mysqli_fetch_assoc($sql);

?>

        <div class="right_col" role="main">
          <div class="">
            <div class="row">

              <h1>Update Meeting</h1>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <h5>meeting code : <?php echo $_SESSION['meeting_code']; ?></h5>


                                            <!-- start form for validation -->
             <form id="demo-form" data-parsley-validate method="post" method="post">
                                            <label for="Meeting Title">Meeting Title*:</label>
                                              <input type="text" id="meet_title" class="form-control" name="meeting_title" value="<?php echo $result['title'] ?>" required />
                                              <label for="Meeting Description">Meeting Description :</label>
                                                  <input id="meet_description" required class="form-control" name="meeting_description" value="<?php echo $result['description']; ?>">
                                                  
                                              <label for="meeting_time">Meeting Date* :</label>
                                              <input type="text" id="meeting_date" class="form-control" name="meeting_start_time" value="<?php echo $result['date'];?>" required />
                                            <label for="meeting_time">Meeting Time* :</label>
                                              <input type="text" id="meeting_start_time" class="form-control" name="meeting_start_time" value="<?php echo $result['time'];?>" required />

                                                    <label for="place">Place * :</label>
                                              <input type="text" id="place" class="form-control" name="place" value="<?php echo $result['venue'];?>" required />




                                             </form>
                                          </div>

                 </div>
           </div>
         </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">

                  <div class="x_content">
                    <table class="table table-bordered">
						<caption><h2>Invite User</h2></caption>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Designation</th>
                          <th>Department</th>
                          <th>Email</th>
                          <th>Phone No</th>
                          <th>Invited</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Keyur</td>
                          <td>Directorate</td>
                          <td>IT</td>
                          <td>keyurchandpara1@gmail.com</td>
                          <td>9537118985</td>
                          <td><input type="checkbox" name="chk[]" checked></td>
                        </tr>
                      </tbody>
                    </table>
                    </br>
                                              <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                  <button type="submit" value="back" name="back" class="btn btn-success">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <button type="submit" value="update" name="update" class="btn btn-success">Update</button>
                                                </div>
                                              </div>

                  </div>

            </div>
          </div>

       </div>
<?php include('footer.php');?>
