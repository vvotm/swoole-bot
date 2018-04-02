<?php
/**
 * @website: https://vvotm.github.io
 * @author luowen<bigpao.luo@gmail.com>
 * @date 2018/4/1 20:28
 * @description:
 */

namespace Kcloze\Bot\Reply;


class ReqFriendReply extends MsgReply implements ReplyInterface
{

    public function handle()
    {
        echo '新增好友' . $this->message['from']['UserName'] . '请求，自动通过' . PHP_EOL;
        $friends = vbot('friends');
        $friends->approve($this->message);
    }
}