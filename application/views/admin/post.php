<?php echo Form::open( 'admin/post/' . $post->id, 'POST' ); ?>
<fieldset>
	<div class="row">
	<div class="span10">
  <div class="clearfix">
    <label for="name"><?php echo Lang::line( 'admin.post-name' ); ?></label>
    <div class="input">
      <input type="text" size="50" name="name" id="name" value="<?php echo stripcslashes( $post->name ); ?>" class="xlarge">
		<?php if ( $post->id > 0 ) {?>
			<a target="_blank" href="<?php echo URL::to( $post->slug->slug ) ; ?>">
			<?php if( $post->status === Post::$statusDraft ) { ?>
				<span class="label"><?php echo Lang::line( 'admin.post-status-draft' ); ?></span>
			<?php } else { ?>
				<span class="label success"><?php echo Lang::line( 'admin.post-status-public' ); ?></span>
			<?php } ?>
		<?php } ?>
		</a>
    </div>
  </div><!-- /clearfix -->
  <div class="clearfix">
      <textarea rows="3" id="content" name="content" style="height:400px;" class="xxlarge"><?php echo stripcslashes( $post->content ); ?></textarea>
  	  <?php if( $usemarkdown ) { ?>	
		<br /><a href="http://warpedvisions.org/projects/markdown-cheat-sheet/" target="_blank">Markdown cheat sheet</a>
	<?php } ?>
	</div><!-- /clearfix -->
  <div class="clearfix">
    <label for="type"><?php echo Lang::line( 'admin.post-type' ); ?></label>
    <div class="input">
      <select id="type" name="type">
        <option value="<?php echo Post::$typePost; ?>" <?php if( $post->type == Post::$typePost ){ echo 'selected="selected"'; } ?>><?php echo Lang::line( 'admin.post-type-post' ); ?></option>
        <option value="<?php echo Post::$typePage; ?>" <?php if( $post->type == Post::$typePage ){ echo 'selected="selected"'; } ?>><?php echo Lang::line( 'admin.post-type-page' ); ?></option>
      </select>
    </div>
  </div><!-- /clearfix -->
  <div class="clearfix">
    <label for="status"><?php echo Lang::line( 'admin.post-status' ); ?></label>
    <div class="input">
      <select id="status" name="status">
        <option value="<?php echo Post::$statusDraft; ?>" <?php if( $post->status == Post::$statusDraft ){ echo 'selected="selected"'; } ?>><?php echo Lang::line( 'admin.post-status-draft' ); ?></option>
        <option value="<?php echo Post::$statusPublic; ?>" <?php if( $post->status == Post::$statusPublic ){ echo 'selected="selected"'; } ?>><?php echo Lang::line( 'admin.post-status-public' ); ?></option>
      </select>
    </div>
  </div><!-- /clearfix -->
	</div>
   		<div class="span4">
     		<h3><?php echo Lang::line( 'admin.categories' ); ?></h3>
			<div id="categories">
			<?php 
			foreach( $post->categories as $category ){ 
			?>
				<div class="clearfix">
					<input id="category[]" class="span3 category" type="text" placeholder="" name="category[]" value="<?php echo stripcslashes( $category->name ); ?>">
				</div>
				<?php
			} ?>
			</div>
			<a href="javascript:addCategory()" class="btn"><?php echo Lang::line( 'admin.category-add' ); ?></a>
			<p><span class="help-block" style="margin-top:15px;">
				<strong><?php echo Lang::line( 'admin.category-note' ); ?></strong>
				<?php echo Lang::line( 'admin.category-to-remove' ); ?>
			</span>
			</p>
   		</div>
 </div>
  <div class="actions">
	<div class="row">
		<div class="span9">
    		<input type="submit" value="<?php echo Lang::line( 'admin.btn-save' ); ?>" class="btn success">&nbsp;<button class="btn" type="reset"><?php echo Lang::line( 'admin.btn-cancel' ); ?></button>
    	</div>
		<?php if ( $post->id > 0 ) {?>
		<div class="span2">
			<a href="<?php echo URL::to( '/admin/delete/' . $post->id ) ; ?>?csrf_token=<?php echo Session::token(); ?>" class="btn danger"><?php echo Lang::line( 'admin.btn-delete' ); ?></a> 
		</div>
		<?php } ?>
	</div>
</fieldset>
<?php echo Form::token();?>
<?php echo Form::close();?>
<script type="text/javascript">
function addCategory(){
	var field = '<div class="clearfix"><input id="category[]" class="span3 category" type="text" placeholder="" name="category[]" value=""></div>';
	$('#categories').append( field );
	addCategoryListener();
}
function addCategoryListener(){
	$( 'input.category' ).each(function(){
		$(this).keypress(function(e){
			code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13){
				addCategory();
				e.preventDefault();
			}
		});
	});

}
<?php if( !$usemarkdown ) { ?>
$(function() {
	var EditorOptions = {
		uploadURI : '<?php echo URL::to("/admin/upload");?>',
		iconsPath : '<?php echo URL::to_asset("js/admin//nicEditorIcons.gif") ?>',  
		maxHeight : 400,
	}
	addCategoryListener();
	bkLib.onDomLoaded(function() { new nicEditor(EditorOptions).panelInstance( 'content' ); });
});
<?php } ?>
</script>