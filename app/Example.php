<?php
/**
 * Created by PhpStorm.
 * User: BE
 * Date: 11.04.2015
 * Time: 17:36
 */

namespace App;


class Example
{
    protected $_times = 0;
    public $message = "Hello World!  We've met %d times!";
    public function sayHello()
    {
        echo sprintf($this->message, $this->_times);
        $this->_times++;
    }
}