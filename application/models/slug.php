<?php
class Slug extends Eloquent {
	
	public static $table = 'slug';
	public static $typePost = 1;
	public static $typeCategory = 2;
	public static $slugFeed = 'feed';

	public function content(){
		return $this->has_many( 'Post' );
	}
	
    public function post(){
		return $this->has_one( 'Post', 'slug_id' );
    }

    public function category(){
         return $this->has_one( 'Category', 'slug_id' );
    }
	
	public static function generate_slug( $slug ){
		$next = count( DB::table( 'slug' )->where( 'slug', 'LIKE', $slug->slug.'%' )->get() );
		$slug->slug = $slug->slug . '-' . $next;
		return $slug;
	}
	
}