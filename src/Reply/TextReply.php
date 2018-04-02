<?php
/**
 * @website: https://vvotm.github.io
 * @author luowen<bigpao.luo@gmail.com>
 * @date 2018/4/1 20:21
 * @description:
 */

namespace Kcloze\Bot\Reply;


use Hanson\Vbot\Message\Text;
use Kcloze\Bot\Api\Baidu;
use Kcloze\Bot\Api\Tuling;

class TextReply extends MsgReply implements ReplyInterface
{

    public function handle()
    {
        //@我或者好友发消息都自动回复
        $fromType = $this->message['fromType'];
        $fromUserName = $this->message['from']['UserName'];
        $mesg = $this->message['pure'];
        $console = vbot('console');
        $console->log('receive ' . $fromType . ' message');

        $cache = vbot('cache');
        $enableWordList = $this->options['params']['enableWordList'];
        $disableWordList = $this->options['params']['disableWordList'];
        $textReplyKey = sprintf("reply:text:switcher:%s", $fromUserName);
        if (in_array($mesg, $enableWordList)) {
            $console->log('enable robot: ' . $mesg);
            $welcome = '嘿 今晚上山打老虎!';
            $cache->forever($textReplyKey, 1);
            $console->log("缓存开启 $textReplyKey : 状态 " . $cache->get($textReplyKey));
            Text::send($fromUserName, $welcome);
            return;
        }
        if (in_array($mesg, $disableWordList)) {
            $console->log('disable robot: ' . $mesg);
            $cache->forever($textReplyKey, 0);
            $console->log("缓存关闭 $textReplyKey : 状态 " . $cache->get($textReplyKey));
            $bye = '无聊, 再见!';
            Text::send($fromUserName, $bye);
            return;
        }

        if (!$cache->get($textReplyKey, false)) {
            return;
        }
        if (true == $this->message['isAt'] ||  $fromType == 'Friend' || $fromType == 'Self') {
            if (strstr($mesg, '百度') !== false) {
                $baidu   = new Baidu();
                $return  = $baidu->search($mesg);
                foreach ((array) $return as $key => $value) {
                    if (isset($value['title']) && isset($value['url'])) {
                        $console->log('Message send：' . json_encode($value));
                        Text::send($fromUserName, $value['title'] . ' ' . $value['url']);
                    }
                }
            } else {
                $tuling =new Tuling($this->options);
                $return =$tuling->search($mesg);
                $console->log('Message send：' . $return);
                Text::send($this->message['from']['UserName'], $return);
            }
        }

    }
}
