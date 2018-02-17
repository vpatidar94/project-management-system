<?php //print_r($request_assest_all); ?>
<div class="container-fluid">
        <div class="animated fadeIn">
		 <form method="post" action="<?php echo base_url(); ?>edit_request/<?php echo $rid; ?>">
          <div class="row">
		 
		     <div class="col-sm-12 col-md-10">
              <div class="card">
                <div class="card-header">
                  <strong><?php echo $title; ?></strong>
                  <small>Form</small>
                </div>
                <div class="card-body">

               
                  <!--/.row-->
				  
				  <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Select Project</label>
                        <select onchange="getAsset(this)" class="form-control" name="project" id="pro">
                        <option selected disabled>---SELECT Project---</option>
                        <?php foreach($query1 as $row) {
						?>
					   <option value="<?php echo $row['pid']; ?>" <?php if($project == $row['pid']) { echo "selected"; } ?>><?php echo $row['project_title']; ?></option>
					   <?php }?>
                      </select>
                      </div>

                    </div>
					</div>
					<div class="row">
					 <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Request Assests</label>
                        <select multiple class="form-control" name="request_assest[]" id="asset">
                        <option selected disabled>---SELECT Request Assests---</option>
						<?php foreach($request_assest_all as $asset) {  ?>
                        <option value="<?php echo $asset['aid']; ?>" <?php foreach($request_assest as $selassest) { if($asset['aid'] == $selassest ) { echo "selected"; } } ?> >
						
						<?php echo $asset['assest_title']; ?>
						
						
						</option>
						<?php } ?>
                      </select>
                      </div>

                    </div>

                  </div>
				  
				  
				  
				   
				  
                  <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Request Type</label>
                        <select class="form-control" name="request_type">
                        <option  value="<?php echo $request['name'];  ?>"  selected disabled>---SELECT Request Type---</option>
						<?php foreach($option_request as $request) { ?>
                        <option value="<?php echo $request['id']; ?>" <?php if($request_type == $request['id']) { echo "selected"; } ?>><?php echo $request['name'];  ?></option>
                        <?php } ?>
                      </select>
                      </div>

                    </div>
					</div>
					
							 <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Member Name</label>
                        <select class="form-control" name="member_name">
                        <option selected disabled>--Select Member---</option>
						<?php foreach($option_member as $memb) {
								?>
                        <option value="<?php echo $memb['mid']; ?>" <?php if($member_name == $memb['mid'] ) { echo "selected"; } ?> ><?php echo $memb['member_name']; ?></option>
						<?php } ?>
                     
                      </select>
                      </div>

                    </div>
					</div>
					
					
					
					 <div class="row">
					 <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Request Title</label>
                        <input type="text" class="form-control" value="<?php echo $request_title; ?>" name="request_title" placeholder="Enter Request Title">
                      </div>

                    </div>

                  </div>
                  <!--/.row-->

				 
				 
				  
				  
				  
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Request Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Request Description"><?php echo $description ?></textarea>
                      </div>

                    </div>
					 

                  </div>
				  
                 	   <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Request Status</label>
                        <select class="form-control" name="request_status">
                        <option selected disabled>--Select Request Status---</option>
						
                        <option  <?php if($request_status == 'In Progress' ) { echo "selected"; } ?> value="In Progress">In Progress</option>
						<option <?php if($request_status == 'Pending' ) { echo "selected"; } ?> value="Pending"> Pending </option>
                     
                      </select>
                      </div>

                    </div>
					</div>
                  <!--/.row-->
                </div>
				
				<div class="card-footer">
          <input type="submit" name="submit" class="btn btn-sm btn-primary fa fa-dot-circle-o" value="Add Request">
        </div>
              </div>

            </div>
          
          </div>
		  </form>
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script>
	// jQuery(document).ready(function(){
		// alert("hi");
		// var k = $("#pro").val();
		alert(k);
		
		// });
function getAsset(obj) {
	$('#asset').children('option:not(:first)').remove();
	var option = obj.value;
	//alert(option);
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>/getassetoption",
		data: {option: option},
		success: function(data) {
		
			//alert(data);
			var a = JSON.parse(data);
			for(var i= 0 ; i<= a.length ; i++ )
			{
				//JSONObject object = array.getJSONObject(i);
				//console.log(object);
				//console.log(a[i].assest_type);
				$("#asset").append("<option value="+a[i].aid+"> "+a[i].assest_title+" </option>");
				
			}
			// var res = $.parseJSON(data);
			// alert(res.result)			
		}
	});
}

</script>