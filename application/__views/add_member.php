

      <div class="container-fluid">
        <div class="animated fadeIn">
		<form method="post" action="<?php echo base_url() ?>add_member">
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
                        <label for="name">Member Name</label>
                        <input type="text" class="form-control" name="member_name" placeholder="Enter Member Name">
                      </div>

                    </div>
					 

                  </div>
				  
				   <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Member Email</label>
                        <input type="email" class="form-control" name="member_email" placeholder="Enter Member Email">
                      </div>

                    </div>
					 

                  </div>
				  
				  <div class="row">

                    <div class="col-sm-12 col-md-12">

                       <div class="form-group">
                        <label for="name">Member Online Profile</label>
                        <input type="text" class="form-control" name="member_profile" placeholder="Enter Member Online Profile">
                      </div>

                    </div>
					 

                  </div>
				  
                  <div class="row">

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">
                        <label for="name">Member Type</label>
                        <select class="form-control" name="member_type">
                        <option selected disabled>-------SELECT Member Type-------</option>
						<?php foreach($member_type as $rows) { ?>
						<option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
						<?php } ?>
                       <!-- <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option> -->
                      </select>
                      </div>

                    </div>

                  </div>
                  <!--/.row-->

				  
				  
				   
				  
                
                  <!--/.row-->

				  

				  

				  
				 
				  
                 
                  <!--/.row-->
                </div>
				
				<div class="card-footer">
          <input type="submit" class="btn btn-sm btn-primary fa fa-dot-circle-o" value="Add Member">
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
$('form').validate({
	rules: {
		'member_name': required
	},
	messeges:{
		'member_name': 'Member Name required'
	}
});
</script>
    