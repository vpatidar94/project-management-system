

      <div class="container-fluid">
        <div class="animated fadeIn">
		<form method="post" action="<?php echo base_url();?>edit_asset/<?php echo $aid; ?>">
          <div class="row">
		  
		     <div class="col-sm-12 col-md-8">
              <div class="card">
                <div class="card-header">
                  <strong><?php echo $title; ?></strong>
                  <small>Form</small>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Select Project</label>
                        <select class="form-control" name="project">
                        <option selected disabled>---SELECT Project---</option>
                       <?php foreach($query1 as $row) {
						?>
					   <option value="<?php echo $row['pid'] ?>" <?php if($project == $row['pid'] ) { echo "selected"; } ?>> <?php echo $row['project_title']; ?> </option>
					   <?php } ?>
                      </select>
                      </div>

                    </div>

                  </div>
                  <!--/.row-->
   <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Asset Type</label>
                       <input type="text" class="form-control" value="<?php echo $assest_type; ?>" name="assest_type" placeholder="Enter Asset Type">
                      </div>

                    </div>

                  </div>
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Asset Title</label>
                        <input type="text" class="form-control" value="<?php echo $assest_title; ?>" name="assest_title" placeholder="Enter Asset Title">
                      </div>

                    </div>
					 

                  </div>
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Asset Link</label>
                        <input type="text" class="form-control" value="<?php echo $assest_link; ?>" name="assest_link" placeholder="Enter Asset Link">
                      </div>

                    </div>
					 

                  </div>
				   
				  
                
                  <!--/.row-->

				  

				  

				  
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Asset Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Asset Description"><?php echo $description; ?> </textarea>
                      </div>

                    </div>
					

                  </div>
				  
                 
                  <!--/.row-->
                </div>
				
				<div class="card-footer">
          <input type="submit" class="btn btn-sm btn-primary fa fa-dot-circle-o" value="Add Asset">
          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
        </div>
              </div>

            </div>
          
          </div>
		  </form>
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>

    