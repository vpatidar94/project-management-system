<?php //print_r($query); die;  ?>
<div class="container-fluid">
        <div class="animated fadeIn">
		 <form method="post" action="<?php echo base_url(); ?>add_request">
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
                        <select onchange="getAsset(this)" class="form-control" name="project">
                        <option selected disabled>---SELECT Project---</option>
                        <?php foreach($query as $row) {
							?>
					   <option value="<?php echo $row['pid']; ?>"><?php echo $row['project_title']; ?></option>
					   <?php } ?>
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
						
                      </select> 
                      </div>

                    </div>

                  </div>
				  
				  
				  
				   
				  
                  <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Request Type</label>
                        <select class="form-control" name="request_type">
                        <option selected disabled>---SELECT Request Type---</option>
						<?php foreach($option_request as $rows) { ?>
                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
						<?php } ?>
                     
                      </select>
                      </div>

                    </div>
					</div>
					
					
					 <div class="row">

                    <div class="col-sm-12 col-md-11">

                      <div class="form-group">
                        <label for="name">Member Name</label>
                        <select class="form-control" name="member_name">
                        <option selected disabled>--Select Member---</option>
						<?php foreach($option_member as $memb) {
								?>
                        <option value="<?php echo $memb['mid']; ?>"><?php echo $memb['member_name']; ?></option>
						<?php } ?>
                     
                      </select>
                      </div>
				

                    </div>
					</div>
					
					 <div class="row">
					 <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Request Title</label>
                        <input type="text" class="form-control" name="request_title" placeholder="Enter Request Title">
                      </div>

                    </div>

                  </div>
                  <!--/.row-->

				 
				 
				  
				  
				  
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Request Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Request Description"></textarea>
                      </div>

                    </div>
					 

                  </div>
				  
				  
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Request Status</label>
                        <select class="form-control" name="request_status">
                        <option selected disabled>--Select Request Status---</option>
						
                        <option value="In Progress">In Progress</option>
						<option value="Pending"> Pending </option>
                     
                      </select>
                      </div>

                    </div>
					</div>
                 
                  <!--/.row-->
                </div>
				
				<div class="card-footer">
          <input type="submit" name="submit" class="btn btn-sm btn-primary fa fa-dot-circle-o" value="Add Request">
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
<script>
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
				console.log(a[i].assest_type);
				console.log(a[i].aid);
				$("#asset").append("<option value="+a[i].aid+"> "+a[i].assest_type+" </option>");
				
			}
			// var res = $.parseJSON(data);
			// alert(res.result)			
		}
	});
}
</script>
    