<?php
/**
 * Digg For Typecho
 * 
 * @package Digg
 * @author doudou
 * @version 1.1.0
 * @link http://doudou.me
 * @date 2012-3-16
 * 
 */
class Digg_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        $db = Typecho_Db::get();
        Helper::addAction('Digg', 'Digg_Action');

        $db->query('CREATE TABLE IF NOT EXISTS '. $db->getPrefix() . 'digg' ." (
            `cid`   int(10) NOT NULL,
            `item`  int(8) NOT NULL,
            `count` int(10) DEFAULT '0'
             ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
        $db->query('ALTER TABLE `'. $db->getPrefix() .'digg` ADD INDEX (cid);');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        $db = Typecho_Db::get();
        Helper::removeAction('Digg');

        if (Helper::options()->plugin('Digg')->drop)
        {
            $db->query('DROP TABLE IF EXISTS ' . $db->getPrefix() . 'digg');
            return('插件已经禁用, 插件数据已经删除');
        } else {
            return('插件已经禁用, 插件数据保留');
        }
    }

    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {

        $items = new Typecho_Widget_Helper_Form_Element_Text('items', 
        NULL, '1|2',
        _t('项目存储id'),
        _t('如 1|2，用 | 分开，中间不能留有空格且最后字符不为 (必须为大于 0 整数)'));
        $form->addInput($items);

        $items_echo = new Typecho_Widget_Helper_Form_Element_Text('items_echo', 
        NULL, '不错|吐槽',
        _t('项目中文输出'),
        _t('如 不错|吐槽，用 | 分开，项目存储名的对应输出名字 (必须与上面一一对应)'));
        $form->addInput($items_echo);

        //兼容旧版本  getPrefix为新增
        $cookie_prefix = (method_exists('Typecho_Cookie','getPrefix') ? Typecho_Cookie::getPrefix():'') . '__typecho_digg_';
        $post_url = Typecho_Common::url('action/Digg', Helper::options()->index);

        $src = new Typecho_Widget_Helper_Form_Element_Textarea('src', 
        NULL, 
"<script type=\"text/javascript\" src=\"http://lib.sinaapp.com/js/jquery/1.2.6/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"" . Helper::options()->pluginUrl . "/Digg/digg.js\"></script>",
        _t('css 及 javascript'),
        _t("<div style=\"width:460px;padding:10px; background:#DFE5C6; font-size:12px;border-radius:5px;\">本插件需要jQuery，可以在这里引用第三方托管的类库，也可以在这里嵌入css。<br /><span style=\"color:#BD6800\">{$post_url}</span><br /><span style=\"color:#BD6800\">{$cookie_prefix}</span><br>如该域名下有多个Typecho使用Digg，请根据修改上面的字符串插件目录下的digg.js。</div>"));
        $form->addInput($src);

        $drop = new Typecho_Widget_Helper_Form_Element_Radio('drop', 
        array(0 => _t('不刪除'), 1 => _t('刪除')),
        0,
        _t('禁用时是否删除数据'),
        _t('若不再使用此插件, 或想清空digg数据，请选择删除后再禁用。建议先测试成功后选择删除数据然后禁用插件，再启用并配置.'));
        $form->addInput($drop);

    }

    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 输出方法
     * 
     * @access public
     * @return void or array
     */
    public static function output($return = false, $dump = false)
    {
        //防止未激活插件输出错误信息，可注释掉
        $all = Typecho_Plugin::export();
        if (!array_key_exists('Digg', $all['activated'])) return;

        //获取相关设置
        $setting = Helper::options()->plugin('Digg');

        $items = explode('|', $setting->items);
        $items_echo = explode('|', $setting->items_echo);
        if (count($items) != count($items_echo) || empty($items[0])) {
            echo "插件项目配置错误";
            return;
        }
        //digg 提交地址
        $post_url = Typecho_Common::url('action/Digg', Helper::options()->index);
        //digg 表情地址
        $img_url = Helper::options()->pluginUrl . '/Digg/img/';

        //获取日志digg数据
        $db = Typecho_Db::get();
        $cid = Typecho_Widget::widget('Widget_Archive')->cid;
        $rows = $db->fetchAll($db->select('item', 'count')->from('table.digg')->where('cid = ?', $cid));

        $result = array();
        $result['items'] = @array_combine($items, $items_echo);
        $result['imgurl'] = $img_url;
        $result['cid'] = $cid;
        $result['count'] = 0;
        foreach ($rows as $k => $v) {
            if (isset($result['items'][$v['item']])) {
            $result['count'] += $v['count'];
            $result[0][$v['item']] = $v;
            }
        }
        //print_r($result);
        unset($rows);

        //输出js及css
        echo $setting->src;

        /* 用法1 <?php Digg_Plugin::output(); ?>       按插件自定义格式输出 也可自己修改输出格式*/
        if (!$return) {
            echo "<div id=\"digg\" class=\"clearfix\">";
            foreach ($items as $k => $v) {
                echo '<a href="javascript:digg(\'' . $v . '\',\'' . $cid . '\');" id="digg-' .$v. '">';
                echo $result['items'][$v];
                echo '(<span id="' . 'digg-' . $v . '-num">' . (isset($result[0][$v]) ? $result[0][$v]['count'] : 0 ) . '</span>)</a>';
            }
            echo '</div>';
            return;
        }

        /* 用法2 <?php Digg_Plugin::output(true); ?>   将digg数据以数组形式返回，自定义html结构  可外加参数true查看返回数据*/
        if ($dump) var_dump($result);   //var_dump
        return $result;
    }

    /**
     * 按Digg输出排行
     * 
     * @access public
     * @return void
     */
    public static function rank($format, $item, $limit = 8)
    {
        //防止未激活插件输出错误信息，可注释掉
        $all = Typecho_Plugin::export();
        if (!array_key_exists('Digg', $all['activated'])) return;

        if (!in_array($item, explode('|', Helper::options()->plugin('Digg')->items))) {
            echo '项目不存在';
            return;
        }
        // **** 插件调用不成功返回值为$args[0] type不存在即可 **** //
        $alias = 'Widget_Archive@diggrank_' . $item;
        $widget = Typecho_Widget::widget($alias, 'type=notExsit');
        $query = $widget->select()->join('table.digg', 'table.digg.cid = table.contents.cid')->where('table.contents.type = ?', 'post')
        ->where('table.contents.status = ?', 'publish')->where('table.contents.created < ?', Helper::options()->gmtTime)
        ->order('table.digg.count', Typecho_Db::SORT_DESC)->limit(intval($limit));
        $widget->query($query);
        $widget->parse($format);
        
    }
}
