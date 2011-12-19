<?php if( count( $posts ) > 0 ) { ?>
<table id="list" class="zebra-striped">
	<thead>
		<tr>
		<th>#</th>
		<th><?php echo Lang::line( 'admin.post-name' ); ?></th>
		<th><?php echo Lang::line( 'admin.post-slug' ); ?></th>
		<th><?php echo Lang::line( 'admin.post-date' ); ?></th>
		<th><?php echo Lang::line( 'admin.post-status' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$count = 1;
		foreach( $posts->results as $post ) { 
			$slug = Slug::find( $post->slug_id );
		?>
		<tr>
			<td><?php echo $count; ?></td>
			<td><a href="<?php echo URL::to( '/admin/post/' . $post->id ) ; ?>"><?php echo stripcslashes( $post->name ); ?></a></td>
			<td><?php echo $slug->slug; ?></td>
			<td><?php echo date( 'm/d/Y H:i:s', Date::mysqlToUnix( $post->date ) );  ?></td>
			<td>
				<a href="<?php echo URL::to( $slug->slug ) ; ?>">
				<?php if( $post->status === Post::$statusDraft ) { ?>
					<span class="label"><?php echo Lang::line( 'admin.post-status-draft' ); ?></span>
				<?php } else { ?>
					<span class="label success"><?php echo Lang::line( 'admin.post-status-public' ); ?></span>
				<?php } ?>
				</a>
			</td>
		</tr>
		<?php 
		$count++;
		} ?>
	</tbody>
</table>
<div id="pagination">
	<?php echo $posts->previous().' | '.$posts->next(); ?>
</div>
<script >
$(function() {$("table#list").tablesorter();});
</script>
<?php } else { ?>
<div>
	<h3><?php echo Lang::line( 'admin.post-nothing' ); ?></h3>
	<p><?php echo Lang::line( 'admin.post-nothing-call-action' ); ?></p>
	<a class="btn small success" href="<?php echo URL::to( '/admin/post/0' ) ; ?>"><?php echo Lang::line( 'admin.btn-new' ); ?></a>
</div>
<?php } ?>