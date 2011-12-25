<section id="posts">
	<h1 id="title">
	{{#allposts}}
		<a href="{{allposts.url}}">All posts</a>
	{{/allposts}}
	{{#category}}
		Posts under category <a href="{{category.url}}">{{category.name}}</a>
	{{/category}}
	</h1>
	<ul id='posts'>
	{{#posts}}
	    <li>
			<article class='overview'>
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
			</article>
			<div class="clear"></div>
		</li>
	{{/posts}}
	</ul>
	<div id="pagination">
	{{pagination}}
	</div>
</section>