<?php

/**
 * 控制器的控制器 对请求进行处理
 * @author: 喵了个咪  <wenzhenxi@vip.qq.com> 2016-2-1
 */

use Phalcon\Mvc\Controller;

// 控制器类 必须继承Controller
class ControllerController extends Controller {

    /**
     * 紧接着创建控制器对象的后面执行一些初始化的逻辑
     * 注意:即使待执行的action在控制器不存在“onConstruct”都会被执行。
     */
    public function onConstruct() {

        echo '<h1>onConstruct!</h1>';
    }

    /**
     * 初始化的函数，它会最先执行，并优于任何控制器的其他action。
     */
    public function initialize() {

        echo '<h1>initialize!</h1>';
    }

    /**
     * URL:http://phalcon.w-blog.cn/phalcon/Controller/index/phalcon/passphalcon
     * 直接匹配http://地址/模块名/方法名/参数1/参数2为第一个和第二个变量,第三个为默认值演示
     * 注意:当请求是没有传递参数1和参数2则会引起报错
     */
    public function indexAction($Username, $Passwd, $email = 'test@test.com') {
        //$this->view->pick("/Index/index");
        echo $Username . '</br>';
        echo $Passwd . '</br>';
        echo $email;
        echo '<h1>Controller/index!</h1>';
    }

    /**
     * URL:http://phalcon.w-blog.cn/phalcon/Controller/index2/phalcon/passphalcon
     * 在页面上输出一条error信息然后进行内部转发(URL并不会改变)
     * 注意1:通过转发之后本方法内的代码依然会被执行建议在转发之后直接return不然后面的代码会继续执行
     * 注意2:当转发到indexAction需要传递参数1和参数2的方法如果index2访问的时候没有传递参数1和参数2则会引起转发之后的报错
     */
    public function index2Action() {

        $this->flash->error("当前用户尚无访问权限!");

        // 跳转到指定的控制器和方法
        $this->dispatcher->forward(array(
            "controller" => "Controller",
            "action"     => "index"
        ));

        echo '<h1>Controller/index2!</h1>';
    }

    /**
     * URL:http://phalcon.w-blog.cn/phalcon/Controller/index3
     * 各种获取DI实例的方式,比如已经注册的session服务
     */
    public function index3Action() {

        $this->session->set('phalcon', 'test');                            // 以和服务相同名字的类属性访问

        echo $this->di->getsession()->get('phalcon') . '</br>';            // 另一种方式：使用魔法getter来访问
        echo $this->di->get('session')->get('phalcon') . '</br>';          // 通过DI访问服务
        echo $this->di['session']->get('phalcon') . '</br>';               // 使用数组下标
        echo $this->getDI()->getsession()->get('phalcon') . '</br>';       // 通过getDI方法获取实例

        echo '<h1>Controller/index3!</h1>';
    }

    /**
     * 钩子函数在控制器被找到之前执行优先级高于initialize
     */
    public function beforeExecuteRoute($dispatcher) {

        echo '<h1>beforeExecuteRoute!</h1>';
    }

    /**
     * 钩子函数在控制器执行完之后执行
     */
    public function afterExecuteRoute($dispatcher) {

        echo '<h1>afterExecuteRoute!</h1>';
    }

}
