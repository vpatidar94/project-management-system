<!-- Main content -->
    <?php //print_r($query); ?> 

      <div class="container-fluid">
        <div class="animated fadeIn">
		<form method="post" action="<?php echo base_url();?>add_asset">
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
                       <?php foreach($query as $row) {
							?>
					   <option value="<?php echo $row['pid']; ?>"><?php echo $row['project_title']; ?></option>
					   <?php } ?>
                      </select>
                      </div>

                    </div>

                  </div>
                  <!--/.row-->
   <div class="row">

                  <!--  <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Asset Type</label>
						<input type="text" class="form-control" name="assest_type" placeholder="Enter Asset Type">
                       
                      </div>

                    </div> -->

                  </div>
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Asset Name</label>
                        <input type="text" class="form-control" name="assest_title" placeholder="Enter Asset Name">
                      </div>

                    </div>
					 

                  </div>
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Asset Link</label>
                        <input type="text" class="form-control" name="assest_link" placeholder="Enter Asset Link">
                      </div>

                    </div>
					 

                  </div>
				   
				  
                
                  <!--/.row-->

				  

				  

				  
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Assest Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Assest Description"></textarea>
                      </div>

                    </div>
					

                  </div>
				  
                 
                  <!--/.row-->
                </div>
				
				<div class="card-footer">
          <input type="submit" class="btn btn-sm btn-primary fa fa-dot-circle-o" value="Add Assest">
          
        </div>
              </div>

            </div>
          
          </div>
		  </form>
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>

    