<?php
/**
 * 仿简书主题（变异版），基于简书1.1.1版本修改。。
 * 
 * @package JianShu(变异版)
 * @author 绛木子
 * @version 1.1.1
 * @link http://lixianhua.com
 *
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
?>
<div id="main-container" class="main-container">
<?php while($this->next()): ?>
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
		<?php if(!empty($this->options->listStyle) && in_array('thumb',$this->options->listStyle)): ?>
		  <?php showThumb($this);?>
		<?php endif; ?>
		<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->sticky();$this->title() ?></a></h2>
		<ul class="post-meta">
		    <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('<i class="fa fa-user"></i>'); ?> <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
		    <li><?php _e('<i class="fa fa-book"></i> '); ?><?php $this->category(','); ?></li>
		    <li><?php _e('<i class="fa fa-clock-o"></i> '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php echo formatTime($this->created); ?></time></li>
		    <li><?php _e('<i class="fa fa-eye"></i> 阅读 '); ?><?php $this->viewsNum(); ?></li>
			<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#<?php $this->respondId(); ?>"><?php $this->commentsNum('<i class="fa fa-comments-o"></i> 评论 %d'); ?></a></li>
		</ul>
        <?php if(!empty($this->options->listStyle) && in_array('excerpt',$this->options->listStyle)): ?>
    	<div class="post-content" itemprop="articleBody">
			<?php $this->description(); ?>
		</div>
		<?php endif; ?>
    </article>
<?php endwhile; ?>
    <div class="page-navigator">
         <?php $this->pageNav() ;?>
    </div>

</div>
<?php $this->need('footer.php'); ?>