<?php 
$googleClient = new \Google_Client();
$googleClient->setApplicationName('My App');
$googleClient->setAccessToken(env('GOOGLE_OAUTH_ACCESS_TOKEN'));
$googleClient->setClientId(env('GOOGLE_APP_ID'));
$googleClient->setClientSecret(env('GOOGLE_APP_SECRET'));

if ($googleClient->isAccessTokenExpired()) {
    $googleClient->fetchAccessTokenWithRefreshToken();
}

$api = new \Google_Service_Drive($client);

$file = new \Google_Service_Drive_DriveFile();
$file->setName('Folder Name');
$file->setMimeType('application/vnd.google-apps.folder');

$folder = $api->files->create($file);


?>