<?php
include('header.php');
include('connect.php');
?>
<?php
  if(isset($_POST('meeting_code')))
  {
    $meeting_code=$_POST['meeting_code'];
    $sql=mysqli_query($conn,"SELECT * FROM meeting WHERE '$meeting_code' IN (SELECT meeting_code FROM meeting)");
    if($sql)
    {


    }
    else {
      echo "error in fetch";
    }
  }


?>
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                    <div class="x_panel" style="">
                        <div class="x_title">
                            <h2>Enter Meeting code</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="container">
                                <div class="row">

                                    <form method="post">

                                    <div class='col-sm-4'>
                                      <div class="form-group">

                                        <input type="text" class="form-control" name="meeting_code">

                                    </div>
                                  </div>


                                                  <br>
                                                <div class="form-group">

                                                  <input type="submit" value="Search" name="submit" class="btn btn-success">

                                              </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

              </div>
            </div>
          </div>
        </div>
