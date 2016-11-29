<?php
/**
 * 这是 Typecho 1.0 系统的一套响应式模板。如果你经常使用Chrome，你一定会觉得这个模板很熟悉。不然，你在Chrome浏览器地址栏敲入 chrome://settings/ 再回车看一下。
 * 
 * @package Chrisme
 * @author 破相
 * @version 1.0.9
 * @link https://xfuny.com
 */
 $this->need('header.php');
?>
		  <div class="page">
		    <?php while($this->next()): ?>
		    <div class="post">
		      <h3 class="post-title">
			    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
			  </h3>
			  <ul class="post-meta">
			    <li><span class="glyphicon glyphicon-user"></span><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li>
			    <li><span class="glyphicon glyphicon-calendar"></span><?php $this->date('F j, Y'); ?></li>
			    <li><span class="glyphicon glyphicon-folder-open"></span><?php $this->category(','); ?></li>
			    <li class="meta-comment"><span class="glyphicon glyphicon-comment"></span><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			  </ul>
			  <div class="post-content">
			    <?php $this->content('- 阅读剩余部分 -'); ?>
			  </div>
			  <p class="tag"><?php $this->tags(' ', true, ' '); ?></p>
		    </div>
			<?php endwhile; ?>
			
			<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
			
		  </div>
		</div>

		<?php $this->need('sidebar.php'); ?>
		<?php $this->need('footer.php'); ?>