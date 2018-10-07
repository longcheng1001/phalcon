<?php

/**
 * 控制器的控制器 对请求进行处理
 * @author: 喵了个咪  <wenzhenxi@vip.qq.com> 2016-2-1
 */

use Phalcon\Mvc\Controller;

// 控制器类 必须继承Controller
class ViewController extends Controller {

    public function initialize()
    {
        $this->view->setTemplateAfter('common');
    }

    // 测试Action
    public function indexAction($Id) {
        $this->view->Id = $Id;
    }
}
