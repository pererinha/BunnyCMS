-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2011 at 07:36 PM
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
  `footer` text COLLATE utf8_unicode_ci NOT NULL,
  `dateformat` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `slugallposts` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `author`, `password`, `title`, `tagline`, `description`, `footer`, `dateformat`, `slugallposts`) VALUES
('BunnyCMS', 'Little Cute Bunny', '1b319c1cf17a571a1771e94dbc9a587aa028ad48', 'Hi there,', 'Welcome to my blog', 'This blog was made by BunnyCMS.', '<p>This blog was made by <a href=\\"https://github.com/pererinha/BunnyCMS\\" title=\\"\\" target=\\"\\">BunnyCMS</a>.</p>', 'd/m/Y', 'listartudo');

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
('base', '{{%UNESCAPED}} <!-- Please do not remove this line -->\n<!DOCTYPE html>\n<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">\n<head>\n<title>{{settings.title}} {{#subtitle}} - {{subtitle}} {{/subtitle}}</title>\n{{linkcss}}\n<link href=''http://fonts.googleapis.com/css?family=Convergence'' rel=''stylesheet'' type=''text/css''>\n<meta charset="utf-8">\n<meta name="viewport" content="width=device-width, minimum-scale=0.6, maximum-scale=1.0" />\n<meta name="description" content="{{settings.description}}">\n</head>\n<body>\n<header>\n<h1>{{settings.title}}</h1>\n<p id="tagline">{{settings.tagline}}</p>\n</header>\n	<nav>\n		<ul>\n			<li><a href="{{urlhome}}">Home</a></li>\n			<li><a href="{{urlallposts}}">All Posts</a></li>\n			{{#pages}}\n			    <li><a href="{{url}}" title="{{name}}">{{name}}</a></li>\n			{{/pages}}\n		</ul>\n	<div class="clear"></div>\n	</nav>\n	<section id="contents">\n		{{content}}\n	</section>\n	<footer>\n		{{settings.footer}}\n	</footer>\n</body>\n</html>', 'Template base'),
('css', 'html * {margin:0;padding:0;}\nbody{\n	color:#666;\n	background:#F5F5F5;\n	font-family:Georgia, Helvetica, Arial, sans-serif;\n}\na{\n	color:#256FCF;\n	text-decoration:none;\n}\n	a:hover{\n		background:#256FCF;\n		color:#FFF;\n		text-shadow:none;\n	}\nh1, h2, h3{font-family: ''Convergence'', sans-serif;}\nsection, header, footer, nav{\n	width:800px;\n	margin:0 auto;\n}\n\nheader{\n	margin:20px auto;\n}\n	header h1{\n		color:#666;\n		font-size:50px;\n		line-height:75px;\n		text-shadow: 0px 2px 3px #F5F5F5;\n	}\n	header p{\n\n	}\nnav{\n	border:1px solid #CCC;\n	border-left:none;\n	border-right:none;\n	padding:5px 0;\n}\n	nav ul{\n		list-style:none;\n	}\n		nav ul li{\n			float:left;\n		}\n			nav ul li a{\n				margin:5px;\n			}\n\nsection{}\n	section h2{\n		font-size:35px;\n		margin:30px 0 10px 0;\n		text-shadow: 0px 2px 3px #F5F5F5;\n	}\n.overview *{\n	font-size:12px;\n}\n	.overview p{\n		color:#999;\n		float:left;\n		margin:0 0 10px 0;\n	}\n	.overview ul{\n		list-style:none;\n	}\n		.overview ul li{\n			float: left;\n			padding:0 5px 0 5px;\n		}\narticle.contents{}\n	article.contents h3{\n		border-bottom:1px solid #CCC;\n		color:#999;\n		font-size:28px;\n		margin:40px 0 20px 0;\n		text-shadow: 0px 2px 3px #F5F5F5;\n	}\n	article.contents p{\n		line-height:26px;\n	}\n		article.contents p{\n			margin:0 0 15px 0;\n		}\n	article.contents ul, article.contents ol{\n		line-height:26px;\n		margin:15px 0 15px 25px;\n	}\n	article.contents pre{\n		background:#000;\n		color:#FFF;\n		margin:10px 0;\n		padding:5px;\n	}\n#twitter{\n	width:100px;\n	float:right;\n}\n#facebook-like{\n	margin:30px 0 0 0;\n}\n#pagination{\n	margin:40px 0 0 0;\n	text-align:center;\n}\nul#posts{\n	list-style:none;\n}\n	ul#posts li h3{\n		font-size:23px;\n		margin:20px 0 10px 0;\n	}\nfooter{\n	border-top:1px solid #CCC;\n	color:#999;\n	font-size:14px;\n	margin-bottom:30px;\n	margin-top:60px;\n	padding:15px 0 0 0;\n}\n.clear{clear:both;}', 'Styles CSS'),
('error404', '<h2>Server Error: 404 (Not Found)</h2>\n<h3>What does this mean?</h3>\n<p>\nWe couldn''t find the page you requested on our servers. We''re really sorry\nabout that. It''s our fault, not yours. We''ll work hard to get this page\nback online as soon as possible.\n</p>', 'Template Erro 404'),
('post', '{{%UNESCAPED}} <!-- Please do not remove this line -->\n<div id="twitter">\n	<a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url}}" data-text="{{name}}" data-count="horizontal" data-via="pererinha">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>\n</div>\n<h2><a href="{{url}}">{{name}}</a></h2>\n<article class="overview">\n	<p class=''details''>\n		Posted on\n		<time datetime="{{dateformated}}" title="{{dateformated}}">\n			{{timeago}}\n		</time>\n		under \n		<ul class="categories">\n		{{#categories}}\n		    <li><strong><a href="{{url}}">{{name}}</a></strong></li>\n		{{/categories}}\n		</ul>\n	</p>\n	<div class="clear"></div>\n</article> \n<article class="contents">\n	{{content}}\n</article>\n<p id="facebook-like">\n	<iframe src="http://www.facebook.com/plugins/like.php?href={{url}}" scrolling="no" frameborder="0" style="border:none; width:450px; height:80px"></iframe>\n</p>\n<div class="fb-comments" data-href="{{url}}" data-num-posts="5" data-width="500"></div>\n<div id="fb-root"></div>\n<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=282603045097604"; fjs.parentNode.insertBefore(js, fjs);}(document, ''script'', ''facebook-jssdk''));</script>', 'Template for a post'),
('posts', '{{%UNESCAPED}} <!-- Please do not remove this line -->\n{{#allposts}}\n	<h2><a href="{{allposts.url}}">All posts</a></h2>\n{{/allposts}}\n{{#category}}\n	<h2>Posts under category <a href="{{category.url}}">{{category.name}}</a></h2>\n{{/category}}\n<ul id=''posts''>\n{{#posts}}\n    <li>\n		<h3><a href="{{url}}">{{name}}</a></h3>\n		<article class=''overview''>\n			<p class=''details''>\n				Posted on\n				<time datetime="{{dateformated}}" title="{{dateformated}}">\n					{{timeago}}\n				</time>\n				under \n				<ul class="categories">\n					{{#categories}}\n			    		<li><strong><a href="{{url}}">{{name}}</a></strong></li>\n					{{/categories}}\n				</ul>\n			</p>\n			<div class="clear"></div>\n		</article>\n	</li>\n{{/posts}}\n</ul>\n<div id="pagination">\n{{pagination}}\n</div>', 'Template for posts list');

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
