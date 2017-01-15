<?php
require_once __DIR__ . '/vendor/autoload.php';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('x');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'x']);

$response = $bot->replyText('x', 'hello!');