<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Slack\SlackService;

class MyController extends Controller
{
    public function __invoke()
    {
        echo "OK";
        \Slack::send('Hello World!');
        return null;
    }    
}
