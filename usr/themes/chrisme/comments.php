			<?php function threadedComments($comments, $options) {
			  $commentClass = '';
			  if ($comments->authorId) {
			    if ($comments->authorId == $comments->ownerId) {
			      $commentClass .= ' comment-by-author';
			    } else {
			      $commentClass .= ' comment-by-user';
			    }
			  }
			  $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
			?>
			<li id="li-<?php $comments->theId(); ?>" class="media comment-body<?php 
			if ($comments->levels > 0) {
			  echo ' comment-child';
			  $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
			} else {
			  echo ' comment-parent';
			}
			$comments->alt(' comment-odd', ' comment-even');
			echo $commentClass;
			?>">
			  <span class="pull-left">
				<?php
				//头像CDN by Rich http://forum.typecho.org/viewtopic.php?f=5&t=6165&p=29961&hilit=gravatar#p29961
				$host = 'http://cdn.v2ex.com'; //自定义头像CDN服务器
				$url = '/gravatar/'; //自定义头像目录,一般保持默认即可
				$size = '40'; //自定义头像大小
				$rating = Helper::options()->commentsAvatarRating;
				$hash = md5(strtolower($comments->mail));
				$avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
				?>
				<img class="avatar media-object" src="<?php echo $avatar ?>">
			  </span>
			  <div id="<?php $comments->theId(); ?>" class="media-body">
			    <h4 class="media-heading"><?php $comments->author(); ?><time datetime="<?php $comments->date('Y-m-d H:i'); ?>"><span class="glyphicon glyphicon-time"></span><?php $comments->date('Y-m-d H:i'); ?></time><span class="comment-reply pull-right"><?php $comments->reply(); ?></span></h4>
			    <div class="comment-content"><?php $comments->content(); ?></div>
			  </div>
			  <?php if ($comments->children) { ?>
			  <div class="comment-children">
			    <?php $comments->threadedComments($options); ?>
			  </div>
			  <?php } ?>
			</li>
			<?php } ?>
			
			<div id="comments">
			  <?php $this->comments()->to($comments); ?>
			  <?php if ($comments->have()): ?>
			  <p class="bg-warning"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></p>
			  <?php $comments->listComments(); ?>
			  <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
			  <?php endif; ?>			  
			  <?php if($this->allow('comment')): ?>
			  <div id="<?php $this->respondId(); ?>" class="respond">
			    <div class="cancel-comment-reply">
			      <?php $comments->cancelReply(); ?>
			    </div>
				<h3 class="response">添加新评论</h3>
				<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
				  <?php if($this->user->hasLogin()): ?>
				  <p><?php _e('登录身份：'); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?>&nbsp<span class="glyphicon glyphicon-log-out"></span></a></p>
				  <?php else: ?>
				  <div class="input-group input-group-sm">
				    <label for="author" class="input-group-addon"><span class="glyphicon glyphicon-user"></span></label>
					<input type="text" name="author" id="author" class="form-control" value="<?php $this->remember('author'); ?>" placeholder="昵称" required />
				  </div>
				  <div class="input-group input-group-sm">
				    <label for="mail" class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></label>
					<input type="email" name="mail" id="mail" class="form-control" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> placeholder="邮箱"/>
				  </div>
				  <div class="input-group input-group-sm">
				    <label for="url" class="input-group-addon"><span class="glyphicon glyphicon-link"></span></label>
					<input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('网址'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
				  </div>
				  <?php endif; ?>
				  <div class="text-sub">
				    <textarea rows="8" cols="32" name="text" id="textarea" class="textarea sim-textarea"></textarea>
				    <button type="submit" class="btn btn-default btn-sm submit sim-btn">添加新评论<span class="glyphicon glyphicon-send"></span></button>
				  </div>
				</form>
			  </div>
			  <?php else: ?>
			  <p class="bg-warning">评论已关闭</p>
			  <?php endif; ?>
			</div>