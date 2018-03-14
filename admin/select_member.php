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
    echo $sql1="select * from meeting where title='$meeting_title' and description='$meeting_description' and date='$meeting_date' and time='$meeting_start_time'and status='$status'and keypoint='$meeting_keypoints' ";
     $result1=mysqli_query($conn,$sql1);
     $row=mysqli_fetch_assoc($result1);
  	 $code=$row['meeting_code'];
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Grouped



                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
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
                               
                               
                              </select>

                            </div>
                          </div>
                   <div class="form-group">
                          
                            <div class="col-md-4 col-sm-4 col-xs-12">
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
                               
                               
                              </select>

                            </div>
                          </div>


                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              
                                <input type="checkbox" id="check-all" class="select" >

                          
                              
                            </th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Phone_no</th>
                            <th class="column-title">Department</th>
                            <th class="column-title">Designation</th>
                            <?php if(!isset($_POST['Invite'])){?>
                            <th class="column-title no-link last">Action
                            </th>
                          <?php } ?>
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
                              <input type="checkbox" class="record" value="<?=$row['user_id']?>" name="table_records">
                            </td>
                            <td class=" "><?php echo $row['name']; ?></td>
                            <td class=" "><?php echo $row['email']; ?></td>
                            <td class=" "><?php echo $row['mobile']; ?></td>
                            <td class=" "><?php echo $row['department']; ?></td>
                            <td class=" "><?php echo $row['designation']; ?></td>

                            <?php if(!isset($_POST['Invite'])):?>
                            <td class=" last"><a href="#"class="fa fa-eye">&nbsp;View &nbsp;&nbsp;</a><a href="#" class="fa fa-edit">&nbsp;update&nbsp;&nbsp;</a><a href="#"class="fa fa-trash">&nbsp;delete</a></td>
                            </td>
                          <?php endif;?>
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
             <ul class="pager">
                      <li><a href="#">Previous</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">Next</a></li>
                    </ul>

                   <?php if(isset($_POST['Invite'])):?>
                              <form action="confirm_invitation.php" method="post">
                            <input type="hidden" value="" id="checkvalue" name="selected">
                            <input type="text" value="<?=$code?>"  name="meeting_code">
                            <input type="submit" name="submit" value="next" class="btn btn-success"
                            style="float:right">
                          </form><?php endif;?> 
          </div>
        </div>
<?php include('footer.php'); ?>



<script type="text/javascript">

  

  
  $(document).ready(function(){

    
    $(".record").click(function(){

      
     
var val=new Array();

      $('.record:checked').each(function(){
       val.push($(this).val());
      });
      var count=0;
      $('.record:not(:checked)').each(function(){
        count++;
      });
     
      if(count!=0)
      {
        $('#check-all').removeAttr('checked');
       
      }
      if(count==0)
      {
       
        $('#check-all').prop('checked',true);
        
      }

      $("#checkvalue").val(val);

    });


    $('#check-all').click(function(){

     
       if($('#check-all').is(":checked"))
      {
          $(".record").each(function(){
              $(this).prop('checked',true);
          });
          var val=new Array();
      $('.record:checked').each(function(){

        val.push($(this).val());
       $("#checkvalue").val(val);

        
      });

     
      }
      else
      {
          $(".record").each(function(){
              $(this).removeAttr('checked');
              $("#checkvalue").val(val);
          });

      }
    });


  });

</script>