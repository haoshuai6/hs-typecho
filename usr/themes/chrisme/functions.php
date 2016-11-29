<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档')),
    array('ShowRecentPosts', 'ShowRecentComments=', 'ShowCategory=', 'ShowArchive='), _t('侧边栏显示（选择1项）'),_t('侧边栏在大于1200的显示器是固定高度，建议只选择1项'));
    
    $form->addInput($sidebarBlock->multiMode());
	
	$blogAnalytics = new Typecho_Widget_Helper_Form_Element_Text('blogAnalytics', NULL, NULL, _t('统计代码（如有需要）'), _t('输入统计代码'));
    $form->addInput($blogAnalytics);
}


