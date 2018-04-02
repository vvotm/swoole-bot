<?php
/**
 * @website: https://vvotm.github.io
 * @author luowen<bigpao.luo@gmail.com>
 * @date 2018/4/1 20:29
 * @description:
 */

namespace Kcloze\Bot\Reply;


use Hanson\Vbot\Message\Text;

class GroupChangeReply extends MsgReply implements ReplyInterface
{

    public function handle()
    {
        Text::send($this->message['from']['UserName'], '欢迎新人 ' . $this->message['invited'] . PHP_EOL . '邀请人：' . $this->message['inviter']);
    }
}