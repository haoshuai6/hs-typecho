		<div class="col-lg-2 col-lg-offset-10 col-md-10 col-md-offset-2 col-xs-12 sidebar">
		  <div class="log-in">
		    <a href="javascript:void(null);" id="btn-theme" title="切换主题"><span class="glyphicon glyphicon-adjust"></span></a>
		    <a href="#" id="btn-phone" data-toggle="modal" data-target=".bs-example-modal-sm" title="手机浏览"><span class="glyphicon glyphicon-phone"></span></a>
		    <a href="javascript:void(null);" id="btn-text" title="变更字体大小"><span class="glyphicon glyphicon-text-width"></span></a>
          </div>
		  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
		  <div class="widget widget-article">
		    <h3><span class="glyphicon glyphicon-list-alt"></span>最新文章</h3>
			<ul class="widget-list">
			  <?php $this->widget('Widget_Contents_Post_Recent')
			  ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
			</ul>
		  </div>
		  <?php endif; ?>
		  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
		  <div class="widget widget-comments">
		    <h3><span class="glyphicon glyphicon-comment"></span>最新评论</h3>
			<ul class="widget-list">
			<?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
			<?php while($comments->next()): ?>
			  <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(32, '...'); ?></li>
			<?php endwhile; ?>
			</ul>
		  </div>
		  <?php endif; ?>
		  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
		  <div class="widget widget-category">
		    <h3><span class="glyphicon glyphicon-tasks"></span>分类</h3>
			<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
		  </div>
		  <?php endif; ?>
		  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
		  <div class="widget widget-catalogue">
		    <h3><span class="glyphicon glyphicon-calendar"></span>归档</h3>
			<ul class="widget-list">
			  <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
			  ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
			</ul>
		  </div>
		  <?php endif; ?>
		</div>

		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="modal-phone">
              <div class="modal-phone-text">
                使用微信扫描
              </div>
              <?php if ($this->is('index')): ?>
              <img class="modal-phone-qrcode" src="http://api.qrserver.com/v1/create-qr-code/?size=180x180&data=<?php $this->options->siteUrl(); ?>" alt="使用手机浏览<?php $this->options->title(); ?>" />
              <?php else: ?>
              <img class="modal-phone-qrcode" src="http://api.qrserver.com/v1/create-qr-code/?size=180x180&data=<?php $this->permalink() ?>" alt="使用手机浏览<?php $this->title() ?>" />
              <?php endif; ?>
            </div>
          </div>
        </div>
		