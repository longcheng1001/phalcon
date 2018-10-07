<?php

use Phalcon\Mvc\Model;

class Developer extends Model {

    protected $id;
    protected $name;
    protected $phone;
    protected $passwd;

    public function getSource()
    {
        return "user";
    }

    public function getId() {

        return $this->id;
    }

    public function setName($name) {

        if (strlen($name) < 10) {
            throw new \InvalidArgumentException('The name is too short');
        }
        $this->name = $name;
    }

    public function getName() {

        return $this->name;
    }

    public function setPhone($phone) {

        if (strlen($phone) != 11) {
            throw new \InvalidArgumentException('用户电话号码不足11位或超过');
        }
        $this->phone = $phone;
    }

    public function getPhone() {

        return (double) $this->phone;
    }

    public function setPasswd($passwd) {

        if (strlen($passwd) <= 5) {
            throw new \InvalidArgumentException('用户密码长度不足5位');
        }
        $this->passwd = $passwd;
    }

    public function getPasswd() {

        return $this->passwd;
    }

}
