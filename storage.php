<?php
define('APPLICATION_NAME', 'FinSec');
define('CLIENT_SECRET_PATH', 'client_secret.json');
define('SCOPES', implode(' ', array(
	Google_Service_Sheets::SPREADSHEETS
)));
define('SPREADSHEET_ID', '17ksPCxUo5W1RE4iE-Jf46AIOYK7EimPQh3Jed64BhmU');

function getService() {
	$client = new Google_Client();
	$client->setApplicationName(APPLICATION_NAME);
	$client->setScopes(SCOPES);
	$client->setAuthConfig(CLIENT_SECRET_PATH);
	$service = new Google_Service_Sheets($client);

	return $service;
}

function addRecord($message, $amount) {
	$service = getService();

	$values = [
		[$message, $amount]
	];

	$body = new Google_Service_Sheets_ValueRange(array(
		'values' => $values
	));

	$params = array(
		'valueInputOption' => 'USER_ENTERED'
	);

	$service->spreadsheets_values->append(SPREADSHEET_ID, 'Main!A1', $body, $params);
}