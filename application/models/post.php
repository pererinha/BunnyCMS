<?php
class Post extends Eloquent {
	
	public static $table = 'post';

	public static $statusPublic = 1;
	public static $statusDraft = 2;

	public static $typePost = 1;
	public static $typePage = 2;
	
	public static $per_page = 10;
	
	public function timeAgo(){
		return Date::time_ago( Date::mysqlToUnix( $this->date ) );
	}
	
	public function dateFormated(){
		$settings = Settings::getSettings();
		$date_format = $settings[ 'dateformat' ];
		return date( $date_format, Date::mysqlToUnix( $this->date ) );
	}
	
	public function htmlDetails(){
		return View::make( 'content/details' )->with( 'post', $this );
	}
	
	public function getAttributes(){
		$attr = array();
		if( $this->attributes ){
			foreach( $this->attributes as $key => $value ){
				$attr[ $key ] = stripslashes( $value );
			}
		}
		$attr[ 'dateformated' ] = $this->dateFormated();
		$attr[ 'timestamp' ] = Date::mysqlToUnix( $this->date );
		$attr[ 'rssdate' ] = date( 'D, d M Y H:i:s O' , $attr[ 'timestamp' ] );
		$attr[ 'timeago' ] = Date::time_ago( Date::mysqlToUnix( $this->date ) )->get();
		$attr[ 'url' ] = URL::to( $this->slug->slug );
		if( $this->categories ){
			$attr[ 'categories' ] = array();
			foreach( $this->categories as $category ){
				$attr[ 'categories' ][] = array( 'name' => $category->name, 'url' => URL::to( $category->slug->slug ) );
			}
		}
		return $attr;
	}
	
	/* Methods */
	public static function theLastOne(){
		return Post::where_status( static::$statusPublic )->where_type( static::$typePost )->order_by( 'date', 'desc' )->first();
	}

	public static function getLastUpdate(){
		$post = Post::where_status( static::$statusPublic )->where_type( static::$typePost )->order_by( 'date', 'desc' )->first();
		if( $post ){
			$attr = $post->getAttributes();
			return $attr[ 'rssdate' ];
		}
		return false;
	}

	public static function getAllPublishedPosts(){
		return Post::where_status( Post::$statusPublic )->where_type( Post::$typePost )->order_by( 'date', 'desc' )->paginate();
	}

	public static function getAllPublishedPostsToFeed(){
		return Post::where_status( Post::$statusPublic )->where_type( Post::$typePost )->order_by( 'date', 'desc' )->get();
	}

	public static function getTotalPublishedPosts(){
		return Post::where_status( Post::$statusPublic )->where_type( Post::$typePost )->count();
	}

	public static function getAllPublishedPage(){
		return Post::where_status( Post::$statusPublic )->where_type( Post::$typePage )->order_by( 'date', 'desc' )->get();
	}
	
	/* Relations */
	public function categories(){
		return $this->has_and_belongs_to_many( 'Category', 'post_category' );
	}

    public function slug(){
		return $this->belongs_to( 'Slug', 'slug_id' );
    }
}