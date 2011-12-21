
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="<?php echo $data[ 'settings' ][ 'urlfeed' ]; ?>" rel="self" type="application/rss+xml" />
<title><?php echo $data[ 'settings' ][ 'title' ];?></title>
<link><?php echo $data[ 'settings' ][ 'urlhome' ]; ?></link>
<description><?php echo $data[ 'settings' ][ 'tagline' ];?></description>
<lastBuildDate><?php echo $data[ 'lastUpdate' ];?></lastBuildDate>
<language>en-us</language>
<?php if ( count( $data[ 'posts' ] ) > 0 ) {
	$posts = $data[ 'posts' ];
	foreach( $posts as $post ){ ?>
	<item>
	<title><?php echo $post[ 'name' ]; ?></title>
	<link><?php echo $post[ 'url' ]; ?></link>
	<guid><?php echo $post[ 'url' ]; ?></guid>
	<pubDate><?php echo $post[ 'rssdate' ];?></pubDate>
	<description><![CDATA[ <?php echo $post[ 'content' ]; ?> ]]></description>
	</item>
	<?php
	} 	
}?>
</channel>
</rss>