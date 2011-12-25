<article id="article" class="overview">
	<h1><a href="{{url}}">{{name}}</a></h1>
	<p class="datetime">
		Posted on
		<time datetime="{{dateformated}}" title="{{dateformated}}">
			{{timeago}}
		</time> 
	</p>
	<ul class="categories">
	{{#categories}}
	    <li><a href="{{url}}">{{name}}</a></li>
	{{/categories}}
	</ul>
	<div class="clear"></div>
</article> 
<article class="contents">
	{{content}}

<div id="share">
	<div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
	<div id="twitter">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url}}" data-text="{{name}}" data-count="horizontal" data-via="pererinha">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
	</div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=282603045097604";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="comments">
	<h2>Comments</h2>
		<div class="fb-comments" data-href="{{url}}" data-num-posts="2" data-width="500" data-colorscheme="dark"></div>
		<div id="fb-root"></div>
		<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=282603045097604"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
	</div>
</article>