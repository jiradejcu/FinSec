<?php
define('APPLICATION_NAME', 'FinSec');
define('CLIENT_SECRET_PATH', 'client_secret.json');
define('SCOPES', implode(' ', array(
	Google_Service_Sheets::SPREADSHEETS
)));
define('SPREADSHEET_ID', '17ksPCxUo5W1RE4iE-Jf46AIOYK7EimPQh3Jed64BhmU');

function getService($sheet = 'Main') {
	$client = new Google_Client();
	$client->setApplicationName(APPLICATION_NAME);
	$client->setScopes(SCOPES);
	$client->setAuthConfig(CLIENT_SECRET_PATH);
	$service = new Google_Service_Sheets($client);

	return $service;
}

function addRecord($message, $amount) {
	$service = getService();

	$response = $service->spreadsheets_values->get(SPREADSHEET_ID, 'Main!A:A');
	$values = $response->getValues();

	if (!empty($values)) {
		foreach ($values as $row) {
			echo $row[0] . "\n";
		}
	}
}