<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <meta name="robots" CONTENT="noindex, nofollow">
  <link rel="shortcut icon" href="<?php echo e(asset('public/img/icon.png')); ?>">
  <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

  <title>Administrator by set confrents</title>

  <!-- Icons -->
  <link href="<?php echo e(asset('node_modules/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('node_modules/simple-line-icons/css/simple-line-icons.css')); ?>" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="<?php echo e(asset('public/css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('public/build/css/login.css')); ?>" rel="stylesheet">

  <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
              <form action="<?php echo e(url('login')); ?>" method="POST">
              <h1>Login</h1>
              <p class="text-muted">Sign In to your account</p>
              <?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<strong>Login Error!</strong><br><br>
					<ul>
						<?php foreach($errors->all() as $error): ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn btn-primary px-4">Login</button>
                </div>
                <div class="col-6 text-right">
                <!--
                  <button type="button" class="btn btn-link px-0">Forgot password?</button>
                -->
                </div>
              </div>
            </form>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <div class="text-center"><img src="<?php echo e(asset('public/img/f-logo.png')); ?>" class="login-logo"  /></div>
                <!--
                <h2>ADMINISTRATORS <br> SET CONFRENTS</h2>
                 -->
                 <p>Aministrator management by order products and Customer</p>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="<?php echo e(asset('node_modules/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('node_modules/popper.js/dist/umd/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

</body>
</html>