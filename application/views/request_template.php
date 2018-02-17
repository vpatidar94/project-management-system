
<?php //print_r($option_request); ?>
<div class="container-fluid">
        <div class="animated fadeIn">
		 
          <div class="row">
		 
		     <div class="col-sm-12 col-md-10">
              <div class="card">
                <div class="card-header">
                  <strong><?php echo $title; ?></strong>
                  
                </div>
                <div class="card-body">

					<h3> Hi, <?php echo $member_name; ?> </h3>
					<h6>We have new request for WebMedic</h6>
					<h6>About WebMedic: This is a website optimization company, we are looking to work with them on improving their website.
</h6>
					<h6>Special instructions: Please ask for the SSH key when you want to connect.
</h6>
					<h6><span>Request Description: </span><?php echo $description; ?> </h6>
					
				  <h6>Request Assets (<?php echo $num; ?>): 
</h6>
					
				 <?php  foreach($assest_name as $asst ) { ?>
				  
				  <h6><span><?php echo $asst[0]['assest_title']; ?>: </span><?php echo $asst[0]['assest_link']; ?></h6>
				  <h6><span>Description:</span><?php echo $asst[0]['description']; ?></h6>
				  <br>
				 <?php } //echo $k; ?>
                 
                  <h6>Thank You</h6>
                </div>
				
				<div class="card-footer">
         
        </div>
              </div>

            </div>
          
          </div>
		 
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>
    