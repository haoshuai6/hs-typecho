<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main-container">
    <article class="post preview" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
		<div class="post-donate">
			<p> 本博客，采用 <a href="https://creativecommons.org/licenses/by/3.0/cn/" target="_blank" style="font-weight:bold;">&lt;知识共享署名 3.0 中国大陆许可协议&gt;</a> 进行许可。
				可自由转载、引用，但需署名作者且注明文章出处。
			</p>
			<p><i class="fa fa-rmb"></i> 打赏几块钱，让服务器君跑的更快些，谢谢大家！</p>
			<div class="post-donate-img">
				<p>支付宝二维码</p>
				<img src="<?php $this->options->themeUrl('img/alipay.png'); ?>">
			</div>
			<!--<form id="alipay-form" action="https://shenghuo.alipay.com/send/payment/fill.htm" method="POST" target="_blank" accept-charset="GBK">
				<input type="hidden" name="optEmail" value="<?php /*$this->options->alipayAccount();*/?>">
				<input type="hidden" name="payAmount" value="<?php /*$this->options->alipayAmount();*/?>">
				<input type="hidden" name="title" value="<?php /*_e('打赏：');$this->title();*/?>">
			</form>-->
		</div>
        <p></p>
        <div class="bdsharebuttonbox">
		   <a href="#" class="bds_more" data-cmd="more"></a>
		   <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		   <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		   <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		   <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		   <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
		   <a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a>
		   <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		   <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
		   <a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a>
<!--		   <a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a>-->
	    </div>

		
        <div class="post-footer">
	    <section class="author">
	      <div class="author-ava"><img src="<?php if ($this->options->gravatar): ?><?php $this->options->gravatar() ?><?php else: ?><?php $this->options->themeUrl('img/avatar.png'); ?><?php endif; ?>" >
	      </div>
	      <p><?php $this->options->tips(); ?></p>
	      <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
	    </section>
        </div>

    </article>

    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->
<?php $this->need('footer.php'); ?>