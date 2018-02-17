
<style>
#table-project  {
	overflow: auto !important;
}
</style>
      <div class="container-fluid">
        <div class="animated fadeIn">
        

     

          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> <?php echo $title; ?>
                </div>
                <div class="card-body" id="table-project">
                  <table  class="table table-responsive-sm table-bordered table-striped table-sm">
                    <thead>
                      <tr>
					  <th>Project Id</th>
                       			 <th>Project Title</th>
             
			
						<!--   <th>Project URL</th>
						   <th>Project CMS Type</th>
						    <th>FTP Server</th>
							 <th>FTP Username</th>
                        <th>FTP Password</th>
                        <th>CPanel URL</th>
                        <th>CPanel Username </th>
						 <th>CPanel Password</th>
						  <th>Admin Panel URL</th>
						   <th>Admin Username</th>
						    <th>Admin Password</th>
							 <th>Project Status</th> -->
							 <th>Action</th>
							  <!-- <th>Username</th> -->
                      </tr>
                    </thead>
                    <tbody>
					<?php $i= 0; 
					foreach($query as $row ){  
					$i++;
					?>
                      <tr>
                        <td><?php echo $row['pid']; ?></td>
                        <td><?php echo $row['project_title']; ?></td>
                        
                        <!-- <td><?php echo $row['project_url']; ?></td>
                        <td><?php echo $row['cms_type']; ?></td>
						<td><?php echo $row['ftp_server']; ?></td>
						<td><?php echo $row['ftp_username']; ?></td>
						<td><?php echo $row['ftp_password']; ?></td>
						<td><?php echo $row['c_url']; ?></td>
						<td><?php echo $row['c_username']; ?></td>
						<td><?php echo $row['c_password']; ?></td>
						<td><?php echo $row['admin_url']; ?></td>
						<td><?php echo $row['admin_username']; ?></td>
						<td><?php echo $row['admin_password']; ?></td>
						<td><?php echo $row['project_status']; ?></td> -->
						<td><a class="btn btn-info" href="<?php echo base_url() ?>editproject/<?php echo $row['pid']; ?>">Edit</a></td>
						<!-- <td>Member</td>
						<td>Member</td> -->
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
	