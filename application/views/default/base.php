<!DOCTYPE html>
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{{title}} {{#subtitle}} - {{subtitle}} {{/subtitle}}</title>
	{{linkcss}}
	<link href="{{urlfeed}}" rel="alternate" title="Atom feed" type="application/atom+xml">
	<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="description" content="{{description}}">
</head>
<body>
	<header>
		<h1>{{title}}</h1>
		<p id="tagline">{{tagline}}</p>
	</header>
	<nav>
		<ul>
			<li><a href="{{urlhome}}">Home</a></li>
			<li><a href="{{urlallposts}}">All Posts</a></li>
			{{#pages}}
			<li><a href="{{url}}" title="{{name}}">{{name}}</a></li>
			{{/pages}}
			<li><a href="{{urlfeed}}" target="_blank">Feed</a></li>
		</ul>
		<div class="clear"></div>
	</nav>
	<section id="contents">
		{{content}}
	</section>
	<footer>
		<a href="https://github.com/pererinha/BunnyCMS" target="_blank">BunnyCMS</a> | <a href="{{urlfeed}}" target="_blank">Feed</a> 					
	</footer>
</body>
</html>