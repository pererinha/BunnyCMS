<?php
/* Routes */
return array(
	/* Public */
	'GET /(:any?), GET /' => function( $slug = NULL ){
		$content = new Content();
		return $content->show( $slug );
	},
	/* Administration - Login - Post form */
	'POST /admin/login' => function( ){
		$admin = new Admin();
		return $admin->doLogin( TRUE );
	},
	// Administration - Upload Image
	'POST /admin/upload' => function() {
		$admin = new Admin();
		return $admin->uploadImage();
	},
	/* Administration - Logout */
	'GET /admin/logout' => function(){
		$admin = new Admin();
		return $admin->doLogout();	
	},
	/* Administration - Settings */
	'GET /admin/settings' => function( ){
		$admin = new Admin();
		return $admin->settings();
	},
	/* Administration - Settings save */
	'POST /admin/settings' => function( ){
		$admin = new Admin();
		return $admin->settings( $_POST );
	},
	/* Administration - List Posts */
	'GET /admin/posts' => function( ){
		$admin = new Admin();
		return $admin->listPosts( Post::$typePost );
	},
	/* Administration - List Pages */
	'GET /admin/pages' => function( ){
		$admin = new Admin();
		return $admin->listPosts( Post::$typePage );
	},
	/* Administration - Edit/Create Post/Page */
	'GET /admin/post/(:num)' => function( $id ){
		$admin = new Admin();
		return $admin->editPost( $id );
	},
	/* Administration - Save Post/Page */
	'POST /admin/post/(:num)' => function( $id ){
		$admin = new Admin();
		return $admin->savePost( $id );
	},
	/* Administration - Delete Post/Page */
	'GET /admin/delete/(:num)' => function( $id ){
		$admin = new Admin();
		return $admin->delete( $id );
	},
	/* Administration - Templates */
	'GET /admin/templates' => function( ){
		$admin = new Admin();
		return $admin->listTemplates();
	},
	/* Administration - Templates */
	'GET /admin/template/restore/(:any)' => function( $id ){
		$admin = new Admin();
		return $admin->restoreTemplate( $id );
	},
	/* Administration - Templates */
	'GET /admin/template/(:any)' => function( $id ){
		$admin = new Admin();
		return $admin->editTemplate( $id );
	},
	/* Administration - Templates */
	'POST /admin/template/(:any)' => function( $id ){
		$admin = new Admin();
		return $admin->saveTemplate( $id );
	},
	/* Administration - Login */
	'GET /admin' => function( ){
		$admin = new Admin();
		return $admin->doLogin();
	},
	/* Administration - Login */
	'GET /admin/login' => function( ){
		$admin = new Admin();
		return $admin->doLogin();
	},
);