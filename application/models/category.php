<?php
class Category extends Eloquent {
	
	public static $table = 'category';

	public function content(){
		return $this->has_many('Post');
	}
	
	public function posts(){
		return $this->has_and_belongs_to_many( 'Post', 'post_category' );
	}
	
	public function publishedPosts(){
		return $this->posts()->where_status( Post::$statusPublic )->where_type( Post::$typePost )->order_by( 'date', 'desc' )->get();
	}
	
    public function slug(){
         return $this->belongs_to( 'Slug', 'slug_id' );
    }
}