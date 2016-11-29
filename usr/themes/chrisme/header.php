<!DOCTYPE html>
<html lang="zh-hans">
  <head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
	<link href="http://cdn.bootcss.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('style.css'); ?>" rel="stylesheet">
    
    <!--[if lt IE 9]>
	<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<link href="<?php $this->options->themeUrl('ie8.css'); ?>" rel="stylesheet">
	<![endif]-->
	<?php $this->header('template='); ?>

  </head>
  
  <body>
    <div class="container-fluid">
	  <div class="row website">
	    <div class="col-lg-2 col-md-2 col-xs-12 navbar fixed-navbar" role="navigation">
		  <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php if ($this->options->logoUrl): ?>
		  <img class="img-circle logo" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
		  <?php else : ?>
		  <img class="img-circle logo" src="<?php $this->options->themeUrl('logo.jpg'); ?>" alt="<?php $this->options->title() ?>">
		  <?php endif; ?>
		  <h1 class="website-name"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
		  <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav nav-pills nav-stacked">
		      <li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
		      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		      <?php while($pages->next()): ?>
		      <li<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
		      <?php endwhile; ?>
		      <?php if ($this->is('post')) : ?>
		      <li class="current"><a href=" ">此页</a></li>
		      <?php endif; ?>
		    </ul>
          </div>
		</div>
		<div class="col-lg-6 col-md-10 col-xs-12 col-md-offset-2 main">
		  <div class="title">
		    <div class="row website clearfix topbar">
		      <div class="col-md-8 col-xs-12">
		        <h2 class="description"><?php $this->options->description() ?></h2>
		      </div>
		      <div class="col-md-4 col-xs-12 search-box">
		        <form id="search" method="post" action="./" role="search" class="input-group input-group-sm">
				  <input type="text" name="s" class="text form-control" placeholder="<?php _e('search'); ?>" />
				  <span class="input-group-btn">
				    <button class="btn btn-default" type="submit">
				      <span class="glyphicon glyphicon-search"></span>
				    </button>
				  </span>
				</form>
		      </div>
		    </div>
		  </div>