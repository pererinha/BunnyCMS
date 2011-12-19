<?php echo Form::open( 'admin/template/' . $template->id, 'POST' ); ?>
<fieldset>
	<legend><?php echo Lang::line( 'admin.template-editing', array( 'template' => $template->id ) ); ?></legend>
	<div class="row">
		<div class="span10">
			<div class="clearfix">
				<textarea rows="3" id="content" name="content" style="height:450px;" class="span9"><?php echo stripcslashes( $template->content ); ?></textarea>
			</div><!-- /clearfix -->
		</div>
   		<div class="span4">
			<?php if( $template->id != Template::$templateCSS && $template->id != Template::$templateError404 ) { ?>
     		<h3><?php echo Lang::line( 'admin.template-variables' ); ?></h3>
			<h5><?php echo Lang::line( 'admin.template-base' ); ?></h5>
			<ul>
				<li>{{settings.title}}</li>
				<li>{{settings.description}}</li>
				<li>{{settings.tagline}}</li>
				<li>{{settings.footer}}</li>
				<li>{{subtitle}}</li>
				<li>{{linkcss}}</li>
				<li>{{urlhome}}</li>
				<li>{{urlallposts}}</li>
				<li>{{pages}}
					<ul>
						<li>{{name}}</li>
						<li>{{url}}</li>
					</ul>
				</li>
				<li>{{content}}</li>
			</ul>
			<h5><?php echo Lang::line( 'admin.template-page-post' ); ?></h5>
			<ul>
				<li>{{posts}}</li>
				<li>{{pages}}</li>
				<li>{{url}}</li>
				<li>{{name}}</li>
				<li>{{dateformated}}</li>
				<li>{{timeago}}</li>
				<li>{{content}}</li>
				<li>{{categories}}</li>
				<li>{{name}}</li>
				<li>{{url}}</li>
				</li>
			</ul>
			<?php } ?>
   		</div>
 	</div>
	<div class="actions">
		<input type="submit" value="<?php echo Lang::line( 'admin.btn-save' ); ?>" class="btn success">
		<button class="btn" type="reset"><?php echo Lang::line( 'admin.btn-cancel' ); ?></button>
		<a href="<?php echo URL::to( '/admin/template/restore/' . $template->id ) ; ?>" class="btn primary"><?php echo Lang::line( 'admin.template-restore-default-values' ); ?></a>
	</div>
</fieldset>
<?php echo Form::token();?>
<?php echo Form::close();?>