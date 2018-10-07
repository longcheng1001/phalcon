<?php

/**
 * 入口文件 index.php 加载初始化各项配置
 * @author: 喵了个咪  <wenzhenxi@vip.qq.com> 2016-2-1
 */

use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Config\Adapter\Json as ConfigJson;
use Phalcon\Config\Adapter\Php as ConfigPhp;

use Phalcon\Mvc\Url as UrlProvider;

use Phalcon\Logger\Adapter\File as FileAdapter;
use Phalcon\Logger\Formatter\Line as LineFormatter;

use Phalcon\Session\Adapter\Files as Session;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

try {

    // 创建自动加载(AutoLoaders)实例
    $loader = new Loader();

    // 通过自动加载加载控制器(Controllers)
    $loader->registerDirs(array(
        // 控制器所在目录
        '../app/controllers/',
        '../app/models/',
    ))->register();

    // 创建一个DI实例
    $di = new FactoryDefault();

    // 实例化View 赋值给DI的view
    $di->set('view', function () {

        $view = new View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    //初始化配置文件
    $ConfigIni  = new ConfigIni('../Config/ini.ini');
    $ConfigJson = new ConfigJson('../Config/json.json');
    $ConfigPhp  = new ConfigPhp('../Config/php.php');
    //打印配置文件
    //echo $ConfigIni->database->host . '</br>';
    //echo $ConfigJson->phalcon->baseuri . '</br>';
    //echo $ConfigPhp->database->username . '</br>';

    //初始化log存放文件
    $logger = new FileAdapter("../Runtime/log/2016-2/20160203.log");  //初始化文件地址
    //配置log格式
    $formatter = new LineFormatter("[%date%] - [%message%]");
    $logger->setFormatter($formatter);
    //开始log事务
    $logger->begin();
    //写入普通log
    $logger->log("This is a message");
    //写入error信息
    $logger->log("This is an error", \Phalcon\Logger::ERROR);
    //于上一句同义
    $logger->error("This is another error");
    //保存消息到文件中
    $logger->commit();

    //初始化session
    $di->setShared('session', function () {

        $session = new Session();
        $session->start();
        return $session;
    });

    //设置URL跳转时使用
    $di->set('url', function () {

        $url = new UrlProvider();
        $url->setBaseUri('/phalcon/');
        return $url;
    });

    // 初始化数据库连接 从配置项读取配置信息
    $di->set('db', function () use ($ConfigIni) {

        return new DbAdapter(array(
            "host"     => $ConfigIni->database->host,
            "username" => $ConfigIni->database->username,
            "password" => $ConfigIni->database->password,
            "dbname"   => $ConfigIni->database->dbname
        ));
    });

    // 处理请求
    $application = new Application($di);
    // 输出请求类容
    echo $application->handle()->getContent();
} catch (\Exception $e){
    // 异常处理
    echo "PhalconException: ", $e->getMessage();
}


