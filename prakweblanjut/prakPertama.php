<?php
require_once __DIR__.'/vendor/autoload.php';
  
session_start();
  
$client = new Google_Client();
$client->setAuthConfigFile('client_secret.json');
$client->setRedirectUri("http://localhost/prakweblanjut/prakPertama.php");
$client->addScope("https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile");
  
if (!isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
      $oauth2 = new Google_Service_Oauth2($client);
      $userInfo = $oauth2->userinfo_v2_me->get();
      $email = $userInfo["email"];
      $name = $userInfo["givenName"];
      $surname = $userInfo["familyName"];
      $pic = $userInfo["picture"];
      $_SESSION['picture'] = $pic;
      $_SESSION['familyName'] = $surname;
      $_SESSION['givenName'] = $name;
      $_SESSION['email'] = $email;
  
  header('Location:index.php');
}