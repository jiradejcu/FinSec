<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'parser.php';

define('CHANNEL_ACCESS_TOKEN', '15o60jaZ2VS5zxNCn/YHfie4/JZBYA9GbpnbmFCiaQkt91rHH1/iD6s6Y7g4h2KbzAcuDCj8cNd3JeNuAVigoEwZ/vhfwQ4udINHfI7p1iC+n1e+/lJEWA59NYGE8YGPeB4TiEq12Oz3SXtbpanm8QdB04t89/1O/w1cDnyilFU=');
define('CHANNEL_SECRET', '60f172d664490d49d7ff28b802949468');

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(CHANNEL_ACCESS_TOKEN);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => CHANNEL_SECRET]);

$content = file_get_contents('php://input');
$events = json_decode($content, true);

if (!empty($events['events'])) {
	foreach ($events['events'] as $event) {
		switch ($event['type']) {
			case 'message':
				$message = $event['message'];
				switch ($message['type']) {
					case 'text':
						$response = parseMessage($message['text']);
						$bot->replyText($event['replyToken'], $response);
						break;
					default:
						error_log("Unsupported message type: " . $message['type']);
						break;
				}
				break;
			default:
				error_log("Unsupported event type: " . $event['type']);
				break;
		}
	}
}