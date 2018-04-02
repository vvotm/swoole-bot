<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Kcloze\Bot;

use Hanson\Vbot\Message\Text;
use Kcloze\Bot\Api\Baidu;
use Kcloze\Bot\Api\Tuling;
use Kcloze\Bot\Reply\GroupChangeReply;
use Kcloze\Bot\Reply\NewFriendReply;
use Kcloze\Bot\Reply\ReqFriendReply;
use Kcloze\Bot\Reply\TextReply;

class Reply
{
    private $message;
    private $options;

    public function __construct($message, $options)
    {
        $this->message =$message;
        $this->options =$options;
    }

    public function send()
    {
        $type=$this->message['type'];
        vbot('console')->log('Message Type：' . $type . ' From: ' . json_encode($this->message));

        switch ($type) {
            case 'text':
                (new TextReply($this->message, $this->options))->handle();
                break;
            case 'voice':
                // code...
                break;
            case 'image':
                // code...
                break;
            case 'emoticon':
                // code...
                break;
            case 'red_packet':
                // code...
                break;
            case 'new_friend':
                (new NewFriendReply($this->message, $this->options))->handle();
                break;
            case 'request_friend':
                (new ReqFriendReply($this->message, $this->options))->handle();
                break;
            case 'group_change':
                (new GroupChangeReply($this->message, $this->options))->handle();
                break;
            default:
                // code...
                break;

        }
    }
}
