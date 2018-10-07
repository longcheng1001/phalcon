<?php

/**
 * 默认控制器 对请求进行处理
 * @author: 喵了个咪  <wenzhenxi@vip.qq.com> 2016-2-1
 */

use Phalcon\Mvc\Controller;

// 控制器类 必须继承Controller
class IndexController extends Controller {

    // 默认Action
    public function indexAction() {

        $this->session->set('username', 'miao');

        echo "<h1>Hello Word!</h1>";
    }

    // 测试Action
    public function testAction() {

        echo $this->session->get('username');

        echo "<h1>This is a testAction!</h1>";
    }

}
