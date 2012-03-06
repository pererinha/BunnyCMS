<?php

class Content{
	
	public $mustache;
	
	public $settings;
	
	public function __construct(){
		$this->mustache = new Mustache;
		$this->settings = Settings::getSettings();
	}

	public function show( $_slug ){
		if( $_slug == NULL ){
			return $this->theLastOne();
		}
		$slug = Slug::where_slug( $_slug )->first();
		if( $slug == NULL ){
			if( $_slug == $this->settings['slugallposts'] ){
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
			$attr = $post->getAttributes();
			if( $this->settings[ 'usemarkdown' ] ){
				$attr['content'] = Markdown::parse( $attr['content'] );
			}
			$data[ 'posts' ][] = $attr;
		}
		$data[ 'lastUpdate' ] = Post::getLastUpdate();
		$data[ 'settings' ] = $this->settings;
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
		$data[ 'pagination' ] = $posts->links();
		$data[ 'allposts' ][ 'url' ] = URL::to( $this->settings[ 'slugallposts' ] );
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
		if( $this->settings[ 'usemarkdown' ] ){
			$data['content'] = Markdown::parse( $data['content'] );
		}
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
		$data = array_merge( $data, $this->settings );
		$data[ 'linkcss' ] = '<style>' . Template::getTemplateCSS() . '</style>';
		$data[ 'urlallposts' ] = $data[ 'slugallposts' ];
		$pages = Post::getAllPublishedPage(); 
		foreach( $pages as $page ){
			$data[ 'pages' ][] = $page->getAttributes();
		}
		$data[ 'currentURL' ] = URL::to( URL::current() );
		return $this->mustache->render( Template::getTemplateBase() , $data );
	}
}