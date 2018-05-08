<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LineBotService;

class LineBotController extends Controller
{
    private $linebotservice;

    public function __construct(LineBotService $linebotservice)
    {
    	$this->linebotservice = $linebotservice;
    }

    public function handle(Request $request)
    {
    	$this->linebotservice->pushMessage('Test from laravel.');
    }

    public function test()
    {
    	$this->linebotservice->pushMessage('Test from laravel.');
    }

    public function index()
    {
    	return view('welcome');
    } 
}
