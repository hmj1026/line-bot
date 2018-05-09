<?php
namespace App\Services;

use LINE\LINEBot;
use LINE\LINEBot\Response;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder;

use LINE\LINEBot\Event\BaseEvent;

class LineBotService
{
	private $lineBot;
	private $lineUserID;

	public function __construct($lineUserID)
	{
		$this->lineBot = app(LineBot::class);
		$this->lineUserID = $lineUserID;

	}

    public function pushMessage($content): Response
    {
        if (is_string($content)) {
            $content = new TextMessageBuilder($content);
        }
        return $this->lineBot->pushMessage($this->lineUserID, $content);
    }

    public function replyMessage($content): Response
    {
        if(count($content) > 5){
        	$content = new TextMessageBuilder($content);
        }else{
        	$content = new TextMessageBuilder('Yeeeeeeeeeeee');
        }

        $replyToken = $this->lineBot->getReplyToken();

        return $this->lineBot->replyMessage($replyToken, $content);
    }


}