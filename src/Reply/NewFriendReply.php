<?php
/**
 * @website: https://vvotm.github.io
 * @author luowen<bigpao.luo@gmail.com>
 * @date 2018/4/1 20:26
 * @description:
 */

namespace Kcloze\Bot\Reply;


use Hanson\Vbot\Message\Text;

class NewFriendReply extends MsgReply implements ReplyInterface
{

    public function handle()
    {
        echo '新增好友' . $this->message['from']['UserName'] . '请求' . PHP_EOL;
        Text::send($this->message['from']['UserName'], '客官，等你很久了！感谢跟 oop 交朋友，我是 kcloze 的贴身秘书，当你累了困惑了，可以随时呼叫我！' . PHP_EOL . '高山流水遇知音，知音不在谁堪听？焦尾声断斜阳里，寻遍人间已无');
    }
}