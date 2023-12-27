<?php 
require __DIR__ . '/vendor/autoload.php';

// configure the Google Client
$client = new \Google_Client();
$client->setApplicationName('Google Sheets API');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
// credentials.json is the key file we downloaded while setting up our Google Sheets API
$path = 'credentials.json';
$client->setAuthConfig($path);

// configure the Sheets Service
$service = new \Google_Service_Sheets($client);

// the spreadsheet id can be found in the url https://docs.google.com/spreadsheets/d/143xVs9lPopFSF4eJQWloDYAndMor/edit
$spreadsheetId = '1SaqjFr00LGCyBDVTCHmGuhbPkPakG48LwF6MXUnFdn4';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);
// var_dump($spreadsheet);

// we define here the expected range, columns from A to F and lines from 1 to 10
$range = 'Lot';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
echo '<pre>';
print_r($values);
echo '</pre>';
?>