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
	<?php echo Asset::styles(); ?>
	<?php echo Asset::scripts(); ?>
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>
  <body>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#">BunnyCMS</a>
          <ul class="nav">
            <li><a href="<?php echo URL::to( '/' ) ; ?>" target="_blank"><?php echo Lang::line( 'admin.home-public' ); ?></a></li>
            <li <?php if( $title == Lang::line( 'admin.post-type-posts' ) ) { echo 'class="active"'; }?>><a href="<?php echo URL::to( '/admin/posts' ) ; ?>"><?php echo Lang::line( 'admin.post-type-posts' ); ?></a></li>
			<li <?php if( $title == Lang::line( 'admin.post-type-pages' ) ) { echo 'class="active"'; }?>><a href="<?php echo URL::to( '/admin/pages' ) ; ?>"><?php echo Lang::line( 'admin.post-type-pages' ); ?></a></li>
			<li <?php if( $title == Lang::line( 'admin.settings' ) ) { echo 'class="active"'; }?>><a href="<?php echo URL::to( '/admin/settings' ) ; ?>"><?php echo Lang::line( 'admin.settings' ); ?></a></li>
			<li <?php if( $title == Lang::line( 'admin.templates' ) ) { echo 'class="active"'; }?>><a href="<?php echo URL::to( '/admin/templates' ) ; ?>"><?php echo Lang::line( 'admin.templates' ); ?></a></li>
			<li><a href="<?php echo URL::to( '/admin/logout' ) ; ?>"><?php echo Lang::line( 'admin.login-logout' ); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="content">
        <div class="page-header">
			<div class="row">
				<div class="span11">
		            <h2><h1><?php echo $title; ?> <small><?php echo $tagline; ?></small></h1></h2>
		          </div>
		          <div class="span3">
		            <a class="btn large primary" href="<?php echo URL::to( '/admin/post/0' ) ; ?>"><?php echo Lang::line( 'admin.btn-new' ); ?></a>
		          </div>
			</div>
        </div>
		<?php
		$status = Session::get('status');
		if( $status ) { ?>
			<div class="alert-message success">
			  <p><strong><?php echo $status; ?></strong></p>
			</div>
		<?php } ?>
		<?php echo $content;?>
      </div>

      <footer>
        <p>BunnyCMS</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
