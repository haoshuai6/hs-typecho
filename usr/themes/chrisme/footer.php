		<div class="col-lg-6 col-md-10 col-xs-12 col-md-offset-2 footer">
		  <div class="widget copyright">
		    <p>&copy; 2015-<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"> <?php $this->options->title(); ?> </a>由<a href="http://www.typecho.org" target="_blank"> Typecho))) </a>强力驱动</p>
			<p>主题<a href="https://xfuny.com/chrisme.html" target="_blank" title="免费响应式简洁主题"> Chrisme for Typecho))) </a>由破相设计</p>

            <div class="analytics"><?php $this->options->blogAnalytics() ?></div>
		 </div>
		</div>
		<?php $this->footer(); ?>
	  </div>
	</div>

	<script src="http://cdn.bootcss.com/jquery/3.0.0/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="<?php $this->options->themeUrl('main.js'); ?>"></script>
  </body>
</html>