	  (\/)
	 ( . .)  BunnyCMS
 	c(")(") 

BunnyCMS
=============
I developed the BunnyCMS because I needed a simple and flexible tool in order to get my blog updated.  

Features
--------------------
* It is very simple and easy
* Highly customizable
* Front-end templates based on [Mustache Logic-less templates] (http://mustache.github.com/)
* You can choose between [WYSIWYG Editor](http://nicedit.com/) or [Markdown] (http://daringfireball.net/projects/markdown/) to edit your posts
* If you choose Markdown you can highlight your code - I'm using geshi here :)
* It is totally free

Installation
----------

The installation is very easy. All you have to do is:

1. Edit the file \application\config\production\application.php (line 3)
	'url' => 'bunnycms's url'

2. Edit the file \application\config\production\database.php with your database info.

3. Edit the permission of the folder /images.

4. Run the file bunny.sql in your database.

5. The enter at the administration area access http://BUNNY_URL/admin. The login is 'admin' and the password is also 'admin'. You can change it later.

Using Markdown 
---------------
### Formatting your code

To get your code highlighted you need to add # following by the language name as the first line of your code block:

`#php

<?php
echo $hello;
?>
`

Who is using it
-------------
Up until now... just me [danielcamargo.com](http://www.danielcamargo.com) :) 

Thanks to:
--------
* [Laravel](http://laravel.com/) 
* [Mustache.php](https://github.com/bobthecow/mustache.php) 
* [NicEdit](http://nicedit.com/)
* [Bootstrap, from Twitter] (http://twitter.github.com/bootstrap/) 
* [Markdown] (http://daringfireball.net/projects/markdown/) 
* [php-markdown](https://github.com/wolfie/php-markdown)


TODO List
------------
1. Auto install.
2. Documentation.

Suggestions?
-----------
Any ideas? Please contact me. 