function digg(action, cid) {// 如乱码，请修改成utf-8编码
	//digg提交地址，请根据情况修改，绝对地址也可
	var digg_url = 'http://127.0.0.1/hs-typecho/index.php/action/Digg';
	//根据需要修改cookie prefix
	var digg_cookie_base = '__typecho_digg_';
	var digg_before = '请选择你看完该文章的感受';
	var notice = ['刚搞完，又要来?','你已经选过啦，歇会吧..'];
	var n = Math.floor(Math.random() * notice.length + 1)-1;
	var cookie_name = digg_cookie_base + cid;
	if (getCookie(cookie_name)) {
		alert(notice[n]);
		return;
	}
	jQuery.post(digg_url, {
		action: action,
		cid: cid
	},
	function() {
		var s = '#digg-' + action + '-num';
		var n = jQuery(s).text();
		jQuery(s).empty();
		jQuery(s).append(eval(n) + 1);
	});
}
function getCookie(c_name)
 {
	if (document.cookie.length > 0)
	 {
		c_start = document.cookie.indexOf(c_name + "=")
		 if (c_start != -1)
		 {
			c_start = c_start + c_name.length + 1
			 c_end = document.cookie.indexOf(";", c_start)
			 if (c_end == -1) c_end = document.cookie.length
			return unescape(document.cookie.substring(c_start, c_end))
		}
	}
	return ""
}