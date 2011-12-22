<?php

class Admin{

	public function editPost( $id ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$post = Post::find( $id );
		if( $post === NULL ){
			if( intval( $id ) !== 0 ){
				return Response::make( View::make( 'error/404' ), 404 );
			}
			$post = new Post();
			$post->id = 0;
		}
		$settings = Settings::getSettings();
		
		if( !$settings[ 'usemarkdown' ] ){
			Asset::add('jquery', 'js/admin/jquery1.5.js');
			Asset::add('nicEdit', 'js/admin/nicEdit.js');
		}
		
		$content = View::make( 'admin/post' )->with( 'post', $post )->with( 'usemarkdown', $settings[ 'usemarkdown' ] );
		
		$title = ( $post->id === 0 ) ? Lang::line( 'admin.btn-new' ) : $post->name;
		$tagline = ( $post->id === 0 ) ? '' : Lang::line( 'admin.editing' );
		$layout = View::make( 'admin/base' )
					->with( 'title', $title )
					->with( 'tagline', $tagline )
					->with( 'content', $content );
		return $layout;
	}
	
	public function listPosts( $type ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$posts = Post::where_type( $type )->order_by( 'date', 'desc' )->paginate();
		$content = View::make( 'admin/posts' )->with( 'posts', $posts );

		$title = ( $type === Post::$typePage ) ? Lang::line( 'admin.post-type-pages' ) : Lang::line( 'admin.post-type-posts' );
		$tagline = Lang::line( 'admin.listing' );

		Asset::add('jquery', 'js/admin/jquery1.5.js');
		Asset::add('tablesorter', 'js/admin/jquery.tablesorter.min.js');

		$layout = View::make( 'admin/base' )
					->with( 'title', $title )
					->with( 'tagline', $tagline )
					->with( 'content', $content );
		return $layout;
	}
	
	public function delete( $id ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$get[ 'csrf_token' ] = ( isset( $_GET[ 'csrf_token' ] ) ? $_GET[ 'csrf_token' ] : '');
		$post = Post::find( $id );
		$type = $post->type;
		if( $post === NULL ){
			return Response::make( View::make( 'error/404' ), 404 );
		}
		DB::table( 'post_category' )->where( 'post_id', '=', $post->id )->delete();
		DB::table( 'slug' )->where( 'id', '=', $post->slug_id )->delete();
		DB::table( 'post' )->where( 'id', '=', $post->id )->delete();
		$redirect = ( $type == Post::$typePage ) ? '/admin/pages' : '/admin/posts';
		$message = ( $type == Post::$typePage ) ? Lang::line( 'admin.page-deleted' )->get() : Lang::line( 'admin.post-deleted' )->get();
		return Redirect::to( $redirect )->with( 'status', $message );
	}	

	public function savePost( $id ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$post = Post::find( $id );
		$slug = new Slug();
		if( $post === NULL ){
			if( intval( $id ) !== 0 ){
				return Response::make( View::make( 'error/404' ), 404 );
			}
			$post = new Post();
			$post->date = date( 'Y-m-d H:i:s' );
			$slug->id = 0;
			
		} else {
			$slug = Slug::find( $post->slug_id );
		}
		$posted = $_POST;
		$post->name = $posted[ 'name' ];
		$post->content = $posted[ 'content' ];
		$post->status = $posted[ 'status' ];
		$post->type = $posted[ 'type' ];

		$slug->slug = URL::slug( $post->name );
		$slug->type = Slug::$typePost;

		$post->slug_id = $this->saveSlug( $slug );
		$post->save();

		$categories = $posted['category'];

		DB::table( 'post_category' )->where( 'post_id', '=', $post->id )->delete();
		
		if( count( $categories  ) > 0 )
		foreach( $categories as $categoryName ){
			if( $categoryName != '' ){ 
				$category = Category::where( 'name', '=', $categoryName )->first();
				if( $category === NULL ){
					$category = new Category();
					$category->name = $categoryName;
					$slug = new Slug();
					$slug->slug = URL::slug( $categoryName );
					$slug->type = Slug::$typeCategory;
					$category->slug_id = $this->saveSlug( $slug );
					$category->save();
				}
				DB::table('post_category')->insert(
					array(
					'post_id' => $post->id,
					'category_id' => $category->id
					));
			}
		}

		$message = ( $post->type == Post::$typePage ) ? Lang::line( 'admin.page-saved' )->get() : Lang::line( 'admin.post-saved' )->get();
		return Redirect::to( '/admin/post/' . $post->id )->with( 'status', $message );
	}
	
	public function listTemplates( ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$templates = Template::all();
		$content = View::make( 'admin/templates' )->with( 'templates', $templates );

		$title = Lang::line( 'admin.templates' );
		$tagline = Lang::line( 'admin.listing' );

		Asset::add('jquery', 'js/admin/jquery1.5.js');
		Asset::add('tablesorter', 'js/admin/jquery.tablesorter.min.js');

		$layout = View::make( 'admin/base' )
					->with( 'title', $title )
					->with( 'tagline', $tagline )
					->with( 'content', $content );
		return $layout;
	}
	
