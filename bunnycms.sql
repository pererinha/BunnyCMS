-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2011 at 10:37 PM
-- Server version: 5.5.17
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bunnycms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slug_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug_id` (`slug_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug_id`) VALUES
(1, 'welcome', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 - is post, 2 - is page',
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 - is public, 2 - is draft',
  `slug_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug_id` (`slug_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `name`, `content`, `type`, `date`, `status`, `slug_id`) VALUES
(1, 'Welcome to BunnyCMS', 'Welcome to BunnyCMS!<br><div><br></div><div>:)</div><div><br></div><div>I hope you enjoy it!</div>', 1, '2011-12-18 21:34:39', 1, 1),
(2, 'BunnyCMS', 'Thanks for use BunnyCMS.', 2, '2011-12-18 21:35:43', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `post_id` (`post_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `last_activity`, `data`) VALUES
('8oWNp24AelZFLRIjkXg0ZhsXtaEdpQVgGwR9i0vH', 1324427855, 'a:4:{s:5:":new:";a:0:{}s:5:":old:";a:0:{}s:10:"csrf_token";s:40:"AfO98uFG7p85wLHdkfv2Q530XWaCZaQ157pvQx4h";s:6:"logged";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `dateformat` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `slugallposts` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `usemarkdown` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `author`, `password`, `title`, `tagline`, `description`, `dateformat`, `slugallposts`) VALUES
('BunnyCMS', 'Little Cute Bunny', '1b319c1cf17a571a1771e94dbc9a587aa028ad48', 'Hi there,', 'Welcome to my blog', 'This blog was made by BunnyCMS.', 'd/m/Y', 'allposts');

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE IF NOT EXISTS `slug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1 - is post, 2 - is category',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slug`
--

INSERT INTO `slug` (`id`, `slug`, `type`) VALUES
(1, 'welcome-to-bunnycms', 1),
(2, 'welcome', 2),
(3, 'bunnycms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `content`, `description`) VALUES
('base', '<!DOCTYPE html>\r\n<html lang=\\"en-US\\" xml:lang=\\"en-US\\" xmlns=\\"http://www.w3.org/1999/xhtml\\">\r\n<head>\r\n	<title>{{title}} {{#subtitle}} - {{subtitle}} {{/subtitle}}</title>\r\n	{{linkcss}}\r\n	<link href=\\"{{urlfeed}}\\" rel=\\"alternate\\" title=\\"Atom feed\\" type=\\"application/atom+xml\\">\r\n	<link href=\\''http://fonts.googleapis.com/css?family=Cabin+Condensed\\'' rel=\\''stylesheet\\'' type=\\''text/css\\''>\r\n	<meta charset=\\"utf-8\\">\r\n	<meta name=\\"description\\" content=\\"{{description}}\\">\r\n</head>\r\n<body>\r\n	<header>\r\n		<h1>{{title}}</h1>\r\n		<p id=\\"tagline\\">{{tagline}}</p>\r\n	</header>\r\n	<nav>\r\n		<ul>\r\n			<li><a href=\\"{{urlhome}}\\">Home</a></li>\r\n			<li><a href=\\"{{urlallposts}}\\">All Posts</a></li>\r\n			{{#pages}}\r\n			<li><a href=\\"{{url}}\\" title=\\"{{name}}\\">{{name}}</a></li>\r\n			{{/pages}}\r\n			<li><a href=\\"{{urlfeed}}\\" target=\\"_blank\\">Feed</a></li>\r\n		</ul>\r\n		<div class=\\"clear\\"></div>\r\n	</nav>\r\n	<section id=\\"contents\\">\r\n		{{content}}\r\n	</section>\r\n	<footer>\r\n		<pre>\r\n			 (\\\\/)\r\n			( . .)\r\n			c(\\")(\\") <a href=\\"https://github.com/pererinha/BunnyCMS\\" target=\\"_blank\\">BunnyCMS</a> | <a href=\\"{{urlfeed}}\\" target=\\"_blank\\">Feed</a> \r\n		</pre>\r\n	</footer>\r\n</body>\r\n</html>', 'Template base'),
('css', '* { margin:0;padding:0; list-style:none; vertical-align:baseline;}\nbody{\n	background:#FFF;\n	font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Arial,Helvetica,sans-serif;\n}\n/* GENERAL */\nheader, footer, nav, article, section{\n	margin:10px auto;\n	width:768px;\n}\n/* HEADER */\nheader{}\n	header h1{\n		color:#F58320;\n		text-shadow: #CCC 1px 1px 1px;\n	}\n	header p{\n		color:#CCC;\n		font-size:16px;\n	}\n/* NAV */\nnav{\n	margin-bottom:20px;\n	margin-top:20px;\n}\n	nav ul li{\n		float:left;\n		margin:0 10px 0 0;\n	}\n		nav ul li a{\n			color:#666;\n			font-size:14px;\n			text-decoration:none;\n		}\n\n/* ARTICLE */\narticle{}\n	article.overview h1 a{\n		color:#333;\n		font-size:22px;\n		text-decoration:none;\n		text-shadow: #CCC 1px 1px 1px;\n	}\n	article.overview p.datetime{\n		font-size:11px;\n	}\n	article.overview ul.categories{\n		font-size:12px;\n		margin:10px 0;\n	}\n		article.overview ul.categories li{\n			float:left;\n			margin:0 10px 0 0;\n		}\n			article.overview ul.categories li a{\n				color:#F58320;\n				text-decoration:none;\n			}\n	article.contents{\n		color:#333;\n	}\n		article.contents h1, \n		article.contents h2, \n		article.contents h3, \n		article.contents h4, \n		article.contents h5, \n		article.contents h6,\n		article.contents ul,\n		article.contents p,\n		article.contents pre{\n			margin:25px 0 5px 0;\n		}\n			article.contents a{\n				color:#F58320;\n			}\n		article.contents pre{\n			background:#333;\n			padding:10px;\n		}\n			article.contents pre code{\n				color:#FFF;\n			}\n	article.contents div#share{\n		float:right;\n		margin-top:15px;\n		width:90px;\n	}\n		article.contents div#share div#twitter{\n			margin:5px 0;\n		}\n	article.contents div#comments{\n		margin:50px auto 80px auto;\n		width:500px;\n	}\n		article.contents div#comments h2{\n			color:#CCC;\n			font-style:italic;\n		}\nsection#posts{}\n	section#posts h1 a{\n		color:#333;\n		font-size:22px;\n		text-decoration:none;\n		text-shadow: #CCC 1px 1px 1px;\n	}\n	section#posts h1#title, section#posts h1#title a{\n		color:#F58320 !important;\n		font-size:15px;\n	}\nfooter{\n	margin:40px auto;\n}\nfooter a{\n	color:#F58320 !important;\n	text-decoration:none;\n}\n/* @override http://localhost/mark_story2/site/css/geshi.css */\n/**\n * GeSHi CSS Inspired by \n * TextMate Theme Dawn\n *\n * Copyright 2008 Mark Story \n * \n * This work is licensed under the Creative Commons Attribution-Share Alike 2.5 Canada License. \n * To view a copy of this license, visit http://creativecommons.org/licenses/by-sa/2.5/ca/ \n * or send a letter to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.\n *\n * @copyright		Copyright 2008, Mark Story.\n * @link			http://mark-story.com\n * @license			http://creativecommons.org/licenses/by-sa/2.5/ca/\n */\n\n/*\n* Global geshi styles\n**********************/\narticle.contents pre ol {\n	list-style: decimal;\n	list-style-position: outside;\n	padding: 0;\n	margin: 0;\n}\narticle.contents pre ol li {\n	margin: 0 0 0 35px;\n	padding: 0;\n	color: #333;\n	clear: none;\n}\npre ol li div {\n	color:#fff;\n}\n\n/* Line highlights */\n.li1 {\n	background: #E4E8EF;\n}\n\n\n/* comments */\n.co1,\n.coMULTI {\n	color:#5A526E;	\n}\n/* methods */\n.me1{\n	color:#CCC;\n}\n.me0 {	\n\n}\n.me2 {	\n	color:#CCC;\n}\n\n/* brackets */\n.br0 {\n	color:#D9EB7F;\n}\n\n/* strings */\n.st0 {\n	color:#EBC57F;\n}\n\n/* keywords */\n.kw1 {\n	color: #D57FEB;\n}\n.kw2 {\n	color:#EB7F9A;\n	font-style: italic;		\n}\n\n.kw3 {\n	color:#693A17;\n}\n\n/* numbers */\n.nu0 {\n	color:#7FEB7F;\n}\n\n/* vars */\n.re0 {\n	color:#7FEBE9;\n}\n\n\n/* \n* CSS selectors \n*****************/\n/* classnames */\n\n[lang=css] .kw2,\n.css .kw2 {\n	color:#C24F24;\n}\n[lang=css] .kw1,\n.css .kw1 {\n	color:#691C97;\n}\n[lang=css] .re0,\n.css .re0 {\n	color: #C24F24;\n}\n.re1 {\n	color: #C24F24;\n}\n/* px values */\n[lang=css] .re3,\n.css .re3 {\n	color:#84252A;\n}\n\n/*\n* Python\n****************/\n[lang=python] ol li div,\n.python ol li div {\n	color: #CCC;\n}\n[lang=python] .kw2,\n.python .kw2 {\n	font-style: normal;\n}\n[lang=python] .kw1 {\n	color: #A91D5D;\n}\n/*\n* Javascript\n****************/\n[lang=javascript] .me1,\n.javascript .me1 {\n	color: #794938;\n}\n.clear{clear:both;}', 'Styles CSS'),
('error404', '<h2>Server Error: 404 (Not Found)</h2>\n<h3>What does this mean?</h3>\n<p>\nWe couldn''t find the page you requested on our servers. We''re really sorry\nabout that. It''s our fault, not yours. We''ll work hard to get this page\nback online as soon as possible.\n</p>', 'Template Erro 404'),
('post', '<article id="article" class="overview">\n	<h1><a href="{{url}}">{{name}}</a></h1>\n	<p class="datetime">\n		Posted on\n		<time datetime="{{dateformated}}" title="{{dateformated}}">\n			{{timeago}}\n		</time> \n	</p>\n	<ul class="categories">\n	{{#categories}}\n	    <li><a href="{{url}}">{{name}}</a></li>\n	{{/categories}}\n	</ul>\n	<div class="clear"></div>\n</article> \n<article class="contents">\n	{{content}}\n\n<div id="share">\n	<div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>\n	<div id="twitter">\n		<a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url}}" data-text="{{name}}" data-count="horizontal" data-via="pererinha">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>\n	</div>\n</div>\n\n<div id="fb-root"></div>\n<script>(function(d, s, id) {\n  var js, fjs = d.getElementsByTagName(s)[0];\n  if (d.getElementById(id)) return;\n  js = d.createElement(s); js.id = id;\n  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=282603045097604";\n  fjs.parentNode.insertBefore(js, fjs);\n}(document, ''script'', ''facebook-jssdk''));</script>\n	<div id="comments">\n	<h2>Comments</h2>\n		<div class="fb-comments" data-href="{{url}}" data-num-posts="2" data-width="500" data-colorscheme="dark"></div>\n		<div id="fb-root"></div>\n		<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=282603045097604"; fjs.parentNode.insertBefore(js, fjs);}(document, ''script'', ''facebook-jssdk''));</script>\n	</div>\n</article>', 'Template for a post'),
('posts', '<section id="posts">\n	<h1 id="title">\n	{{#allposts}}\n		<a href="{{allposts.url}}">All posts</a>\n	{{/allposts}}\n	{{#category}}\n		Posts under category <a href="{{category.url}}">{{category.name}}</a>\n	{{/category}}\n	</h1>\n	<ul id=''posts''>\n	{{#posts}}\n	    <li>\n			<article class=''overview''>\n				<h1><a href="{{url}}">{{name}}</a></h1>\n				<p class="datetime">\n					Posted on\n					<time datetime="{{dateformated}}" title="{{dateformated}}">\n						{{timeago}}\n					</time> \n				</p>\n				<ul class="categories">\n				{{#categories}}\n				    <li><a href="{{url}}">{{name}}</a></li>\n				{{/categories}}\n				</ul>\n			</article>\n			<div class="clear"></div>\n		</li>\n	{{/posts}}\n	</ul>\n	<div id="pagination">\n	{{pagination}}\n	</div>\n</section>', 'Template for posts list');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`slug_id`) REFERENCES `slug` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`slug_id`) REFERENCES `slug` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
