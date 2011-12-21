{{#allposts}}
	<h2><a href="{{allposts.url}}">All posts</a></h2>
{{/allposts}}
{{#category}}
	<h2>Posts under category <a href="{{category.url}}">{{category.name}}</a></h2>
{{/category}}
<ul id='posts'>
{{#posts}}
    <li>
		<h3><a href="{{url}}">{{name}}</a></h3>
		<article class='overview'>
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
	</li>
{{/posts}}
</ul>
<div id="pagination">
{{pagination}}
</div>