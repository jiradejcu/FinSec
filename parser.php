<?php
require_once 'storage.php';

function parseMessage($message) {
	addRecord($message, null);

	return $message;
}