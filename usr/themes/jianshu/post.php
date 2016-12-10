<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
	.gh-btn {
		padding: 2px 5px 2px 4px;
		color: #333;
		text-decoration: none;
		text-shadow: 0 1px 0 #fff;
		white-space: nowrap;
		cursor: pointer;
		border-radius: 3px;
		display: inline-block;
		width: 220px;
		margin: 0 auto;
		background-color: #e6e6e6;
		background-image: -webkit-gradient(linear,0 0,0 100%,from(#fafafa),to(#eaeaea));
		background-image: -webkit-linear-gradient(#fafafa,#eaeaea);
		background-image: -moz-linear-gradient(top,#fafafa,#eaeaea);
		background-image: -ms-linear-gradient(#fafafa,#eaeaea);
		background-image: -o-linear-gradient(#fafafa,#eaeaea);
		background-image: linear-gradient(#fafafa,#eaeaea);
		background-repeat: no-repeat;
		border: 1px solid #d4d4d4;
		border-bottom-color: #bcbcbc
	}
	.gh-btn:hover,.gh-btn:focus,.gh-btn:active {
		color: #fff;
		text-decoration: none;
		text-shadow: 0 -1px 0 rgba(0,0,0,.25);
		border-color: #518cc6 #518cc6 #2a65a0;
		background-color: #3072b3
	}
	.gh-btn:hover,.gh-btn:focus {
		background-image: -webkit-gradient(linear,0 0,0 100%,from(#599bdc),to(#3072b3));
		background-image: -webkit-linear-gradient(#599bdc,#3072b3);
		background-image: -moz-linear-gradient(top,#599bdc,#3072b3);
		background-image: -ms-linear-gradient(#599bdc,#3072b3);
		background-image: -o-linear-gradient(#599bdc,#3072b3);
		background-image: linear-gradient(#599bdc,#3072b3)
	}
	.gh-btn:active {
		background-image: none;
		-webkit-box-shadow: inset 0 2px 5px rgba(0,0,0,.1);
		-moz-box-shadow: inset 0 2px 5px rgba(0,0,0,.1);
		box-shadow: inset 0 2px 5px rgba(0,0,0,.1)
	}
	.git-text{
		font-size: 20px;
		zoom: 1;
	}

</style>
<div class="main-container">
    <article class="post preview" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta clearfix">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('<i class="fa fa-user"></i>'); ?> <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('<i class="fa fa-book"></i>'); ?> <?php $this->category(','); ?></li>
            <li><?php _e('<i class="fa fa-clock-o"></i>'); ?> <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d H:i:s'); ?></time></li>
            <li><?php _e('<i class="fa fa-eye"></i> 阅读 '); ?><?php $this->viewsNum(); ?></li>
	    <li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#<?php $this->respondId(); ?>"><?php $this->commentsNum('<i class="fa fa-comments-o"></i> 评论 %d'); ?></a></li>
            <li class="post-qrcode"><i class="fa fa-qrcode"></i>
                <div id="qrcode-img"></div>
            </li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php parseContent($this); ?>
        </div>
		<div class="post-donate">
			<p><i class="fa fa-rmb"></i> 打赏几块钱，让服务器君跑的更快些，谢谢大家！<button class="btn s2 fr" onclick="$('#alipay-form').submit();"><i class="fa fa-cny"> <?php _e('打赏支持');?></i></button></p>
			<div class="post-donate-img">
				<p>支付宝二维码</p>
				<img src="<?php $this->options->themeUrl('img/alipay.png'); ?>">
			</div>
			<form id="alipay-form" action="https://shenghuo.alipay.com/send/payment/fill.htm" method="POST" target="_blank" accept-charset="GBK">
				<input type="hidden" name="optEmail" value="<?php $this->options->alipayAccount();?>">
				<input type="hidden" name="payAmount" value="<?php $this->options->alipayAmount();?>">
				<input type="hidden" name="title" value="<?php _e('打赏：');$this->title();?>">
			</form>
		</div>
        <p></p>
	<div class="bdsharebuttonbox">
	   <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
	   <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
	   <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
	   <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
	   <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
	   <a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a>
	   <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
	   <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
	   <a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a>
	   <a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a>
	   <a href="#" class="bds_more" data-cmd="more"></a>

		</div>
        <div class="post-footer">
	    <section class="author">
	      <div class="author-ava"><img src="<?php if ($this->options->gravatar): ?><?php $this->options->gravatar() ?><?php else: ?><?php $this->options->themeUrl('img/avatar.png'); ?><?php endif; ?>" >
	      </div>
	      <p><?php $this->options->tips(); ?></p>
	      <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>

		  <a class="gh-btn" id="gh-btn" href="https://github.com/haoshuai6" target="_blank">
			<i class="fa fa-github fa-2x"></i> <span class="git-text">关注作者 @haoshuai6</span>
		  </a>
			
	    </section>
        </div>
    </article>
	<?php Like_Plugin::theLike(); ?>
    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>