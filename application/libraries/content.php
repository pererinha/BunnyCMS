<?php

class Content{
	
	public $mustache;
	
	public function __construct(){
		$this->mustache = new Mustache;
	}

	public function show( $_slug ){
		if( $_slug == NULL ){
			return $this->theLastOne();
		}
		$slug = Slug::where_slug( $_slug )->first();
		if( $slug == NULL ){
			$settings = Settings::getSettings();
			if( $_slug == $settings['slugallposts'] ){
				return $this->showAllPosts();
			}
			if( $_slug == Slug::$slugFeed ){
				return $this->feed();
			}
		} else {
			if( Slug::$typePost == $slug->type ){
				return $this->showPost( $slug );
			}
			if( Slug::$typeCategory == $slug->type ){
				return $this->showCategory( $slug );
			}	
		}
		return $this->error404();
	}

	private function feed(){
		header('Content-type: text/xml');
		$xml = '<?xml version="1.0" encoding="utf-8" ?>';
		$posts = Post::getAllPublishedPostsToFeed();
		$data = array();
		foreach( $posts as $post ){
			$data[ 'posts' ][] = $post->getAttributes();
		}
		$data[ 'lastUpdate' ] = Post::getLastUpdate();
		$data[ 'settings' ] = Settings::getSettings();
		$data[ 'urlhome' ] = URL::to( '/' );
		$layout = View::make( 'default/rss' )->with( 'data', $data );
		return $xml . $layout;
	}

	private function theLastOne(){
		$post = Post::theLastOne();
		if( $post ){
			return Redirect::to( $post->slug->slug );
		}
		return $this->error404();
	}

	private function showAllPosts(){		
		$posts = Post::getAllPublishedPosts();
		$data = array();
		foreach( $posts->results as $post ){
			$data[ 'posts' ][] = $post->getAttributes();
		}
		$settings = Settings::getSettings();
		$data[ 'pagination' ] = $posts->links();
		$data[ 'allposts' ][ 'url' ] = URL::to( $settings[ 'slugallposts' ] );
		$content = $this->mustache->render( Template::getTemplatePosts() , $data );
		$data = array('title' => $data[ 'category' ][ 'name' ] , 'content' => $content );
		return $this->renderContent( $data );
	}

	private function showCategory( $slug ){
		if( $slug->category == NULL ) 
			return $this->error404();
		$posts = $slug->category->publishedPosts();
		$data = array();
		foreach( $posts as $post ){
			$data[ 'posts' ][] = $post->getAttributes();
		}
		$data[ 'category' ][ 'name' ] = $slug->category->name;
		$data[ 'category' ][ 'url' ] = URL::to( $slug->slug );
		$content = $this->mustache->render( Template::getTemplatePosts() , $data );
		$data = array('subtitle' => $data[ 'category' ][ 'name' ] , 'content' => $content );
		return $this->renderContent( $data );
	}

	private function showPost( $slug ){
		if( $slug->post == NULL )
			return $this->error404();
		$data = $slug->post->getAttributes();
		$content = $this->mustache->render( Template::getTemplatePost() , $data );
		$data = array( 'subtitle' => $slug->post->name, 'content' => $content );
		return $this->renderContent( $data );
	}
	
	private function error404(){
		$content = Template::getTemplateError404();
		$content = stripcslashes( $content );
		$data = array( 'subtitle' => 'Error 404', 'content' => $content );
		return $this->renderContent( $data );
	}
	
	private function renderContent( $data ){
		$data = array_merge( $data, Settings::getSettings() );
		$data[ 'linkcss' ] = '<style>' . Template::getTemplateCSS() . '</style>';
		$data[ 'urlallposts' ] = $data[ 'settings' ][ 'slugallposts' ];
		$pages = Post::getAllPublishedPage(); 
		foreach( $pages as $page ){
			$data[ 'pages' ][] = $page->getAttributes();
		}
		return $this->mustache->render( Template::getTemplateBase() , $data );
	}
}