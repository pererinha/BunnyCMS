<?php
class Template extends Eloquent {
	
	public static $table = 'template';
	public static $templatePost = 'post';
	public static $templatePosts = 'posts';
	public static $templateBase = 'base';
	public static $templateCSS = 'css';
	public static $templateError404 = 'error404';

	public static function getTemplateBase(){
		return static::getTemplate( static::$templateBase );
	}
	
	public static function getTemplatePost(){
		return static::getTemplate( static::$templatePost );
	}
	
	public static function getTemplatePosts(){
		return static::getTemplate( static::$templatePosts );
	}
	
	public static function getTemplateCSS(){
		return static::getTemplate( static::$templateCSS );
	}
	
	public static function getTemplateError404(){
		return static::getTemplate( static::$templateError404 );
	}
	
	public static function getTemplate( $id ){
		$template = Template::where_id( $id )->first();
		return $template->content;
	}
}