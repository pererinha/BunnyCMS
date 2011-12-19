<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le styles -->
	<?php echo HTML::style('css/admin/bootstrap.min.css');?>
	<?php echo HTML::style('css/admin/styles.css');?>
    <!-- Le fav and touch icons -->
  </head>
  <body>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#">BunnyCMS</a>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="content">
        <div class="page-header">
			   <h2><h1><?php echo Lang::line( 'admin.login-admin' ); ?> <small><?php echo Lang::line( 'admin.login-welcome' ); ?></small></h1></h2>
					<?php echo Form::open( 'admin/login/' ); ?>
					
					<fieldset>
						<?php
						$status = Session::get('status');
						if( $status ) { ?>
							<div class="alert-message error">
							  <p><strong><?php echo $status; ?></strong></p>
							</div>
						<?php } ?>
					  <div class="clearfix">
					    <label for="name"><?php echo Lang::line( 'admin.login-user' ); ?></label>
					    <div class="input">
					      <input type="text" size="50" name="username" id="username" value="" class="xlarge">
					    </div>
					  </div><!-- /clearfix -->
					<div class="clearfix">
					    <label for="name"><?php echo Lang::line( 'admin.login-password' ); ?></label>
					    <div class="input">
					      <input type="password" size="50" name="password" id="password" value="" class="xlarge">
					    </div>
					  </div><!-- /clearfix -->
					  <div class="actions">
					    		<input type="submit" value="<?php echo Lang::line( 'admin.btn-login' ); ?>" class="btn success">
					</fieldset>
					<?php echo Form::token();?>
					<?php echo Form::close();?>	
		    
        </div>
      </div>
      <footer>
        <p>BunnyCMS</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>