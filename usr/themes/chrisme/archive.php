<?php $this->need('header.php'); ?>

		  <div class="page">
		    <p class="bg-warning"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
			), '', ''); ?></p>
			<?php if ($this->have()): ?>
		    <?php while($this->next()): ?>
		    <div class="post">
		      <h3 class="post-title">
			    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
			  </h3>
			  <ul class="post-meta">
			    <li><span class="glyphicon glyphicon-user"></span><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li>
			    <li><span class="glyphicon glyphicon-calendar"></span><?php $this->date('F j, Y'); ?></li>
			    <li><span class="glyphicon glyphicon-folder-open"></span><?php $this->category(','); ?></li>
			    <li><span class="glyphicon glyphicon-comment"></span><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			  </ul>
			  <p class="tag"><?php $this->tags(' ', true, ' '); ?></p>
		    </div>
			<?php endwhile; ?>
			<?php else: ?>
            <div class="post">
		      <h3 class="post-title">
			    没有找到内容
			  </h3>
		    </div>
			<?php endif; ?>
			
			<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
		  </div>
		</div>
		
		<?php $this->need('sidebar.php'); ?>
		<?php $this->need('footer.php'); ?>