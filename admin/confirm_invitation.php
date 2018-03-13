<?php
include('header.php');
include('connect.php');
?>
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-bordered">
						<caption><h2>Invite User</h2></caption>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Designation</th>
                          <th>Department</th>
                          <th>Email</th>
                          <th>Phone No</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Directorate</td>
                          <td>IT</td>
                          <td>keyurchandpara1@gmail.com</td>
                          <td>9537118985</td>
                        </tr>
                      </tbody>
                    </table>
                    </br>
                                              <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                  <button type="submit" value="back" name="back" class="btn btn-success">Back</button>
                                                </div>
                                              </div>

                  </div>

            </div>
          </div>
        </div>
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <h2>Message</h2>


                                            <!-- start form for validation -->
             <form id="demo-form" data-parsley-validate method="post">
                                            <label for="Meeting Title">Meeting Title*:</label>
                                              <input type="text" id="meet_title" class="form-control" name="meeting_title" required />
                                            <label for="meeting_time">Meeting Time* :</label>
                                              <input type="text" id="meeting_start_time" class="form-control" name="meeting_start_time" required />
                                            <label for="place">Place * :</label>
                                              <input type="text" id="place" class="form-control" name="place" required />
                                            <label for="Meeting Description">Meeting Description :</label>
                                                  <textarea id="meet_description" required class="form-control" name="meeting_description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                    data-parsley-validation-threshold="10"></textarea>
                                                    </br>
                                              <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                  <button type="submit" value="Send Invitation" name="confirm" class="btn btn-success">Send Invitation</button>
                                                </div>
                                              </div>

                                             </form>
                                          </div>

                 </div>
           </div>
         </div>
       </div>
<?php include('footer.php');?>
