<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LineBotService;


use Log;

class LineBotController extends Controller
{
    private $linebotservice;

    public function __construct(LineBotService $linebotservice)
    {
    	$this->linebotservice = $linebotservice;

    }

    public function handle(Request $request)
    {
    	Log::channel('debug')->info($request->toArray());

    	$this->linebotservice->replyMessage($request->message);
    	// $this->linebotservice->pushMessage($request->message);
    }


    
}
