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

use Log;

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

    public function replyMessage($request)
    {

        // foreach ($request->events as $event) {

        //     Log::channel('debug')->info($event->toArray());
        //     Log::channel('debug')->info($event);

        //     $replyToken = $event->replyToken;
        //     $content = $event->message->text;
        // }

        $replyToken = $request->events[0]->replyToken;


        Log::channel('debug')->info($replyToken);
        // Log::channel('debug')->info($content);

        if(count($content) > 5){
        	$content = new TextMessageBuilder($content);
        }else{
        	$content = new TextMessageBuilder('Yeeeeeeeeeeee');
        }


        Log::channel('debug')->info($replyToken);


        return $this->lineBot->replyMessage($replyToken, $content);

    }


}