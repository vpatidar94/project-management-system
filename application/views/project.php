 <?php //print_r($allprojects); ?>

      <div class="container-fluid">

        <div class="animated fadeIn">
		<h3>Statistics </h3>
          <div class="row">
		  
            <div class="col-sm-6 col-lg-6">
              <div class="card text-white bg-primary">
                <div class="card-body pb-0">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>addproject">Add New Project</a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>viewproject">View all projects</a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>last_project">View last project</a>
                    </div>
                  </div>
                  <h2 class="mb-0"><?php echo $query[0]['count(*)']; ?></h2>
                  <h4>Projects</h4>
                </div>
               <!-- <div class="chart-wrapper px-3" style="height:70px;">
                  <canvas id="card-chart1" class="chart" height="70"></canvas>
                </div> -->
              </div>
            </div>
    
    

            <div class="col-sm-6 col-lg-6">
              <div class="card text-white bg-danger">
                <div class="card-body pb-0">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>addrequest">Add new task</a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>viewrequest">View all tasks</a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>last_task">View last task</a>
                    </div>
                  </div>
                  <h2 class="mb-0"><?php echo $all_task; ?></h2>
                  <h4>Open tasks</h4>
                </div>
               <!-- <div class="chart-wrapper px-3" style="height:70px;">
                  <canvas id="card-chart4" class="chart" height="70"></canvas>
                </div> -->
              </div>
            </div>
            <!--/.col-->
          </div>
        

          <div class="row">
            <div class="col-md-12">
              <div class="card">
               <!-- <div class="card-header">
                  Traffic &amp; Sales
                </div> -->
                <div class="card-body">
                 
				  
				  
				  
				  
				  
				  
				  <!--/.row-->
                  <br>
				  <h3>Quick Access</h3>
                  <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                      <tr>
                     
                        <th>Project Id</th>
						 <th>Project Name</th>
                        <th>Project Status</th>
                        <th>Action</th>
                        <!-- <th class="text-center">Payment Method</th>
                        <th>Activity</th> -->
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach($allprojects as $row) { ?>
                      <tr>
                        <td>
                         <?php echo $row['pid']; ?>
                        </td>
                        <td>
                            <?php echo $row['project_title']; ?>
                        </td>
                        <td>
                            <?php echo $row['project_status']; ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url(); ?>/editproject/<?php echo $row['pid']; ?>">view/Edit</a>
						  
                        </td>
                      
                      </tr>
                     <?php } ?>
                   
                  
                        
                    </tbody>
                  </table>
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