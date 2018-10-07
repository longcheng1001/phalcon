<?php

/**
 * 返回控制器 对请求进行处理
 * @author: 喵了个咪  <wenzhenxi@vip.qq.com> 2016-2-15
 */

use Phalcon\Mvc\Controller;

// 控制器类 必须继承Controller
class ResponseController extends Controller {

    // 默认Action
    public function indexAction() {

        $response = $this->response;
        //Header类
        $headers = $response->getHeaders();                         //获取Headers实例
        $headers->set('header1', 'header1');                        //写入header实例一个header头
        $response->setHeaders($headers);                            //设置一组返回的headers头
        $response->getHeaders();                                    //查看当前的headers头
        $response->setHeader('header2', 'header2');                 //单独设置一个返回的header头

        //跳转类
        //$response->redirect("Request/Index");                     //跳转到这个内部的Request模块Index方法(注意需要设置URL不然会跳转到public显示404)
        //$response->redirect("http://www.baidu.com", true);        //跳转到这个外部地址
        //$response->redirect("http://www.baidu.com", true, 302);   //跳转到这个外部地址并且给当前页面一个状态码

        //return类
        //$response->appendContent('test');                          //添加一段返回类容
        //$response->setJsonContent(array('Response' => 'ok'));      //返回一个json,参数必须是数组
        //$response->setContent("<h1>Hello!</h1>");                  //返回需要显示在页面上的内容
        //$response->setStatusCode(404, "Not Found");                //返回http请求状态,以及msg
        //return $response->send();                                  //打印响应



        echo "<h1>Response!</h1>";
    }

}
