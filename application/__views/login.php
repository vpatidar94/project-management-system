<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
  <meta name="author" content="Lukasz Holeczek">
  <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
  <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

  <title>CoreUI Bootstrap 4 Admin Template</title>

  <!-- Icons -->
  <link href="http://microbeansindia.com/PMS/assests/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://microbeansindia.com/PMS/assests/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="http://microbeansindia.com/PMS/assests/css/style.css" rel="stylesheet">

  <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group">
          <div class="card p-4">
	
		<div class="card-body">
              <h1>Login</h1>
              <p class="text-muted">Sign In to your account</p>
			  <form action='<?php echo base_url();?>welcome/login' method='post' name='login'>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="row">
                <div class="col-6">
                  <input type="submit" name="login" value='Login' class="btn btn-primary px-4">
                </div>
                <div class="col-6 text-right">
                  <button type="button"  class="btn btn-link px-0">Forgot password?</button>
                </div>
              </div>
			  	</form>
            </div>
		
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>Sign up</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="http://microbeansindia.com/PMS/assests/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="http://microbeansindia.com/PMS/assests/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="http://microbeansindia.com/PMS/assests/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>