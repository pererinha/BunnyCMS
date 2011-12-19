<?php echo Form::open( 'admin/settings/', 'POST' ); ?>
<fieldset>
	<legend><?php echo Lang::line( 'admin.settings-site' ); ?></legend>
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-title' ); ?></label>
		<div class="input">
			<input type="text" size="30" name="title" id="title" value="<?php echo stripcslashes( $settings->title ); ?>" class="xxlarge">
		</div>
	</div><!-- /clearfix -->
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-tagline' ); ?></label>
		<div class="input">
			<input type="text" size="60" name="tagline" id="tagline" value="<?php echo stripcslashes( $settings->tagline ); ?>" class="xxlarge">
		</div>
	</div><!-- /clearfix -->
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-author' ); ?></label>
		<div class="input">
			<input type="text" size="30" name="author" id="author" value="<?php echo stripcslashes( $settings->author ); ?>" class="xlarge">
		</div>
	</div><!-- /clearfix -->
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-date-format' ); ?></label>
		<div class="input">
			<input type="text" size="15" name="dateformat" id="dateformat" value="<?php echo $settings->dateformat; ?>" class="xlarge">
		</div>
	</div><!-- /clearfix -->
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-slug-all-posts' ); ?></label>
		<div class="input">
			<input type="text" size="15" name="slugallposts" id="slugallposts" value="<?php echo $settings->slugallposts; ?>" class="xlarge">
		</div>
	</div><!-- /clearfix -->
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-description' ); ?></label>
		<div class="input">
			<textarea class="xxlarge" name="description" id="description" rows="3"><?php echo stripcslashes( $settings->description ); ?></textarea>
		</div>
	</div><!-- /clearfix -->
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-footer' ); ?></label>
		<div class="input">
			<textarea class="xxlarge" name="footer" id="footer" rows="3"><?php echo stripcslashes( $settings->footer ); ?></textarea>
			<span class="help-block"><?php echo Lang::line( 'admin.settings-footer-tip' ); ?></span>
		</div>
	</div><!-- /clearfix -->
</fieldset>
<fieldset>
	<legend><?php echo Lang::line( 'admin.settings-access' ); ?></legend>
	<div class="clearfix">
		<label for="name"><?php echo Lang::line( 'admin.settings-password' ); ?></label>
		<div class="input">
			<input type="password" size="60" name="password" id="password" value="" class="xlarge">
			<span class="help-block"><?php echo Lang::line( 'admin.settings-password-tip' ); ?></span>
		</div>
	</div><!-- /clearfix -->
	<div class="actions">
		<input type="submit" value="<?php echo Lang::line( 'admin.btn-save' ); ?>" class="btn success">&nbsp;<button class="btn" type="reset"><?php echo Lang::line( 'admin.btn-cancel' ); ?></button>
	</div>
</fieldset>
<?php echo Form::token();?>
<?php echo Form::close();?>
<script type="text/javascript">
$(function() {
	bkLib.onDomLoaded(function() { new nicEditor({iconsPath : '<?php echo URL::to_asset("js/admin//nicEditorIcons.gif") ?>',  maxHeight : 400}).panelInstance( 'footer' ); });
});
</script>