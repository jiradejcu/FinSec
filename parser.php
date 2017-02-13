<?php
require_once 'storage.php';

function parseMessage($message) {
	$messages = explode(',', $message);
	$responseMessage = "ว่าไงนะ?";

	if (count($messages) == 2) {
		addRecord(trim($messages[0]), trim($messages[1]));
		$responseMessage = sprintf("เพิ่มรายการ '%s' จำนวนเงิน %d บาท", trim($messages[0]), trim($messages[1]));
	}

	return $responseMessage;
}