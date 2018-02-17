
<?php //print_r($project_title); ?>
      <div class="container-fluid">
        <div class="animated fadeIn">
        

     

          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> <?php echo $title; ?>
                </div>
                <div class="card-body">
                  <table id="example" class="table table-responsive-sm table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th>SNO</th>
						 <th>Project Title</th>
						  <th>Asset Type</th>
						   <th>Asset Title</th>
						      <th>Asset Link</th>
						    <th>Asset Description</th>
							<th>Action</th>
								 <!-- <th>FTP Username</th>
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
					foreach($query as $row){  
					$i++;
					?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['project_title_name']; ?></td>
                        <td><?php echo $row['assest_type']; ?></td>
                        <td><?php echo $row['assest_title']; ?></td>
						<td><?php echo $row['assest_link']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td>
						<a class="btn btn-info" href="<?php echo base_url(); ?>editasset/<?php echo $row['aid']; ?>">Edit</a> 
						<a class="btn btn-success" href="http://<?php echo $row['assest_link']; ?>"target="blank" >View</a>
						</td>
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
	