	public function editTemplate( $id ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$template = Template::find( $id );
		if( $template === NULL ){
			if( intval( $id ) !== 0 ){
				return Response::make( View::make( 'error/404' ), 404 );
			}
		}
		
		$content = View::make( 'admin/template' )->with( 'template', $template );

		$title = Lang::line( 'admin.templates' );
		$tagline = Lang::line( 'admin.editing' );
		$layout = View::make( 'admin/base' )
					->with( 'title', $title )
					->with( 'tagline', $tagline )
					->with( 'content', $content );
		return $layout;
	}
	
	public function saveTemplate( $id ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$template = Template::find( $id );
		if( $template === NULL ){
			if( intval( $id ) !== 0 ){
				return Response::make( View::make( 'error/404' ), 404 );
			}
		}
		$template->content = $_POST[ 'content' ];
		$template->save();
		$message = Lang::line( 'admin.template-saved' );
		return Redirect::to( '/admin/template/' . $id )->with( 'status', $message );
	}
	
	public function restoreTemplate( $id ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$template = Template::find( $id );
		if( $template === NULL ){
			if( intval( $id ) !== 0 ){
				return Response::make( View::make( 'error/404' ), 404 );
			}
		}
		$template->content = View::make( '/default/' . $id );
		$template->save();
		$message = Lang::line( 'admin.template-restored' );
		return Redirect::to( '/admin/template/' . $id )->with( 'status', $message );
	}
	
	public function settings( $posted = false ){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$settings = Settings::where_id( Settings::$appName )->first();
		if( $posted ){
			$settings->title = $posted[ 'title' ];
			$settings->tagline = $posted[ 'tagline' ];
			$settings->description = $posted[ 'description' ];
			$settings->author = $posted[ 'author' ];
			$settings->dateformat = $posted[ 'dateformat' ];
			$settings->slugallposts = $posted[ 'slugallposts' ];
			$settings->usemarkdown = $posted[ 'usemarkdown' ];
			if( $posted[ 'password' ] != '' ){
				$password = sha1( Settings::$appName . $posted[ 'password' ] );
				$settings->password = $password;
			}
			$message = Lang::line( 'admin.settings-saved' )->get();
			$settings->save();
			return Redirect::to( '/admin/settings/' )->with( 'status', $message );
		} else {
			Asset::add('jquery', 'js/admin/jquery1.5.js');
			Asset::add('nicEdit', 'js/admin/nicEdit.js');
			$content = View::make( 'admin/settings' )
						->with( 'settings', $settings );
			$layout = View::make( 'admin/base' )
						->with( 'title', Lang::line( 'admin.settings' ) )
						->with( 'tagline', Lang::line( 'admin.settings-options' ) )
						->with( 'content', $content );
			return $layout;
		}
	}
	
	public function uploadImage(){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		$upload = new NicEditUpload();
		$upload->init();
	}
	
	
	public function doLogin( $auth = false ){
		if( $auth ){
			if( $this->tokenValidate( $_POST ) ){
				$username = $_POST[ 'username' ];
				$password = $_POST[ 'password' ];
				if( $username == 'admin' ){
					$settings = Settings::where_id( Settings::$appName )->first();
					$password = sha1( Settings::$appName . $_POST[ 'password' ] );
					if( $password == $settings->password ){
						Session::put( 'logged', TRUE );
						$message = Lang::line( 'admin.login-logged' )->get();
						return Redirect::to( '/admin/posts' )->with( 'status', $message );	
					}
				}
				$message = Lang::line( 'admin.login-incorrect' )->get();
				return Redirect::to( '/admin/login' )->with( 'status', $message );
			} else {
				return Response::make( View::make( 'error/404' ), 404 );
			};
		} else {
			if( $this->isAdmin() ){ return Redirect::to( '/admin/posts/' ); }
			$content = View::make( 'admin/login' )->with( 'title', Lang::line( 'admin.login-admin' ) );
			return $content;
		}
	}
	public function doLogout(){
		if( !$this->isAdmin() ){ return Redirect::to( '/admin/login/' ); }
		Session::forget( 'logged' );
		return Redirect::to( '/' );
	}
	
	private function saveSlug( $slug ){
		$check_slug = Slug::where_slug( $slug->slug )->first();
		if( $check_slug === NULL || $check_slug->id === $slug->id ){
			$slug->save();
			return $slug->id;
		} else {
			$slug = Slug::generate_slug( $slug );
			return $this->saveSlug( $slug );
		}
	}
	
	private function tokenValidate( $posted ){
		return ( $posted[ 'csrf_token' ] == Session::token() );
	}
	
	private function isAdmin(){
		return Session::get('logged');
	}	
}
