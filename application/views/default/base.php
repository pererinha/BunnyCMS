<!DOCTYPE html>
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{title}} {{#subtitle}} - {{subtitle}} {{/subtitle}}</title>
{{linkcss}}
<link href="http://fonts.googleapis.com/css?family=Convergence" rel="stylesheet" type="text/css">
<link href="{{urlfeed}}" rel="alternate" title="Atom feed" type="application/atom+xml">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=0.6, maximum-scale=1.0" />
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
		</ul>
	<div class="clear"></div>
	</nav>
	<section id="contents">
		{{content}}
	</section>
	<footer>
		<pre>
		 (\\/)
		( . .)
		c(")(") <a href="https://github.com/pererinha/BunnyCMS" target="_blank">BunnyCMS</a> | <a href="{{urlfeed
		}}" target="_blank">Feed</a> 
		</pre>
	</footer>
</body>
</html>