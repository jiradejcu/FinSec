<?php
require_once 'storage.php';

function parseMessage($message) {
	$messages = explode(',', $message);
	addRecord(trim($messages[0]), trim($messages[1]));

	return $message;
}