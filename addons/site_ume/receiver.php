<?php
/**
 * Created by PhpStorm.
 * User: viva
 * Date: 2016/12/1
 * Time: 10:09
 */
defined('IN_IA') or exit('Access Denied');

class PicTranModuleReceiver extends WeModuleReceiver {
    public function receive() {
        //123
        $type = $this->message['type'];
        //这里定义此模块进行消息订阅时的, 消息到达以后的具体处理过程, 请查看微擎文档来编写你的代码
    }
}