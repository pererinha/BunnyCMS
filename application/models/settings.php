<?php
class Settings extends Eloquent {
	
	public static $table = 'settings';
	public static $appName = 'BunnyCms';
	
	public static function getSettings( ){
		$settings = Settings::where_id( static::$appName )->first();
		$attr = array();
		if( $settings->attributes ){
			foreach( $settings->attributes as $key => $value ){
				$attr[ $key ] = stripslashes( $value );
			}
		}
		$attr[ 'urlhome' ] = URL::to( '/' );
		$attr[ 'urlfeed' ] = URL::to( '/' . Slug::$slugFeed );
		return $attr;
	}
}