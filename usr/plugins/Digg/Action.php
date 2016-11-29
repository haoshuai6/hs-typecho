<?php

class Digg_Action extends Typecho_Widget implements Widget_Interface_Do
{
    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);
    }

    /**
     * 计数
     * 
     * @access public
     * @return string
     */
    public function count()
    {
        //只允许ajax Post提交
        if (!$this->request->isPost() || !$this->request->isAjax()) $this->error(405, 'Method Not Allowed');

        $cid = intval($this->request->cid);
        $item = intval($this->request->action);
        //参数缺失
        if (empty($cid)||empty($item)) $this->error(405, 'Param Missed');

        //判断digg方法是否合法
        $items = explode("|", Helper::options()->plugin('Digg')->items);
        if (!in_array($item, $items) || $item < 1) $this->error(405, 'Param Wrong');

        //判断cid是否合法
        $db = Typecho_Db::get();
        if (!$db->fetchRow($db->select()->from('table.contents')->where('cid = ?', $cid))) $this->error(405, 'Post Not Found');

        $result = $db->fetchRow($db->select()->from('table.digg')->where('cid = ?', $cid)->where('item = ?', $item));

        if (empty($result)) {
            $result['cid'] = $cid;
            $result['item'] = $item;
            $result['count'] = 1;
            $db->query($db->insert('table.digg')->rows($result));
        } else {
            $result['count'] += 1;
            $db->query($db->update('table.digg')->rows($result)->where('cid = ?', $cid)->where('item = ?', $item));
        }

        //设置已digg标记cookie
        $cookie = Array (
            'name'   => '__typecho_digg_' . $cid, 
            'expire' => 2592000,
        );
        Typecho_Cookie::set($cookie['name'], Helper::options()->gmtTime, Helper::options()->gmtTime + $cookie['expire'], Helper::options()->siteUrl);
        $this->response->throwJson('Digg Success');
    }

    public function error($code, $msg="Bad Request")
    {
        //$this->response->setStatus($code); // Issue 551 已经修复，请更新SVN版本
        header('HTTP/1.1 405 Method Not Allowed',true,$code);
        if ($msg) $this->response->throwJson($msg);
        exit;
    }

    /**
     * 绑定动作
     *
     * @access public
     * @return void
     */
    public function action()
    {
        $this->count();
    }
}
?>
