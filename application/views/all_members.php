

      <div class="container-fluid">
        <div class="animated fadeIn">
        

     

          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> <?php echo $title; ?>
				  <div style="float:right;">
				<!--  <form class="form-inline" role="form" action="<?php echo base_url();?>searching" method="post">
       <div class="form-group">
           <input type="text" class="form-control" name="search" placeholder="Search by firstname">
       </div>
	    <div class="form-group">
<button type="submit" class="btn btn-info" name="submit" >Search</button>
       </div>
   </form> -->
   </div>
                </div>
                <div class="card-body">
                  <table id="example" class="table table-responsive-sm table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th>SNO</th>
						 <th>Member Name</th>
						  <th>Member  Email</th>
						   <th>Member Type</th>
						     <th>Member Profile</th>
						   <th>Action</th>
						   <!--  <th>Assest Description</th>
								 <th>FTP Username</th>
                        <th>FTP Password</th>
                        <th>CPanel URL</th>
                        <th>CPanel Username </th>
						 <th>CPanel Password</th>
						  <th>Admin Panel URL</th>
						   <th>Admin Username</th>
						    <th>Admin Password</th>
						 <th>Username</th>
							  <th>Username</th> -->
                      </tr>
                    </thead>
                    <tbody>
					<?php $i= 0; 
					foreach($query as $row ){  
					$i++;
					?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['member_name']; ?></td>
                        <td><?php echo $row['member_email']; ?></td>
                        <td><?php echo $row['member_type_name']; ?></td>
						<td><?php echo $row['member_profile']; ?></td>
						<td><div class="btn-group"><a style="color:white;" class= "btn btn-info" href="<?php echo base_url(); ?>editmember/<?php echo $row['mid']; ?>">Edit</a></div></td>
						
                      </tr>
             <?php }  ?>
                    </tbody>
                  </table>
              	 <ul class="pagination"><?php echo $links; ?></ul>
                </div>
              </div>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>
	