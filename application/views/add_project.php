
<?php //print_r($query); ?>
      <div class="container-fluid">
        <div class="animated fadeIn">
		<form method="post" action="<?php echo base_url(); ?>add_project">
          <div class="row">
		  
		     <div class="col-sm-12 col-md-10">
              <div class="card">
                <div class="card-header">
                  <strong><?php echo $title; ?></strong>
                  <small>Form</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12 col-md-6">
						<center><span><h6><strong>Project Info</strong></h6><span></center>
                      <div class="form-group"><br>
                        <label for="project title">Project Title</label>
                        <input type="text" class="form-control" name="project_title" placeholder="Enter Project Title"> <br>
						  <label for="name">Project URL</label>
                        <input type="text" class="form-control" name="project_url" placeholder="Enter Project URL"><br>
						 <label for="name">Project CMS type</label>
                        <select class="form-control" name="cms_type">
                        <option disabled selected >---SELECT CMS Type---</option>
						<?php foreach($query as $rows){ ?>
                        <option value=" <?php echo $rows['id']; ?> "><?php echo $rows['name']; ?></option>
						<?php } ?>
                        
                      </select><br>
					  <label for="name">Enter Project Description</label>
                        <textarea class="form-control" name="project_description" placeholder="Enter Project Description"></textarea><br>
						<label for="name">Project Instructions</label>
                        <textarea class="form-control" name="project_instruction" placeholder="Enter Project Instructions"></textarea><br>
						 <select class="form-control" name="project_status">
                        <option disabled selected >---Project Status---</option>
						
                        <option value="pending">Pending</option>
						 <option value="running">Running</option>
						  <option value="completed">Completed</option>
					
                        
                      </select>
                      </div>

                    </div>
					 <div class="col-sm-12 col-md-6">
					<center><span><h6><strong>Logins</strong></h6><span></center>
<br>
                      <div class="form-group">
					   <label for="name">Admin Panel URL</label>
                        <input type="text" class="form-control" name="admin_url" placeholder="Enter Admin Panel URL"><br>
						 <label for="name">Admin username</label>
                        <input type="text" class="form-control" name="admin_username" placeholder="Enter Admin Username">
                       <br>
						 <label for="name">Admin Panel Password</label>
                        <input type="text" class="form-control" name="admin_password" placeholder="Enter Admin Panel Password"><br>
						 <label for="name">C Panel URL</label>
                        <input type="text" class="form-control" name="c_url" placeholder="Enter C Panel URL"><br>
						<label for="name">C Panel Username</label>
                        <input type="text" class="form-control" name="c_username" placeholder="Enter C Panel Username"><br>
						<label for="name">C Panel Password</label>
                        <input type="text" class="form-control" name="c_password" placeholder="Enter C Panel Password"><br>
						 <label for="name">FTP Server</label>
                        <input type="text" class="form-control" name="ftp_server" placeholder="Enter FTP Server"><br>
						<label for="name">FTP Username</label>
                        <input type="text" class="form-control" name="ftp_username" placeholder="Enter FTP Username"><br>
						<label for="name">FTP Password</label>
                        <input type="text" class="form-control" name="ftp_password" placeholder="Enter FTP Password"><br>
                      </div>

                    </div>

                  </div>
                  <!--/.row-->

				 <!--  <div class="row">

                    <div class="col-sm-12 col-md-6">

                      <!-- <div class="form-group">
                        <label for="name">Project URL</label>
                        <input type="text" class="form-control" name="project_url" placeholder="Enter Project URL">
                      </div> -->

                  <!--  </div>
					 <div class="col-sm-12 col-md-6">

                      <div class="form-group">
                        <label for="name">FTP Username</label>
                        <input type="text" class="form-control" name="ftp_username" placeholder="Enter FTP Username">
                      </div>

                    </div>

                  </div>
				  
				   
				  
                  <div class="row">

                    <div class="col-sm-12 col-md-6">

                 <!--     <div class="form-group">
                        <label for="name">Project CMS type</label>
                        <select class="form-control" name="cms_type">
                        <option disabled selected >---SELECT CMS Type---</option>
						<?php foreach($query as $rows){ ?>
                        <option value=" <?php echo $rows['id']; ?> "><?php echo $rows['name']; ?></option>
						<?php } ?>
                        
                      </select>
                      </div> -->

                <!--    </div>
					 <div class="col-sm-12 col-md-6">

                      <div class="form-group">
                        <label for="name">FTP Password</label>
                        <input type="text" class="form-control" name="ftp_password" placeholder="Enter FTP Password">
                      </div>

                    </div>

                  </div> -->
                  <!--/.row-->

			<!--	  <div class="row">

                    <div class="col-sm-12 col-md-6">

                       <div class="form-group">
                        <label for="name">C Panel URL</label>
                        <input type="text" class="form-control" name="c_url" placeholder="Enter C Panel URL">
                      </div>

                    </div>
					 <div class="col-sm-12 col-md-6">

                      <div class="form-group">
                        <label for="name">Admin Panel URL</label>
                        <input type="text" class="form-control" name="admin_url" placeholder="Enter Admin Panel URL">
                      </div>

                    </div>

                  </div> 
				  <div class="row">

                    <div class="col-sm-12 col-md-6">

                       <div class="form-group">
                        <label for="name">C Panel Username</label>
                        <input type="text" class="form-control" name="c_username" placeholder="Enter C Panel Username">
                      </div>

                    </div>
					 <div class="col-sm-12 col-md-6">

                      <div class="form-group">
                        <label for="name">Admin username</label>
                        <input type="text" class="form-control" name="admin_username" placeholder="Enter Admin Username">
                      </div>

                    </div>

                  </div>
				  
				  <div class="row">

                    <div class="col-sm-12 col-md-6">

                       <div class="form-group">
                        <label for="name">C Panel Password</label>
                        <input type="text" class="form-control" name="c_password" placeholder="Enter C Panel Password">
                      </div>

                    </div>
					 <div class="col-sm-12 col-md-6">

                      <div class="form-group">
                        <label for="name">Admin Panel Password</label>
                        <input type="text" class="form-control" name="admin_password" placeholder="Enter Admin Panel Password">
                      </div>

                    </div>

                  </div>
				  
			<!--	   <div class="row">

                    <div class="col-sm-12 col-md-6">

                       <div class="form-group">
                        <label for="name">Enter Project Description</label>
                        <textarea class="form-control" name="project_description" placeholder="Enter Project Description"></textarea>
                      </div>

                    </div>
					 <div class="col-sm-12 col-md-6">

                     <div class="form-group">
                        <label for="name">Project Instructions</label>
                        <textarea class="form-control" name="project_instruction" placeholder="Enter Project Instructions"></textarea>
                      </div>

                    </div>

                  </div> -->
				  
				   <!--  <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Project Status</label>
                        <select class="form-control" name="project_status">
                        <option disabled selected >---Project Status---</option>
						
                        <option value="pending">Pending</option>
						 <option value="running">Running</option>
						  <option value="completed">Completed</option>
					
                        
                      </select>
                      </div>

                    </div>
				

                  </div> -->
				  
                 
                  <!--/.row-->
                </div>
				
				<div class="card-footer">
          <input type="submit" class="btn btn-sm btn-primary fa fa-dot-circle-o" value="Add Project" name="submit">
         
        </div>
              </div>

            </div>
          
          </div>
		  </form>
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>

    