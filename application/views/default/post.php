<div id="twitter">
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url}}" data-text="{{name}}" data-count="horizontal" data-via="pererinha">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
</div>
<h2><a href="{{url}}">{{name}}</a></h2>
<article class="overview">
	<p class='details'>
		Posted on
		<time datetime="{{dateformated}}" title="{{dateformated}}">
			{{timeago}}
		</time>
		under 
		<ul class="categories">
		{{#categories}}
		    <li><strong><a href="{{url}}">{{name}}</a></strong></li>
		{{/categories}}
		</ul>
	</p>
	<div class="clear"></div>
</article> 
<article class="contents">
	{{content}}
</article>
<p id="facebook-like">
	<iframe src="http://www.facebook.com/plugins/like.php?href={{url}}" scrolling="no" frameborder="0" style="border:none; width:450px; height:80px"></iframe>
</p>
<div class="fb-comments" data-href="{{url}}" data-num-posts="5" data-width="500"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=282603045097604"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>