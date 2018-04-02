<?php
/**
 * @website: https://vvotm.github.io
 * @author luowen<bigpao.luo@gmail.com>
 * @date 2018/4/1 20:26
 * @description:
 */

namespace Kcloze\Bot\Reply;


abstract class MsgReply
{
    protected $message;

    protected $options;


    public function __construct($message, $options)
    {
        $this->message =$message;
        $this->options =$options;
    }

}