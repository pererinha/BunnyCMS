<?php if( count( $templates ) > 0 ) { ?>
<table id="list" class="zebra-striped">
	<thead>
		<tr>
		<th>#</th>
		<th><?php echo Lang::line( 'admin.template-name' ); ?></th>
		<th><?php echo Lang::line( 'admin.template-description' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$count = 1;
		foreach( $templates as $template ) { ?>
		<tr>
			<td><?php echo $count; ?></td>
			<td><a href="<?php echo URL::to( '/admin/template/' . $template->id ) ; ?>"><?php echo stripcslashes( $template->id ); ?></a></td>
			<td><?php echo stripcslashes( $template->description ) ?></td>
		</tr>
		<?php 
		$count++;
		} ?>
	</tbody>
</table>
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