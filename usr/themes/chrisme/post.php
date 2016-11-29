<?php $this->need('header.php'); ?>

		  <div class="page">
		    <div class="post">
		      <h3 class="post-title">
			    <?php $this->title() ?>
			  </h3>
			  <ul class="post-meta">
			    <li><span class="glyphicon glyphicon-user"></span><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li>
			    <li><span class="glyphicon glyphicon-calendar"></span><?php $this->date('F j, Y'); ?></li>
			    <li><span class="glyphicon glyphicon-folder-open"></span><?php $this->category(','); ?></li>
			    <li class="meta-comment"><span class="glyphicon glyphicon-comment"></span><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			  </ul>
			  <div class="post-content">
			    <!--
				<blockquote>
				  <?php $this->excerpt(80); ?>
				</blockquote>
				-->
			    <?php $this->content(); ?>
			  </div>
			  <p class="tag"><?php $this->tags(' ', true, ' '); ?></p>
			  <div class="bg-warning">
			    <p>版权声明：<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/cn/" title="署名-非商业性使用-禁止演绎 3.0 中国大陆 (CC BY-NC-ND 3.0 CN)" target="_blank">署名-非商业性使用-禁止演绎</a></p>
			    <p>本文链接：<a href="<?php $this->permalink() ?>" title=""><?php $this->permalink() ?></a></p>
			    <p>如非特别注明，本站内容均为博主原创，转载请务必注明作者和原始出处。</p>
			  </div>
		    </div>
			<?php $this->need('comments.php'); ?>
		  </div>
		</div>
		
		<?php $this->need('sidebar.php'); ?>
		<?php $this->need('footer.php'); ?>