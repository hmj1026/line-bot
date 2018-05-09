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

    	$this->linebotservice->replyMessage($request);
    	// $this->linebotservice->pushMessage($request->message);
    }


    
}
